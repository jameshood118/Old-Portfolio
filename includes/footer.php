<?php 
function autoUpdatingCopyright($startYear){
 
    // given start year (e.g. 2004)
    $startYear = intval($startYear);
 
    // current year (e.g. 2007)
    $year = intval(date('Y'));
 
    // is the current year greater than the
    // given start year?
    if ($year > $startYear)
        return $startYear .'-'. $year;
    else
        return $startYear;
}
?>
<BR />

&copy; <?php echo autoUpdatingCopyright(2009);?> James Hood. All Rights Reserved. Site By<a href="http://www.jameshood118.net" class="menuLink"> Hood Studios</a>



