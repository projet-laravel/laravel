<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Dashio - Bootstrap Admin Template</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: TemplateMag.com
      License: https://templatemag.com/license/
    ======================================================= -->
</head>
<body>
  <div id="login-page">
      <div class="container">
          <form class="form-login"  method="POST" action="<?php echo e(route('register')); ?>">
              <h2 class="form-login-heading">Sign in</h2>
              <div class="login-wrap">
                      <?php echo csrf_field(); ?>

                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                              <?php if($errors->has('name')): ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?php echo e($errors->first('name')); ?></strong>
                                  </span>
                              <?php endif; ?>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                              <?php if($errors->has('email')): ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?php echo e($errors->first('email')); ?></strong>
                                  </span>
                              <?php endif; ?>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                              <?php if($errors->has('password')): ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?php echo e($errors->first('password')); ?></strong>
                                  </span>
                              <?php endif; ?>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>

                          <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-6">
                        <?php echo NoCaptcha::display(); ?>

                        </div>
                      </div>
                      <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  <?php echo e(__('Register')); ?>

                              </button>
                              <a href="<?php echo e(route('login')); ?>"  class="btn btn-primary">
                                  Login
                              </a>
                          </div>
                      </div>

                      <div class="form-group row mb-0">

                      </div>
              </div>
              <!-- modal -->
          </form>
      </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
      $.backstretch("img/login-bg.jpg", {
          speed: 500
      });
  </script>
</body>

</html>

<?php /* /var/www/laravel/resources/views/auth/register.blade.php */ ?>