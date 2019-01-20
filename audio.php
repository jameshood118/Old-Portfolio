<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="js/jquery.js"></script>

</head>

<body>
        <?php include_once("includes/analyticstracking.php") ?>
    <div id="wrap">

        <?php include("includes/menu.php"); ?>
            <BR>
            <BR>
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
    <div id="footer">
        <?php include("includes/bottommenu.php"); ?>
            <?php include("includes/footer.php"); ?>

    </div>
</body>

</html>