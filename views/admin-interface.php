<?php
include('templates/heads.php');
?>

<body>
    <?php
    include('templates/header.php');
    ?>
    <div class="container mt-5 mb-2">
        <div class="row">
            <div class="col-md-9">
                <h2>All Pond Products</h2>
                <div class="card-columns">
                    <?php foreach ($allProducts as $product) {
                        ?>
                        <div class="card">
                            <a href="admin/product/<?= $product->id ?>">
                                <img class="card-img-top" src="<?= server_path('assets/upload/' . $product->image) ?>" alt="<?= $product->name ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= ucwords($product->name); ?></h5>
                                    <p class="card-text"><?= substr($product->description, 0, 70); ?>...</p>
                                </div>
                            </a>
                            <div class="card-footer">
                                <a href="admin/product/<?= $product->id ?>">
                                    <small class="text-muted">Click to edit</small></a><span class="text-danger float-right"><a href="<?= server_path('admin/delete/' . $product->id) ?>" onclick="return confirm('Are you sure you want to delete this product?');">delete</a></span>
                            </div>
                        </div>
                        </a>
                    <?php
                }
                ?>
                </div>
            </div>
            <div class="col-md-3">
                <h3>More Action(s)</h3>
                <ul class="list-group">
                    <li class="list-group-item"><a href="<?= server_path('admin/product'); ?>">Add Products</a></li>
                    <li class="list-group-item"><a href="<?= server_path('admin/logout'); ?>">Logout</a></li>
                </ul>
            </div>
        </div>
        <?php
        include('templates/footer.php');
        ?>
</body>

</html>