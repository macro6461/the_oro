<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>
    <!-- ********************************************************** FOOTER BAR **************************************************  -->
<footer>
    <div class="pull-right">
        Copyright <i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date("Y"); ?>. All rights reserved. <a href="<?php echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile(); ?>" target="_blank">Bohemia Realty Group, LLC</a>
    </div>
    <div class="clearfix"></div>
</footer>
    <!-- ********************************************************** END FOOTER BAR **************************************************  -->
