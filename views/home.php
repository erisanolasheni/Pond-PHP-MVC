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
                <div class="card-columns">
                    <?php foreach ($allProducts as $product) {
                        ?>
                        <a href="single/<?= $product->id ?>/<?= $connection->slug_post($product->name, 10) ?>">
                            <div class="card">
                                <img class="card-img-top" src="<?= server_path('assets/upload/' . $product->image) ?>" alt="<?= $product->name ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= ucwords($product->name); ?></h5>
                                    <p class="card-text"><?= substr($product->description, 0, 70); ?>...</p>
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
            </div>
        </div>
</body>

</html>