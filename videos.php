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
            <center>
                <BR>
                <BR>
                <?php
$dir = "videos";
$handle=opendir($dir);
  
$file = readdir($handle);
$array = array();
  
$count = 0;
     while (($file = readdir($handle))!==false) {
      if ($file != "." && $file != ".." && ereg(".mov",$file)) {
	 $array[] = $file;
      $count++;
	       if ($count>"30"){
break;
	}
      }
    }
			
	closedir($handle); 
echo "<center><BR><BR>There are $count Video(s) within the <i>$dir</i> Directory, Displaying using HTML5 (If the browser supports the codec and tag)<BR>";
echo "<HR width=65%></center>";?>

                    <ul style="list-style-type:none;">

                        <?php
foreach($array as $videos)
 {
$vidname = substr($videos, 0, -4);
	
    
    ?>
                            <!--[if IE ]>
<li style="display:inline;"><embed src="<?php echo $dir?>/<?php $videos?>" width="320" height="260" autostart=false CONTROLS=CONSOLE></embed></li>;
?>
<![endif]-->

                            <!--[if !IE]><!-->
                            <?php
    $isFirefox = preg_match('/firefox/i',$_SERVER['HTTP_USER_AGENT']) ? TRUE : FALSE;

		if($isFirefox) {
			
  print ('<li><embed src="'.$dir.'/'.$videos.'" width="320" height="260" autostart=false></embed></li>');
		} else {
  print ('<li><video width="320" height="240" controls="controls">');
    print ('<source src="'.$dir.'/'.$videos.'" />');
    print ('Your browser does not support the video tag or perhaps the type of file</video></li>');

  
?>
                                <!--<![endif]-->
                                <?php }
 
 $number=$number+1;

if ($number>1){
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