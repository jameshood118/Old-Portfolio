<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="author license" href="jameshood118@gmail.com">
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="google-site-verification" content="g33cCL3Zejco00mObr5iDhwZwaNfo-ttj_I3IQINO-c" />
    <META NAME="description" CONTENT="PHP Web Developer, MySQL, HTML, CSS, Javascript, Flash, Actionscript 2.0/3.0">
    <META NAME="author" CONTENT="James Hood">
    <META NAME="ROBOTS" CONTENT="ALL">
    <title>The Portfolio of James Hood</title>
    <script type="text/javascript" src="//use.typekit.net/vra2zyv.js"></script>
    <script type="text/javascript">
        try {
            Typekit.load();
        } catch (e) {}
    </script>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles2.css">
    <link href="sticky-footer-navbar.css" rel="stylesheet">

</head>

<body>
    <?php include_once("includes/analyticstracking.php") ?>
        <?php include("includes/menu2.php"); ?>

            <div class="jumbotron">
                <div class="container">
                    <img src="../images/gallerybanner.png" title="Portfolio of James Hood" class="center hidden-xs" />
                </div>
            </div>
            <div class="container">
                <center>
                    <?php


$dir = "audio/samples";
$handle=opendir($dir);
  
$file = readdir($handle);
$array = array();
  
$count = 0;
     while (($file = readdir($handle))!==false) {
      if ($file != "." && $file != ".." && ereg(".mp3",$file)) {
	 $array[] = $file;
      $count++;
	       if ($count>"30"){
break;
	}
      }
    }
 
			
	closedir($handle); 
echo "<center><BR><BR>There are $count Audio Samples within the <i>$dir</i> Directory<BR>";
echo "<HR width=65%></center>";?>

                        <ul style="list-style-type:none;">

                            <?php
foreach($array as $audios)
 {
$audname = substr($audios, 0, -4);

?>
                                <!--[if IE ]>
<?php 
  print ('<li><embed src="'.$dir.'/'.$audios.'" width="320" height="20" autostart=false></embed>'.$audios.'</li>');
?>
<![endif]-->

                                <!--[if !IE]><!-->
                                <?php
    $isFirefox = preg_match('/firefox/i',$_SERVER['HTTP_USER_AGENT']) ? TRUE : FALSE;

		if($isFirefox) {
			
  print ('<li><embed src="'.$dir.'/'.$audios.'" width="320" height="20" autostart=false></embed><BR>'.$audios.'</li>');
		} else {
  print ('<li><audio src="'.$dir.'/'.$audios.'" width="320" height="20" controls /></audio><BR>'.$audios.'</li>');
  
?>
                                    <!--<![endif]-->
                                    <?php }

 
 $number=$number+1;

if ($number>30){
print ('<br>');
$number=0;
}

 }
 				
?>
                        </ul>
                </center>
            </div>
            <footer class="footer">
                <div class="container">
                    <p class="text-muted">
                        <?php include("includes/bottommenu.php"); ?>
                            <?php include("includes/footer.php"); ?>
                    </p>
                </div>
            </footer>
            <BR>
            <BR>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>