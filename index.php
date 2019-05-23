<?php
require('includes/autoloader.php');

switch ($server_basepath): case '':
        $allProducts = $connection->fetch_product(50, ['id', 'DESC']);
        include("views/home.php");
        break;
    case 'single':
        $product_id = $server_path_arrays[1];

        if ($product_id) {
            $single_product = $connection->fetch_product(1, [], [['id', '=', $product_id]])[0];

            // print_r($single_product);

            require('views/single.php');
        } else {
            // Since no product ID, redirect to base

            header("Location: /");
            exit;
        }
        break;
    case 'admin':
        session_start();
        // Check if admin submitted form

        if (!isset($_SESSION['admin'])) {
            if (isset($_POST['login'])) {
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);

                // Login user
                $admin_user = $connection->login_admin($email, $password);

                if (!$admin_user) {
                    // Authentication not successful
                    // Flash error message
                    $_SESSION['FLASH_ERROR'] = 'Username/Password not correct!';
                } else {
                    $user = $admin_user[1];
                    $_SESSION['admin'] = $user->id;
                }
                header("Location: /admin");
                exit;
            }
            require('views/admin-login.php');
        } else {
            // Get all products from database
            $allProducts = $connection->fetch_product(50, ['id', 'DESC']);
            $single_admin_page = $server_path_arrays[1];
            // Check sub paths
            switch ($single_admin_page): case '':
                    include('views/admin-interface.php');
                    break;
                case 'add-product':

                    break;
                case 'product':
                    $product_id = (int)$server_path_arrays[2];
                    // Get product to Edit

                    if ($product_id) {
                        $single_product = $connection->fetch_product(1, [], [['id', '=', $product_id]])[0];
                    } else {
                        $single_product = null;
                    }

                    // print_r($single_product);

                    if (!($product_id || $single_product)) {
                        // If no id as appended to the product path
                        // Then action means adding a new product
                        $action = 'add';
                    } else {
                        $action = 'edit';
                    }
                    if (isset($_POST['update'])) {
                        // Check if product is attempted to be update
                        // Update could either be adding or editing
                        $name = trim($_POST['name']);
                        $category = trim($_POST['category']);
                        $image = $_FILES['image']['name'];
                        $description = $_POST['description'];

                        $filename = null;

                        if ($image) {
                            // Upload is attempted upload
                            $file_handle = $connection->upload_product_image(__DIR__ . '/assets/upload/', 'image');

                            // print_r($file_handle);

                            // die;

                            if (!$file_handle) {
                                $_SESSION['FLASH_ERROR'] = 'Image upload error';
                            } else {
                                $filename = $file_handle[1];
                            }
                        }

                        if (!isset($_SESSION['FLASH_ERROR'])) {
                            if ($name && $category && $description) {
                                // Upload files
                                // Filter array to remove null values
                                $inputs = array_filter([
                                    'name' => $name,
                                    'description' => $description,
                                    'category' => $category,
                                    'image' => $filename
                                ]);

                                $conditions = [];

                                if ($action == 'edit') {
                                    $conditions = [[
                                        'id', '=', $product_id
                                    ]];
                                }

                                $updated_product = $connection->update_product($inputs, $action, $conditions);

                                if ($updated_product) {
                                    $single_product = $updated_product[1][0];



                                    // redirect to product page

                                    header("Location: /single/" . $single_product->id . "/" . $connection->slug_post($single_product->name, 10));
                                    exit;
                                } else {
                                    $_SESSION['FLASH_ERROR'] = 'Error: Product not updated';
                                }
                            } else {
                                $_SESSION['FLASH_ERROR'] = 'Please fill in the form with appropriate values';
                            }
                        }
                    }

                    // Arrays for the product categories
                    $products_category_enums = [
                        'Darwin\'s',
                        'Northern Leopard',
                        'Ornate Horned',
                        'Poison Dart',
                        'Tree Frogs'
                    ];

                    include('views/admin-interface-update.php');
                    break;

                case 'delete':
                    $product_id = (int)$server_path_arrays[2];

                    if (!$product_id) {
                        // if product ID is not provided, Flash errors and
                        // Redirect to admin index
                        $_SESSION['FLASH_ERROR'] = 'Please provide id of the product to delete';
                    } else {
                        $connection->delete_product($product_id);
                    }
                    header("Location: /admin");
                    exit;
                    break;
                case 'logout':
                    // Logout all user sessions
                    session_destroy();

                    header("Location: /admin");
                    exit;

                    // Unset cookies also
                    break;
                default:
                    header('Location: /admin');
                    exit;
                    break;
            endswitch;
        }
        unset($_SESSION['FLASH_ERROR']);
        break;
    default:
        // Redirect to index page
        header('Location: /');
        exit;
endswitch;
