<?php

use mvc\config\myConfigClass as config;
use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>
<!-- ********************************************************** HEADER **************************************************  -->
<header class="page_header">
    <nav class="navbar">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"> <?php echo config::getSohoFrameworkAccronName(); ?> <small style="font-size: 65%;"><?php echo config::getSohoFrameworkVersion(); ?></small> | <span class="hidden-xs"><?php echo config::getSohoFrameworkAppName(); ?></span> </a>
            </div>
                <div class="collapse navbar-collapse"  id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">

                        <li>
                            <a style="color: #ffffff !important;" href="<?php echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile(); ?>" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i> BRG Website </a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>
</header>

    <!-- ********************************************************** END HEADER **************************************************  -->