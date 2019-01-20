<!DOCTYPE html>
<html style="background-color:#191F2A;">
<?php 

$gview=$_GET['gview'];
$gimage=$_GET['gimage'];
?>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="author license" href="jameshood118@gmail.com">
        <link rel="shortcut icon" href="favicon.ico">
        <meta name="google-site-verification" content="g33cCL3Zejco00mObr5iDhwZwaNfo-ttj_I3IQINO-c" />
        <META NAME="description" CONTENT="PHP Web Developer, MySQL, HTML, CSS, Javascript, Flash, Actionscript 2.0/3.0">
        <META NAME="author" CONTENT="James Hood">
        <META NAME="ROBOTS" CONTENT="ALL">
        <title>Gallery Viewer, Showing you
            <?php echo $gview?>/
                <?php echo $gimage?>
        </title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <div id="galleryviewer">
            <img src="images/<?php echo $gview?>/<?php echo $gimage?>">
        </div>
    </body>

</html>