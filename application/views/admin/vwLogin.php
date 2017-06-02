<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  <!--   
  Code By Abhishek R. Kaushik  
  http://devzone.co.in/
  -->
    <title>Admin Pannel</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo css;?>admin/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo css;?>admin/signin.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php ////echo HTTP_JS_PATH; ?>html5shiv.js"></script>
      <script src="<?php //echo HTTP_JS_PATH; ?>respond.min.js"></script>
    <![endif]-->
      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    
        
  </head>

  <body>

    <div class="container">
        <?php
        if(isset($error) && $error !='')
        {
            ?>
        <div class="alert alert-danger">
        <?php echo $error; ?>
      </div>
        <?php
        }
        ?>
        <form class="form-signin panel" method="post" action="<?php echo base_url(); ?>admin/home/do_login">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" placeholder="Username" name="username" id="username" autofocus>
        <input type="password" id="pass" class="form-control" placeholder="Password" name="password">
        <label class="checkbox">
            <input type="checkbox" value="remember-me" id="remember_me">Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>