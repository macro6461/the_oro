<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$profileFistName = profileTableClass::FIRST_NAME;
$profileLastName = profileTableClass::LAST_NAME;
$profile_hash = profileTableClass::PROFILE_HASH;
?>
<!-- ********************************************************** TOP BAR **************************************************  -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars fa-2x"></i></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo routing::getInstance()->getUrlImg('profile/user.png') ?>" class="avatar" alt="profile thumblr"><?php
                        if (empty($objProfile)) {
                          echo session::getInstance()->getUserName();
                        } else {
                          echo $objProfile[0]->$profileFistName;
                          ?> <?php
                          echo $objProfile[0]->$profileLastName;
                        }
                        ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <div class="gb_Jb">
                            This account is managed by <b>bohemiarealtygroup.com</b>
                        </div>
                        <li><a href="<?php echo routing::getInstance()->getUrlWeb("profile", "index", array(profileTableClass::getNameField(profileTableClass::PROFILE_HASH, true) => $objProfile[0]->$profile_hash)); ?>">My Profile</a></li>
                        <li><a href="javascript:;">Help</a></li>
                        <li><a href="#logout" data-toggle="modal" data-target="#logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
                <li class="hidden-xs">
                    <a href="<?php echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile(); ?>" target="_blank" class="info-number">
                        <i class="fa fa-desktop" aria-hidden="true"></i> Go to Bohemia Website
                    </a>
                </li>
                <!--                <li role="presentation" class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">6</span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="text-center">
                                                <a>
                                                    <strong>See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>-->

            </ul>

            <!--            <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <input type="button" class="btn btn-success" target="_blank"  onclick="location.href = 'http://google.com';" value="Website" />
                            </a>  
                        </li>-->
        </nav>

    </div>
    <div class="nav_menu visible-xs">
        <a class="btn btn-success btn-navbar btn-block" href="<?php echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile(); ?>" target="_blank"><i class="fa fa-desktop" aria-hidden="true"></i> Go to Bohemia Website </a>
    </div>
</div>



<!-- ********************************************************** END TOP BAR **************************************************  -->
