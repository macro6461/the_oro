<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
use mvc\config\myConfigClass as config;

$profileFistName = profileTableClass::FIRST_NAME;
$profileLastName = profileTableClass::LAST_NAME;
$profile_hash = profileTableClass::PROFILE_HASH;
?>
<!-- ********************************************************** MENU SIDE BAR **************************************************  -->
<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php //echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile();                                      ?>" class="site_title"><i class="fa fa-building-o" aria-hidden="true"></i> <span> <b> <?php echo config::getSohoFrameworkAccronName() ?> CRM</b> <small><?php echo config::getSohoFrameworkVersion() ?></small></span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo routing::getInstance()->getUrlImg("logo/logo1.png"); ?>" alt="agent_profile" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h4><b>WELCOME,</b></h4>
                <h2><?php
                    if (empty($objProfile)) {
                      echo session::getInstance()->getUserName();
                    } else {
                      echo $objProfile[0]->$profileFistName;
                      ?> <?php
                      echo $objProfile[0]->$profileLastName;
                    }
                    ?>
                </h2>
<!--                 <span>Last Login <?php ?></span>-->
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                    <li>
                        <a href="<?php echo routing::getInstance()->getUrlWeb("default", "init"); ?>"><i class="fa fa-home"></i> DASHBOARD </a>

                    </li>
<!--                    <li><a><i class="fa fa-building-o" aria-hidden="true"></i> PERSONAL<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Splits Manager</a></li>
                            <li><a href="#">New Deal</a></li>
                            <li><a href="#">My Deals</a></li>
                            <li><a href="#">Deal Sheets</a></li>
                            <li><a href="#">Performance Stats</a></li>
                            <li><a href="#">Follow up Alerts</a></li>
                            <li><a href="#">Activity Tracking</a></li>
                        </ul>
                    </li> -->
                     <li><a><i class="fa fa-" aria-hidden="true"></i> PERSONAL <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Split Manager</a></li>
                            <li><a href="#">My Deals</a></li>
                            <li><a href="#">New Deals</a></li>
                            <li><a href="#">Deal Sheets</a></li>
                            <li><a href="#">Performance Stats</a></li>
                            <li><a href="#">Follow Up Alerts</a></li>
                            <li><a href="#">Activity Tracking</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-map-marker" aria-hidden="true"></i> VACANCIES <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo routing::getInstance()->getUrlWeb("listing", "search"); ?>">Search Listings</a></li>
                            <li><a href="#">My Saved Searches</a></li>
                            <li><a href="<?php echo routing::getInstance()->getUrlWeb("listing", "index"); ?>">Add a Listing</a></li>
                            <li><a href="<?php echo routing::getInstance()->getUrlWeb("listing", "account"); ?>">My Listings</a></li>
                            <?php
                            if (session::getInstance()->getFlash("listing_edit")) {
                              ?>
                              <li><a href="<?php echo routing::getInstance()->getUrlWeb("listing", "edit"); ?>">Edit Listing</a></li>
                              <?php
                            }
                            ?>
                            <?php
                            if (session::getInstance()->getFlash("listing_manage")) {
                              ?>
                              <li><a href="<?php echo routing::getInstance()->getUrlWeb("listing", "manage"); ?>">Manage Listing</a></li>
                              <?php
                            }
                            ?>
                            <li><a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "index"); ?>">Landlords & Buildings</a></li>
                            <?php
                            if (session::getInstance()->getFlash("manage")) {
                              ?>
                              <li class="active"><a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage"); ?>">Manage Landlord</a></li>
                              <?php
                            }
                            if (session::getInstance()->getFlash("building_manage")) {
                              ?>
                              <li class="active"><a href="<?php echo routing::getInstance()->getUrlWeb("building", "manage"); ?>">Manage Building</a></li>
                              <?php
                            }

                            if (session::getInstance()->getFlash("landlord_edit")) {
                              ?>
                              <li class="active"><a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "edit"); ?>">Edit Landlord</a></li>
                              <?php
                            }

                            if (session::getInstance()->getFlash("procedures_index")) {
                              ?>
                              <li class="active"><a href="<?php echo routing::getInstance()->getUrlWeb("procedures", "index"); ?>">Add Procedures</a></li>
                              <?php
                            }

                            if (session::getInstance()->getFlash("procedures_edit")) {
                              ?>
                              <li class="active"><a href="<?php echo routing::getInstance()->getUrlWeb("procedures", "edit"); ?>">Edit Procedures</a></li>
                              <?php
                            }

                            if (session::getInstance()->getFlash("building_edit")) {
                              ?>
                              <li class="active"><a href="<?php echo routing::getInstance()->getUrlWeb("building", "edit"); ?>">Edit Building</a></li>
                              <?php
                            }
                            ?>
                            <?php
                            if (session::getInstance()->getFlash("building")) {
                              ?>
                              <li class="active"><a href="<?php echo routing::getInstance()->getUrlWeb("building", "index"); ?>"> Buildings</a></li>
                              <?php
                            }
                            ?>
                            <?php
                            if (session::getInstance()->getFlash("add_ad")) {
                              ?>
                              <li class="active"><a href="<?php echo routing::getInstance()->getUrlWeb("ad", "add"); ?>"> Add Ad</a></li>
                              <?php
                            }
                            ?>
                            <li><a href="<?php echo routing::getInstance()->getUrlWeb("syncdication_log", "index"); ?>">Syndication Log</a></li>

                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-book" aria-hidden="true"></i> APPS & INFO <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Landlord</a></li>
                            <li><a href="#">General</a></li>
                        </ul>  
                    </li>
                    <li><a><i class="fa fa-money" aria-hidden="true"></i> BBUCKS <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Transaction History</a></li>

                        </ul>
                    </li>
                    <!--
                    <li><a><i class="fa fa-rocket" aria-hidden="true"></i> APPS & INFO<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Transaction History</a></li>

                        </ul>
                    </li>
                    <li><a><i class="fa fa-file-text-o" aria-hidden="true"></i>MY BLOGS <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#"> New Blog Post</a></li>
                            <li><a href="#"> My Blogs Posts</a></li>
                            <li><a href="#"> Drafts</a></li>
                            <li><a href="#"> Categories</a></li>
                        </ul>
                    </li>-->
                    <!--                    <li>
                                            <a><i class="fa fa-server" aria-hidden="true"></i> BRGDM <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="<?php echo routing::getInstance()->getUrlWeb("brgdm", "index") ?>">Projects Manager</a></li>
                                                <li><a href="<?php echo routing::getInstance()->getUrlWeb("brgdm", "savoyPark") ?>">Savoy Park Apartments</a></li>
                                            </ul>  
                                        </li>-->
                    <li>
                        <a><i class="fa fa-server" aria-hidden="true"></i> MANAGEMENT <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo routing::getInstance()->getUrlWeb("usuario", "index"); ?>">Manage Users</a></li>
                            <li><a href="<?php echo routing::getInstance()->getUrlWeb("team", "index") ?>">Manage Teams</a></li>
                            <?php
                            if (session::getInstance()->getFlash("team_type")) {
                              ?>
                              <li><a href="<?php echo routing::getInstance()->getUrlWeb("team_type", "index") ?>">Team Types Manager</a></li>
                              <?php
                            }
                            ?>
                            <?php
                            if (session::getInstance()->getFlash("view_profile")) {
                              ?>
                              <li><a href="<?php echo routing::getInstance()->getUrlWeb("profile", "view") ?>">view User Profile</a></li>
                              <?php
                            }
                            ?>
                            <li><a href="<?php echo routing::getInstance()->getUrlWeb("credencial", "index") ?>">User Roles</a></li>
                            <?php
                            if (session::getInstance()->getFlash("credential_manage")) {
                              ?>
                              <li><a href="<?php echo routing::getInstance()->getUrlWeb("credencial", "manage") ?>">Manage User Role</a></li>
                              <?php
                            }
                            ?>
                        </ul>  
                    </li>

                    <!--
                                        <li>
                                            <a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i> News & Notes</a></li>
                                                <li><a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> Motivational Tickers</a></li>
                                                <li><a href="#"><i class="fa fa-file-image-o" aria-hidden="true"></i> Gallery</a></li>
                    
                                            </ul>
                                        </li>-->

                    <li><a><i class="fa fa-user-circle" aria-hidden="true"></i> MY ACCOUNT <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href="<?php echo routing::getInstance()->getUrlWeb("profile", "index", array(profileTableClass::getNameField(profileTableClass::PROFILE_HASH, true) => $objProfile[0]->$profile_hash)); ?>">My Profile</a></li>


                            <?php
                            if (session::getInstance()->getFlash("profile_edit")) {
                              ?>
                              <li class="active"><a href="<?php echo routing::getInstance()->getUrlWeb("profile", "edit"); ?>">My Profile Settings</a></li>
                              <?php
                            }
                            ?>
                            <?php
                            if (session::getInstance()->getFlash("profile_view")) {
                              ?>
                              <li class="active"><a href="<?php echo routing::getInstance()->getUrlWeb("profile", "index", array(profileTableClass::getNameField(profileTableClass::PROFILE_HASH, true) => mvc\request\requestClass::getInstance()->getGet(profileTableClass::getNameField(profileTableClass::PROFILE_HASH, true)))); ?>"> View Profile</a></li>
                              <?php
                            }
                            ?>
<!--                            <li class="active"><a href="<?php echo routing::getInstance()->getUrlWeb("profile", "edit"); ?>">My Reviews</a></li>-->
                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop" aria-hidden="true"></i> CMS  <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo routing::getInstance()->getUrlWeb("cms_site_pages", "index") ?>"> Site Pages Manager</a>
                                <!--                                <ul class="nav child_menu">
                                                                    <li><a href="#"> Published</a></li>
                                                                    <li><a href="#">Drafts</a></li>
                                                                </ul>-->
                            </li>
                            <li><a href="<?php echo routing::getInstance()->getUrlWeb("cms_blogs", "index") ?>" > Blogs Manager </a>

                            <li><a href="<?php echo routing::getInstance()->getUrlWeb("cms_blogs", "insert") ?>">Add New Blog Post</a></li>

                            <?php
                            if (session::getInstance()->getFlash("edit_blog_post")) {
                              ?>
                              <ul class="nav child_menu">
                                  <li><a href="<?php echo routing::getInstance()->getUrlWeb("cms_blogs", "edit") ?>"> Edit Blog Post</a></li>
                              </ul>                                     
                              <?php
                            }
                            ?>
                    </li>
                    <li><a> Media <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#"> All Media</a></li>
                            <li><a href="#">Images</a></li>
                            <li><a href="#">Documents</a></li>
                            <li><a href="#">Video</a></li>
                            <li><a href="#">Audio</a></li>
                        </ul>
                    </li>
                </ul>
                </li>
              
                 <li><a><i class="fa fa-briefcase" aria-hidden="true"></i> HIRING <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo  routing::getInstance()->getUrlWeb("hiring", "event") ?>"> Events</a></li>
                         <li><a href="#"> Company Leads</a></li>
                         <li><a href="#"> Interviews</a></li>
                         <li><a href="#"> RSVP'S</a></li>
                         
                    </ul>
                </li>
                <li><a><i class="fa fa-cogs" aria-hidden="true"></i> SETTINGS <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <!--                            <li><a href="#">General</a></li>-->
                        <li><a href="<?php echo routing::getInstance()->getUrlWeb("company", "index") ?>">Company Settings</a></li>
                        <!--                            <li><a href="#">Finantial Settings</a></li>
                                                    <li><a href="#">Location / Date Time</a></li>
                                                    <li><a href="#">E-mail Settings</a></li>
                                                    <li><a href="#">Other Settings</a></li>-->
                    </ul>
                </li>
                <?php //}    ?>
                <li><a><i class="fa fa-cogs" aria-hidden="true"></i> SYSTEM <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                        <li><a href="<?php echo routing::getInstance()->getUrlWeb("neighborhood", "index") ?>">Neighborhood</a></li>

                    </ul>
                </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>APP TOOLS</h3>
                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> BRG CCF </a>
                        <ul class="nav child_menu">
                            <li><a href="https://bohemiarealtygroup.com/guestRegistration/settings.php" target="_blank"> Login</a></li>
                            <li><a href="https://bohemiarealtygroup.com/guest-registration" target="_blank"> Guest Registration Form</a></li>
                        </ul>

                    </li>
                    <!--                    <li>
                                            <a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> The Ammann CCF </a>
                                            <ul class="nav child_menu">
                                                <li><a href="<?php echo routing::getInstance()->getUrlWeb("guestRegistration", "admin"); ?>"> Login</a></li>
                                                 <li><a href="<?php echo routing::getInstance()->getUrlWeb("guestRegistration", "admin"); ?>"> The Amman Form</a></li>
                                            </ul>
                                        </li>-->
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a id="full_screen" data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a id="exit_full_screen" data-toggle="tooltip" data-placement="top" title="Exit FullScreen">
                <span class="glyphicon glyphicon-resize-small" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'logout') ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
<!-- ********************************************************** END MENU SIDE BAR **************************************************  -->
