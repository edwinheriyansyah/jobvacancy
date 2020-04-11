<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Administrator</title>
    <!-- favicon links -->
    <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png" />
   </head>
  <body><section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Job Vancy Admin</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="cek_login.php" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>LOGIN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" name="username" type="text" placeholder="Username" autofocus required>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" name="password" type="password" placeholder="Password" required>
          </div>

          <div class="form-group btn-container">
            <input type="submit" class="btn btn-primary btn-block" value="LOGIN" name="login">
          </div>
        </form>
      </div>
      <div align="center">
                        <p><p>&copy; <?=date('Y');?> - Online Job Vacancy<br>Build With <i class="fa fa-heart"></i> by <a href="https://winsekai.my.id" target="_blank">Edwin Heriyansyah</a>
                        </p>
                        <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
                    </div>
    </section>

    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
      });
    </script>
  </body>
</html>