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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="JqueryUI/css/ui-darkness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="styles.css">

    <script src="JqueryUI/js/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript">
        function OpenWindow(ShownGallery, ImageName) {

            $("#GalleryWindow").dialog({
                height: 600,
                width: 600,
                modal: true,
                title: ShownGallery + "/" + ImageName
            });

            $("#GalleryWindow").empty().append('<img src="images/' + ShownGallery + '/' + ImageName + '" style="max-height:500px; max-width:500px;">');

        }
    </script>
</head>

<body>
        <?php include_once("includes/analyticstracking.php") ?>
    <div id="wrap">
        <?php include("includes/menu.php"); ?>
            <div id="gallery">
                <div id="GalleryWindow"></div>
                <?php
	
		

include("includes/db.php"); 

$table = "Galleries" ;

$show_all = "SELECT * FROM $table ORDER BY category ";

mysql_connect ($host,$user,$pass) or die ();
mysql_select_db ($db)or die ();
$result = mysql_query ($show_all) or die ();

while ($row = mysql_fetch_array ($result))
{

$Idnum = $row[ "Idnum" ]."";
$name = $row[ "Name" ]."";
$gallery = $row[ "category" ]."";
$linkname = $row[ "link_name" ]."";

if ($linkname =='') {
	$passed_name = $name;
	} else {
    $passed_name = $linkname;
		}

?>

                    <a href="#Window" onClick="OpenWindow('<?php echo $gallery?>', '<?php echo $passed_name?>');" gallery="<?php echo $gallery?>" title="<?php echo $name?>" linkname="<?php echo $linkname?>">
<img src="images/<?php echo $gallery?>/<?php echo $name?>" width=200></a>

                    <?php
$number=$number+1;

if ($number>3){
print ('<BR>');
$number=0;
}
}


?>
            </div>

    </div>
    <BR>
    <BR>
    <div id="footer">
        <?php include("includes/bottommenu.php"); ?>
            <?php include("includes/footer.php"); ?>

    </div>

</body>

</html>