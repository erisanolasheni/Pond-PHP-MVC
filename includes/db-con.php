<?php
// Connect to database
class DBCConnection
{
    public  $con;

    public function __construct($host, $dbname, $dbuser, $dbpass, $driver = 'mysql')
    {
        $this->con = new PDO("$driver:host=$host;dbname=$dbname", $dbuser, $dbpass);
    }

    public function con()
    {
        return $this->con;
    }

    public function login_admin($email, $password)
    {
        $select = $this->con->prepare('select id,email,username,password from admin where email =:email limit 1');

        $select->execute(array(':email' => $email));

        if ($select_results = $select->fetch(PDO::FETCH_OBJ)) {

            $user_password = $select_results->password;

            if (password_verify($password, $user_password)) {
                // Remove password from the user object and Set user correct
                unset($select_results->password);

                return [true, $select_results];
            }
        }
        return false;
    }

    public function fetch_product($limit = 15, array $order_by = [], array $clauses = [], array $fields = [])
    {
        $clause_fields = "";
        $clause_query = [];
        $query_order = null;
        $query_limit = null;
        $clause_tokens = [];
        $order_of_query = "";
        $wheres = "";

        // Check if fields is supplied and it is an associative array
        if (count($fields)) {

            // Filter files
            $fields = array_filter($fields);

            $fields = array_map(function ($val) {
                return strtolower($val);
            }, $fields);
        }

        if (count($fields)) {
            $clause_fields = implode(",", $fields);
        } else {
            $clause_fields = '*';
        }


        if (count($clauses)) {
            foreach ($clauses as $clas) {
                $clause_query[] = $clas[0] . " " . $clas[1] . ":" . $clas[0];
                $clause_tokens[":" . $clas[0]] = $clas[2];
            }
        }

        if (count($order_by)) {
            $query_order = $order_by[0];
            if (count($order_by) > 1) $query_order .= " " . $order_by[1];
        }

        if ($limit) {
            $query_limit = " limit $limit";
        } else {
            $query_limit = "";
        }

        // Reassign variables
        $columns = $clause_fields;

        if (count($clause_query)) {
            $wheres = " where " . implode(" and ", $clause_query);
        }

        if (count($order_by)) {
            $order_of_query = " order by " . implode(" ", $order_by);
        }
        $limit = $query_limit;

        // Flat the query tokens (For security)

        $query_string = "select $columns from products $wheres $order_of_query $limit";

        // print_r($clause_tokens);

        $products = $this->con->prepare($query_string);

        $products->execute($clause_tokens);

        return $products->fetchAll(PDO::FETCH_OBJ);
    }

    public function delete_product($id)
    {
        if ((int)$id) {
            $delete_product = $this->con()->prepare("delete from products where id =:id limit 1");
            $delete_product->execute(array(':id' => $id));
        }
    }

    public function update_product(array $clauses = [], $action_type = 'add', array $conditions = [], $limit = null)
    {
        $action = $action_type == 'add' ? 'add' : 'edit';

        $limit = $action == 'edit' && !(int)$limit ? 1 : $limit;

        $query_start = $action == 'add' ? 'insert into products ' : 'update products ';
        $clause_query = [];
        $clause_conditions = [];
        $clause_tokens = [];
        $wheres = "";
        $order_of_query = "";


        if (count($clauses)) {
            foreach ($clauses as $key => $val) {
                $clause_query[] = $key . " = :" . $key;
                $clause_tokens[":" . $key] = $val;
            }


            if ($action == 'edit' && count($conditions)) {
                foreach ($conditions as $clas) {
                    if ($clas[0] == 'id') {
                        $conditions_id = (int)$clas[2];
                    }

                    $clause_conditions[] = $clas[0] . " " . $clas[1] . ":" . $clas[0];
                    $clause_tokens[":" . $clas[0]] = $clas[2];
                }
            }

            // print_r(($clause_tokens));
            // die;

            // Reassign variables
            $columns = implode(", ", $clause_query);

            // print_r($clause_conditions);

            if (count($clause_conditions)) {
                $wheres = " where " . implode(" and ", $clause_conditions);
            }

            $query_limit = (int)$limit ? " limit " . (int)$limit : '';


            $update_products = $this->con->prepare("$query_start SET $columns $wheres $query_limit");

            if ($update_products->execute($clause_tokens)) {

                // Return the newly update product
                if ($action == 'add') {
                    $product_id = $this->con()->lastInsertId();
                } else {
                    $product_id = $conditions_id;
                }

                return [true, $this->fetch_product(1, [], [[
                    'id', '=', $product_id
                ]])];
            }

            return false;
        }
    }

    public function slug_post($title, $length = null)
    {
        return preg_replace("/\W+/is", "-", substr(trim($title), 0, $length));
    }

    public function upload_product_image($dir, $uploadName)
    {
        $errors = [];
        if (!file_exists($dir)) {
            mkdir($dir);
        }
        $target_dir = $dir;
        $script_file_name = uniqid() . str_replace(' ', '', basename($_FILES[$uploadName]["name"]));
        $target_file = $target_dir . $script_file_name;
        $uploadOk = 1;
        $fileSize = 5000000;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$uploadName]["tmp_name"]);
            if ($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                // echo "File is not an image.";
                $errors[] = 'File is not an image.';
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            // echo "Sorry, file already exists.";
            $errors[] = 'Sorry, file already exists';
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES[$uploadName]["size"] > $fileSize) {
            // echo "Sorry, your file is too large.";
            $errors[] = 'Sorry, your file is too large.';
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $errors[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            return [false, $errors];
        } else {

            if (move_uploaded_file($_FILES[$uploadName]["tmp_name"], $target_file)) {

                return [true, $script_file_name];
            } else {
                $errors[] = 'Failed to upload files.';
                return [false, $errors];
            }
        }
    }
}
