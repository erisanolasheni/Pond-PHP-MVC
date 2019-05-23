<?php
include('templates/heads.php');
?>

<body>
    <?php
    include('templates/header.php');
    ?>
    <div class="container mt-5 mb-2">
        <form class="col-md-7 m-auto" method="post" enctype="multipart/form-data">
            <h2><?= ucwords($action) ?> Pond Products</h2>
            <div class="form-group">
                <label for="name">Frog Name</label>
                <input name="name" type="text" id="name" value="<?= $single_product->name ?>" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter product name">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="">Select Category</option>
                    <?php
                    foreach ($products_category_enums as $p) {
                        ?>
                        <option value="<?= $p ?>"><?= ucfirst($p) ?></option>
                    <?php
                }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-check-label" for="description">Frog Description</label>
                <textarea class="form-control" name="description" id="description"><?= $single_product->description ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Upload Frog Image</label>
                <div class="card" style="cursor: pointer;" onclick="document.querySelector('#image').click();">
                    <img class="card-img-top" src="<?php if ($single_product->image) {
                                                        echo server_path('assets/upload/' . $single_product->image);
                                                    } else {
                                                        echo server_path('assets/upload/frog-default.jpg');
                                                    }
                                                    ?>">
                    <div class="card-body">
                        <h5 class="card-title">Click to Upload New</h5>
                        <input type="file" name="image" id="image" class="form-control-file d-none" id="image">
                    </div>
                </div>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Submit</button>
            <a href="<?= server_path('admin/delete/' . $single_product->id) ?>" onclick="return confirm('Are you sure you want to delete this product?');"><button type="button" class="btn btn-danger">Delete</button></a>
        </form>
    </div>
    <script>
        document.getElementById('category').value = '<?= $single_product->category ?>'
    </script>
</body>

</html>