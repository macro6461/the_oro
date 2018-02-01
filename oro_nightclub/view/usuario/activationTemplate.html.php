<?php

use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\view\viewClass as view;
?>

<div class="login">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="modal-header" align="center">
            <img class="img-responsive" src="<?php echo routing::getInstance()->getUrlImg("logo/logo.png"); ?>">
        </div>

        <div class="text-center">
            <div style="background-color: rgb(104, 152, 67); color: #FFF; padding: 9px;">
                <h1 class="">BRG Account Activation Process</h1>
            </div>

            <?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
              <?php view::includeHandlerMessage() ?>
            <?php endif ?>
        </div>
        </br>
        <div class="">
            <?php if (session::getInstance()->hasFlash("active")) { ?>
              <div class="panel panel-bohemia">
                  <div class="panel-heading">
                      <h2 class="panel-title text-center"><b>Set Up Your BRG Account Information</b></h2>
                  </div>
                  <div class="panel-body">

                      <form id="activation" class="form-horizontal form-label-left input_mask" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("profile", "create", array('activation_hash' => request::getInstance()->getGet("hash"))); ?>">

                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h3 class="panel-title"><b>Profile Information</b></h3>
                              </div>
                              <div class="panel-body">
                                  <div class="alert alertbrg alert-dismissible" role="alert">
                                      <p>
                                          <i class="fa fa-info-circle" aria-hidden="true"></i> Information: Enter the following information to complete your activation  for your BRG Account.<br>
                                      </p>
                                  </div>
                                  <p><small> Fields marked with (*) are mandatory.</small></p>
                                  <div class="form-group">
                                      <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo profileTableClass::getNameField(profileTableClass::FIRST_NAME, true) ?>"><b> First Name</b></label>
                                          <input type="text" class="form-control has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::FIRST_NAME, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::FIRST_NAME, true) ?>" placeholder="Enter First Name(s)" required>
                                          <span class="fa  form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                      <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo profileTableClass::getNameField(profileTableClass::MIDDLE_NAME, true) ?>"><b> Middle Name</b></label>
                                          <input type="text" class="form-control  has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::MIDDLE_NAME, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::MIDDLE_NAME, true) ?>" placeholder="Enter Middle Name" >
                                          <span class="fa  form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                      <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo profileTableClass::getNameField(profileTableClass::LAST_NAME, true) ?>"><b> Last Name(s)</b></label>
                                          <input type="text" class="form-control  has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::LAST_NAME, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::LAST_NAME, true) ?>" placeholder="Enter Last Name(s)" required>
                                          <span class="fa  form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo profileTableClass::getNameField(profileTableClass::EMAIL_ADDRESS, true) ?>"><b> Email Address</b></label>
                                          <input type="text" class="form-control has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::EMAIL_ADDRESS, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::EMAIL_ADDRESS, true) ?>" placeholder="Email Address" value="<?php echo $objUser[0]->email_address; ?>" readonly>
                                          <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                      </div>

                                      <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo profileTableClass::getNameField(profileTableClass::PHONE_NUMBER, true) ?>"><b> Primary Phone Number</b></label>
                                          <input type="text" class="form-control  has-feedback-left phone" name="<?php echo profileTableClass::getNameField(profileTableClass::PHONE_NUMBER, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::PHONE_NUMBER, true) ?>" placeholder="Primary Phone Number" required>
                                          <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                      <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo profileTableClass::getNameField(profileTableClass::EXT_PHONE_NUMBER, true) ?>"><b> Primary Ext (if applicable)</b></label>
                                          <input type="text" class="form-control  has-feedback-left"  name="<?php echo profileTableClass::getNameField(profileTableClass::EXT_PHONE_NUMBER, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::EXT_PHONE_NUMBER, true) ?>" placeholder="Ext(if applicable)">
                                          <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo profileTableClass::getNameField(profileTableClass::PROFILE_BIO_SUMMARY, true) ?>"><b> Bio Summary</b></label>
                                          <textarea type="text" class="form-control has-feedback-left" rows="5" name="<?php echo profileTableClass::getNameField(profileTableClass::PROFILE_BIO_SUMMARY, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::PROFILE_BIO_SUMMARY, true) ?>" placeholder=" Bio Short story..."  ></textarea>
                                          <span class="form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo profileTableClass::getNameField(profileTableClass::PROFILE_BIO, true) ?>"><b> Biography</b></label>
                                          <textarea type="text" class="form-control has-feedback-left" rows="6" name="<?php echo profileTableClass::getNameField(profileTableClass::PROFILE_BIO, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::PROFILE_BIO, true) ?>" placeholder="Tell us your story..."  ></textarea>
                                          <span class="form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="panel panel-bohemia">
                              <div class="panel-heading">
                                  <h3 class="panel-title"><b>Contact Information</b></h3>
                              </div>
                              <div class="panel-body">
                                  <p><small> Fields marked with (*) are mandatory.</small></p>
                                  <div class="form-group">

                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo profileTableClass::getNameField(profileTableClass::OFFICE_PHONE_NUMBER, true) ?>"><b> Company Phone Number</b></label>
                                          <input type="text" class="form-control has-feedback-left phone" name="<?php echo profileTableClass::getNameField(profileTableClass::OFFICE_PHONE_NUMBER, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::OFFICE_PHONE_NUMBER, true) ?>" placeholder="Office Phone Number" value="(212)-663-6215" >
                                          <span class=" form-control-feedback left" aria-hidden="true"></span>
                                      </div>

                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo profileTableClass::getNameField(profileTableClass::OFFICE_EXT_NUMBER, true) ?>"><b> Company Ring Central Ext (if applicable)</b></label>
                                          <input type="text" class="form-control  has-feedback-left " name="<?php echo profileTableClass::getNameField(profileTableClass::OFFICE_EXT_NUMBER, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::OFFICE_EXT_NUMBER, true) ?>"  placeholder="Ext(if applicable)" >
                                          <span class=" form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                      
                                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo profileTableClass::getNameField(profileTableClass::FAX_NUMBER, true) ?>"><b> Company Fax Number</b></label>
                                          <input type="text" class="form-control has-feedback-left phone" name="<?php echo profileTableClass::getNameField(profileTableClass::FAX_NUMBER, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::FAX_NUMBER, true) ?>" placeholder="Fax Number" value="(866)-598-1059" >
                                          <span class=" form-control-feedback left" aria-hidden="true"></span>
                                      </div>

                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo profileTableClass::getNameField(profileTableClass::FACEBOOK_LINK, true) ?>"><i class="fa fa-facebook-official" aria-hidden="true"></i><b> Facebook Link</b></label>
                                          <input type="text" class="form-control  has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::FACEBOOK_LINK, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::FACEBOOK_LINK, true) ?>"  placeholder="Enter Facebook Link" >
                                          <span class="fa fa-facebook-official form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo profileTableClass::getNameField(profileTableClass::TWITTER_LINK, true) ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i><b> Twitter Link</b></label>
                                          <input type="text" class="form-control  has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::TWITTER_LINK, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::TWITTER_LINK, true) ?>"  placeholder="Enter Twitter Link" >
                                          <span class="fa fa-twitter-square form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo profileTableClass::getNameField(profileTableClass::INSTAGRAM_LINK, true) ?>"><i class="fa fa-instagram" aria-hidden="true"></i><b> Instagram Link</b></label>
                                          <input type="text" class="form-control  has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::INSTAGRAM_LINK, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::INSTAGRAM_LINK, true) ?>"  placeholder="Enter Instagram Link" >
                                          <span class="fa fa-twitter-square form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo profileTableClass::getNameField(profileTableClass::POSITION, true) ?>"><b> Designation / Position</b></label>
                                          <input type="text" class="form-control  has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::POSITION, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::POSITION, true) ?>"  placeholder="Enter Designation/position" >
                                          <span class=" form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="panel panel-bohemia">
                              <div class="panel-heading">
                                  <h3 class="panel-title"><b>Set Up Your Username & Password</b></h3>
                              </div>
                              <div class="panel-body">
                                  <p><small> Fields marked with (*) are mandatory.</small></p>
                                  <div class="form-group">
                                      <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>"><b> Username</b></label>
                                          <input type="text" class="form-control  has-feedback-left" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>"  placeholder="Enter New Username" required>
                                          <span class="fa fa-user-circle-o form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>"><b> New Password</b></label>
                                          <input type="password" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>"  placeholder="Enter New Password" required>
                                          <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                                      </div>

                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                          <label for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>"><b> Confirm Password</b></label>
                                          <input type="password" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>_confirm" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>_confirm" placeholder="Confirm New Password" required>
                                          <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group text-center">
                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Set Up Account</button>
                          </div>
                      </form>

                  </div>
              </div>
              <script type="text/javascript">
                $(document).ready(function () {

                    $('#activation').formValidation({
                        framework: 'bootstrap',
                        err: {
                            container: 'tooltip'
                        },
                        icon: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        addOns: {
                            mandatoryIcon: {
                                icon: 'glyphicon glyphicon-asterisk'
                            }
                        },
                        fields: {
  <?php echo profileTableClass::getNameField(profileTableClass::FIRST_NAME, true) ?>: {
                                validators: {
                                    notEmpty: {
                                        message: 'The first name is required'
                                    },
                                    stringLength: {
                                        max: <?php echo profileTableClass::FIRST_NAME_LENGTH ?>,
                                        message: 'The first name must be less than <?php echo profileTableClass::FIRST_NAME_LENGTH; ?> characters long'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z ]/,
                                        message: 'The first name can only consist of alphabetical, and spaces.'
                                    }
                                }
                            },
  <?php echo profileTableClass::getNameField(profileTableClass::LAST_NAME, true) ?>: {
                                validators: {
                                    notEmpty: {
                                        message: 'The last name is required'
                                    },
                                    stringLength: {
                                        max: <?php echo profileTableClass::LAST_NAME_LENGTH ?>,
                                        message: 'The last name must be less than <?php echo profileTableClass::LAST_NAME_LENGTH; ?> characters long'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z ]/,
                                        message: 'The last name can only consist of alphabetical, and spaces.'
                                    }
                                }
                            },
  <?php echo profileTableClass::getNameField(profileTableClass::EMAIL_ADDRESS, true); ?>: {
                                validators: {
                                    notEmpty: {
                                        message: 'The email address is required'
                                    },
                                    emailAddress: {
                                        message: 'The value is not a valid email address'
                                    },
                                    regexp: {
                                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                        message: 'The value is not a valid email address'
                                    },
                                    stringLength: {
                                        max: <?php echo profileTableClass::EMAIL_ADDRESS_LENGTH; ?>,
                                        message: 'The email address must be less than <?php echo profileTableClass::EMAIL_ADDRESS_LENGTH; ?> characters long'
                                    }
                                }
                            },
  <?php echo profileTableClass::getNameField(profileTableClass::PHONE_NUMBER, true); ?>: {
                                validators: {
                                    notEmpty: {
                                        message: 'The phone number is required'
                                    }
                                }
                            },
  <?php echo profileTableClass::getNameField(profileTableClass::PROFILE_BIO_SUMMARY, true); ?>: {
                                validators: {
                                    notEmpty: {
                                        message: 'The Bio Summary is required'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z ]/,
                                        message: 'The Bio Summary can only consist of alphabetical, and spaces.'
                                    },
                                     stringLength: {
                                        max: <?php echo profileTableClass::PROFILE_BIO_SUMMARY_LENGTH; ?>,
                                        message: 'The Bio Summary must be less than <?php echo profileTableClass::PROFILE_BIO_SUMMARY_LENGTH; ?> characters long'
                                    }
                                }
                            },
  <?php echo profileTableClass::getNameField(profileTableClass::PROFILE_BIO, true); ?>: {
                                validators: {
                                    notEmpty: {
                                        message: 'The Biography is required'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z ]/,
                                        message: 'The Biography can only consist of alphabetical, and spaces.'
                                    }
                                }
                            },


                        }
                    });

                    $('.phone').mask('(999)-999-9999');
                });
              </script>
            <?php } elseif (session::getInstance()->hasFlash("exception")) { ?>
              <div class="" data-example-id="simple-jumbotron">
                  <div class="jumbotron" style="background-image: url('<?php echo routing::getInstance()->getUrlImg("logo/welcome_banner.png"); ?>' ); background-repeat:  no-repeat; background-size:100% auto; padding-bottom: 20%; margin-bottom: 5px;">
                      <p>The  Application encountered an error and it couldn't complete your request.<br> Your <b>Activation Link</b> is not valid!.</p>
                      <a href="<?php echo routing::getInstance()->getUrlWeb("shfSecurity", "index") ?>" class="btn btn-success"><i class="fa fa-external-link-square" aria-hidden="true"></i> Go to Homepage</a>
                  </div>
              </div>
            <?php } elseif (session::getInstance()->hasFlash("hash")) { ?>
              <div class="" data-example-id="simple-jumbotron">
                  <div class="jumbotron" style="background-image: url('<?php echo routing::getInstance()->getUrlImg("logo/welcome_banner.png"); ?>' ); background-repeat:  no-repeat; background-size:100% auto; padding-bottom: 20%; margin-bottom: 5px;">
                      <a href="<?php echo routing::getInstance()->getUrlWeb("shfSecurity", "index") ?>" class="btn btn-success"><i class="fa fa-external-link-square" aria-hidden="true"></i> Go to Homepage</a>
                  </div>
              </div>
            <?php } ?>
            <div style="border-top: 2px solid; border-color: rgb(104, 152, 67); padding: 10px; ">
                <p>Copyright © <?php echo date("Y"); ?>. All Rights Reserved. Bohemia Realty Group, LLC</p>
            </div>


        </div>

    </div>
</div>