<html>
<head>
    <title> Trader Snax </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

</head> 

<body>
<?php
    include 'navbar.php';
?>
<div class="container" id="product-section">
    <div class="row">
        <div class="col-md-6">
        <br><br>
            <div class="col-md-6">
                <img
                src="profilePictures/default.png"
                alt="Kodak Brownie Flash B Camera"
                class="image-responsive"
                />
            </div>
        </div>
        <div class="col-md-6">
        <br><br>    
<form action="" method="post" class="w-75 container-sm border border-dark border-2 rounded shadow p-4 mb-4 bg-white">
    
  <h3 class="text-uppercase text-center"><b> Review </b></h3>
    <div class="mb-3">
      <label for="password" class="form-label">How would you rate it? </label>
      <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="password" placeholder="Enter password" name="password" value="<?php echo $password; ?>">
      <div class="invalid-feedback"><?php echo $password_err; ?></div>
    </div>
    <div class="mb-3">
      <label for="confirm_password" class="form-label">Write a review</label>
      <input type="password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" id="confirm_password" placeholder="Enter password" name="confirm_password" value="<?php echo $confirm_password; ?>">
      <div class="invalid-feedback"><?php echo $confirm_password_err; ?></div>
    </div>
    <div class="text-center w-75 d-grid mx-auto">
    <button id="submit" type="submit" class="btn btn-outline-info btn-lg">Submit </button>
  </div>
    <br>
</form>
        </div>
    </div><!-- end row -->
</div><!-- end container -->
</body>
</html