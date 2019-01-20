
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REV="made" href="mailto:jameshood118@gmail.com">
<link rel="shortcut icon" href="favicon.ico">
<META NAME="description" CONTENT="PHP Web Developer, MySQL, HTML, CSS, Javascript">
<META NAME="author" CONTENT="James Hood">
<META NAME="ROBOTS" CONTENT="ALL">
<title>Admin at Jameshood118</title>

<link rel="stylesheet" type="text/css" href="../styles.php">
    <link type="text/css" href="../menu.css" rel="stylesheet" />
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/menu.js"></script>
    <style type="text/css">
* { margin:0;
    padding:0;
}
body { background:rgb(74,81,85); }
div#copyright {
    font:11px 'Trebuchet MS';
    color:#fff;
    text-indent:30px;
 }
</style>
</head>

<body>
<div id="wrap">

<?php include("../includes/menu.php"); ?>
<div id="main" class="clearfix">
									<div class="blogbox"><?php 
									$error=$_GET['error'];
									if ($error=="true") {
									print ('<font color=red>Login Incorrect Retry.</font><br>');
									}
									?>

 <form name="form1" method="post" action="admin_menu.php">
 				Admin Login:<input name="login" type="text" id="login"><BR>
                Admin Password:<input name="password" type="password" id="password">              
              <input type="submit" name="Submit" value="Submit">
              </form>
              
                <form name="form4" method="post" action="../index.php">
                    <input type="submit" name="Submit4" value="Cancel">
                  </form>
              </div>
<div id="footer"> 
<?php include("../includes/bottommenu.php"); ?>
<?php include("../includes/footer.php"); ?>

  </div></div>

</div>

</body>
</html>