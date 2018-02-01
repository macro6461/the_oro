<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
use mvc\request\requestClass as request;
?>

<div class="login">
    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
        <div class="modal-header" align="center">
            <img class="" id="img_logo" src="<?php echo routing::getInstance()->getUrlImg("logo/logo.png"); ?>">
        </div>
        <div class="">
            <div class="text-center">
                <div style="background-color: rgb(104, 152, 67); color: #FFF; padding: 9px;">
                    <h1 class="">BRG Account Activation Process</h1>
                </div>
                <?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
                  <?php view::includeHandlerMessage() ?>
                <?php endif ?>
                </br>
                <?php if (session::getInstance()->hasFlash("active")) { ?>
                  <div class="panel panel-default">
                      <div class="panel-body">

                          <form id="activation_profile_form" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("usuario", "activation", array('activation_hash' => request::getInstance()->getGet("hash") )); ?>">

                              <div class="panel panel-default">
                                  <div class="panel-body">
                                      <p><small> Please enter the following information to create your BRG Profile. Fields marked with (*) are mandatory.</small></p>
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
                                              <input type="text" class="form-control has-feedback-left" name="profileEmailAddress" id="profileEmailAddress" placeholder="Email Address" value="<?php echo $objUser[0]->email_address; ?>" readonly>
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
                                  <div class="panel-heading">
                                      <h3 class="panel-title"><i class="fa fa-user-circle" aria-hidden="true"></i>  Upload a Profile Photo</h3>
                                  </div>
                                  <div class="panel-body">
                                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                          <input type="file" class="form-control" id="profilePhoto" name="profilePhoto" />
                                          <span class="fa fa-file-archive-o form-control-feedback right" aria-hidden="true"></span>
                                      </div>


                                  </div>
                              </div>
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                      <button type="submit" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Update Profile Information</button>

                                      <a href="<?php echo routing::getInstance()->getUrlWeb("shfSecurity", "index") ?>" class="btn btn-default"><i class="fa fa-external-link-square" aria-hidden="true"></i> Skip to login</a>
                                  </div>
                              </div>
                          </form>

                      </div>
                  </div>
                <?php } elseif (session::getInstance()->hasFlash("exception")) { ?>
                  <div class="" data-example-id="simple-jumbotron">
                      <div class="jumbotron" style="background-image: url('<?php echo routing::getInstance()->getUrlImg("logo/welcome_banner.png");?>' ); background-repeat:  no-repeat; background-size:100% auto; padding-bottom: 20%; margin-bottom: 5px;">
                          <p>The  Application encountered an error and it couldn't complete your request.<br> Your <b>Activation Link</b> is not valid!.</p>
                          <a href="<?php echo routing::getInstance()->getUrlWeb("default", "index") ?>" class="btn btn-success"><i class="fa fa-external-link-square" aria-hidden="true"></i> Go to Homepage</a>
                      </div>
                  </div>
                <?php }elseif(session::getInstance()->hasFlash("hash")){ ?>
                  <div class="" data-example-id="simple-jumbotron">
                      <div class="jumbotron" style="background-image: url('<?php echo routing::getInstance()->getUrlImg("logo/welcome_banner.png");?>' ); background-repeat:  no-repeat; background-size:100% auto; padding-bottom: 20%; margin-bottom: 5px;">
                          <a href="<?php echo routing::getInstance()->getUrlWeb("default", "index") ?>" class="btn btn-success"><i class="fa fa-external-link-square" aria-hidden="true"></i> Go to Homepage</a>
                      </div>
                  </div>
                <?php } ?>
                  <div style="border-top: 2px solid; border-color: rgb(104, 152, 67); padding: 10px; ">
                    <p>Copyright © <?php echo date("Y"); ?>. All Rights Reserved. Bohemia Realty Group, LLC</p>
                </div>

            </div>
        </div>

    </div>
</div>