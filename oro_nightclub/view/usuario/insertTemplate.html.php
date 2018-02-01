<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
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
                        <?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
                          <?php view::includeHandlerMessage() ?>
                        <?php endif ?>
                        </br>
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-plus-square" aria-hidden="true"></i> Add User <small>Information</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <form class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("usuario", "create"); ?>">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">User Credentials</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" placeholder="Enter User Name" required>
                                                            <span class="fa fa-user-circle form-control-feedback left" aria-hidden="true"></span>
                                                        </div>

                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <input type="email" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true) ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true) ?>" placeholder="Enter Email Address" required>
                                                            <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                                                        </div>

                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <input type="password" class="form-control" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true) ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>" placeholder="Enter Password" required>
                                                            <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
                                                        </div>

                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <input type="password" class="form-control " id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>_confirm" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>_confirm" placeholder="Confirm Password" required>
                                                            <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                                                        </div>

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                    <a href="<?php echo routing::getInstance()->getUrlWeb("usuario", "index"); ?>" type="button" class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</a>
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Add User</button>
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
