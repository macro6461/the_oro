<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$userID = usuarioTableClass::ID;
$username = usuarioTableClass::USER;
$userPass = usuarioTableClass::PASSWORD;
$userEmail = usuarioTableClass::EMAIL_ADDRESS;
$userActive = usuarioTableClass::ACTIVED;

?>  

<div class="container body">
    <div class="main_container">
        <?php echo view::includePartial("partials/sideBar", array('objProfile' => $objProfile)); ?>
        <?php echo view::includePartial("partials/topBar", array('objProfile' => $objProfile)) ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-plus-square" aria-hidden="true"></i> Update User <?php echo session::getInstance()->getUserName();?> <small> Information</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <form class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("profile", "update"); ?>">

                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" name="profileFirstName" id="profileFirstName" placeholder="Enter First Name" required>
                                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                                            <input type="text" class="form-control" name="profileMiddleName" id="profileMiddleName" placeholder="Enter Middle Name" required>
                                                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                                            <input type="text" class="form-control" name="profileLastName" id="profileLastName" placeholder="Enter Last Name">
                                                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" name="profileEmailAddress" id="profileEmailAddress" placeholder="Email Address" required>
                                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                                        </div>

                                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                                            <input type="text" class="form-control" name="profilePhoneNumber" id="profilePhoneNumber" placeholder="Phone Number" required>
                                                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                            <input type="text" class="form-control" name="profileExt" id="profileExt" placeholder="Ext(if applicable)">
                                                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <p><i class="fa fa-user-circle" aria-hidden="true"></i> <b>Upload a Profile Photo</b></p>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <input type="file" class="form-control" id="profilePhoto" name="profilePhoto" />
                                                        <span class="fa fa-file-archive-o form-control-feedback right" aria-hidden="true"></span>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                    <button type="button" class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>

                                                    <button type="submit" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Update Profile</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <?php echo view::includePartial("partials/modal", array('objProfile' => $objProfile)) ?>
        <?php echo view::includePartial("partials/footer") ?>

    </div>
</div>
