<?php
include('templates/heads.php');
?>

<body>
  <?php
  include('templates/header.php');
  ?>
  <div class="banner">
    <div class="before" style="background-image: url('<?= server_path('assets/upload/' . $single_product->image) ?>');"></div>
    <div class="after"><?= $single_product->name; ?></div>
  </div>
  <div class="container mt-5 mb-2">
    <div class="row">
      <div class="col-md-9">
        <img class="image-fluid w-100 mb-3" src="<?= server_path('assets/upload/' . $single_product->image) ?>" />
        <div class="clearfix"></div>
        <?= nl2br($single_product->description); ?>
      </div>
      <div class="col-md-3">
        <h3>Recent Posts</h3>
      </div>
    </div>
  </div>
</body>

</html>