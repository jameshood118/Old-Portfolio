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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="JqueryUI/css/ui-darkness/jquery-ui.css">

    <script src="JqueryUI/js/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript">
        var Site;

        function OpenWindow(Idnum) {
            $.ajax({
                url: '/Sites-LookUp.php?Idnum=' + Idnum,
                type: 'GET',
                dataType: "text",
                error: function (e) {
                    alert(e)
                },
                success: function (data) {
                    Site = data;

                    $("#GalleryWindow").dialog({
                        height: 600,
                        width: 600,
                        modal: true
                    });
                    $("#GalleryWindow").empty().append(Site);
                }
            });
        }
    </script>
</head>

<body>
        <?php include_once("includes/analyticstracking.php") ?>
    <div id="wrap">

        <?php include("includes/menu.php"); ?>
            <BR>
            <BR>
            <div id="gallery">
                <div id="GalleryWindow"></div>
                <h1>Sites I have worked on</h1>

                <?php 

include("includes/db.php");
$table = "sites" ;

$show_all = "SELECT * FROM $table WHERE Category='production' ORDER BY Idnum DESC";

$number=0;

mysql_connect ($host,$user,$pass) or die ( mysql_error ());
mysql_select_db ($db)or die ( mysql_error ());
$result = mysql_query ($show_all) or die ( mysql_error ());


while ($row = mysql_fetch_array ($result))

{

$Idnum = $row[ "Idnum" ]."";
$name = $row[ "Name" ]."";
$address = $row[ "Address" ]."";
$role = $row[ "Role" ]."";
$company = $row[ "Company" ]."";
$image = $row[ "Image" ]."";
$category = $row[ "Category" ]."";
$description = $row[ "Description" ]."";

print ('<img class="sitesbadge" src="/images/sites/'.$image.'" onClick="OpenWindow('.$Idnum.');"/>');

$number=$number+1;

if ($number>3){
print ('<BR>');
$number=0;
}

}

?>

            </div>


    </div>
    <div id="footer">
        <?php include("includes/bottommenu.php"); ?>
            <?php include("includes/footer.php"); ?>

    </div>
    <BR>
    <BR>



</body>

</html>