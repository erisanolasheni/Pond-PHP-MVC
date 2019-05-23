<?php
include('templates/heads.php');
?>

<body>
    <?php
    include('templates/header.php');
    ?>
    <div class="container">
    <form class="col-md-7 m-auto" method="post">
        <h1 class="text-center m-2">Welcome to Pond Admin Interface</h1>
  <div class="form-group">
    <label for="email">Email address</label>
    <input name="email" type="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
  </div>
  <div class="form-check m-1">
    <input type="checkbox" class="form-check-input" id="checkbox">
    <label class="form-check-label" for="checkbox">Keep me logged in</label>
  </div>
  <button type="submit" name="login" class="btn btn-primary">Submit</button>
</form>
    </div>
    <?php
    include('templates/footer.php');
    ?>
</body>

</html>