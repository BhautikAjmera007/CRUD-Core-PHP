<?php session_start() ;?>
<?php 
  if(isset($_POST['signin'])){
    $userName=$_POST['uname'];
    $password=$_POST['psw'];

    if($userName == "admin" && $password == "admin"){
      $_SESSION['uname'] = $userName;
      header('Location: display_userdata.php');
    }
    else{
      $msg="Wrong User Name or Password, try again ...";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Demo</title>
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link href="css/styles.css" rel="stylesheet">
</head>

<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="post">
            <div class="form-group">
              <input type="text" name="uname" class="form-control" placeholder="User Name">
            </div>
            <div class="form-group">
              <input type="password" name="psw" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="submit" name="signin" class="btn btn-primary btn-lg btn-block">Sign In</button>
              <span class="pull-right"><a href="#">Register</a></span>
            </div>

            <?php if(isset($msg)){?>
              <div class="alert alert-warning" role="alert">
                  <?php echo $msg; ?>
              </div>
            <?php } ?>
          </form>
      </div>
      <div class="modal-footer"></div>
  </div>
  </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>