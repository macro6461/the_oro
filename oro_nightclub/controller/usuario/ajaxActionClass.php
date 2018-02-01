<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ajaxActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class ajaxActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {

    try {

      if (request::getInstance()->isMethod("GET")) {
        if (isset($_GET['usuarios'])) {

          $fields = array(
              profileTableClass::FIRST_NAME,
              profileTableClass::MIDDLE_NAME,
              profileTableClass::LAST_NAME,
              profileTableClass::EMAIL_ADDRESS,
              profileTableClass::PHONE_NUMBER,
              profileTableClass::EXT_PHONE_NUMBER,
              profileTableClass::PROFILE_HASH
          );
          $where = array(
              profileTableClass::USUARIO_ID => session::getInstance()->getUserId()
          );
          $this->objProfile = profileTableClass::getAll($fields, true, null, null, null, null, $where);

          $fieldsUser = array(
              usuarioTableClass::ID,
              usuarioTableClass::USER,
              usuarioTableClass::PASSWORD,
              usuarioTableClass::EMAIL_ADDRESS,
              usuarioTableClass::ACTIVED,
              usuarioTableClass::USER_HASH,
              usuarioTableClass::LAST_LOGIN_AT,
              usuarioTableClass::CREATED_AT,
              usuarioTableClass::UPDATED_AT
          );

          if (request::getInstance()->hasGet("status")) {

            if (request::getInstance()->getGet("status") == "Active") {
              $status = 1;
            } elseif (request::getInstance()->getGet("status") == "Inactive") {
              $status = 2;
            } elseif (request::getInstance()->getGet("status") == "Archived") {
              $status = 3;
            } elseif (request::getInstance()->getGet("status") == "Invited") {
              $status = 0;
            }

            $where_filter = array(
                usuarioTableClass::ACTIVED => $status
            );
            $OrderBy_filter = array(
                usuarioTableClass::ID
            );
            $objUsers = usuarioTableClass::getAll($fieldsUser, true, $OrderBy_filter, 'ASC', null, null, $where_filter);
          } else {

            $usersOrderBy = array(
                usuarioTableClass::ID
            );
            $objUsers = usuarioTableClass::getAll($fieldsUser, true, $usersOrderBy, 'ASC');
          }





          $userID = usuarioTableClass::ID;
          $username = usuarioTableClass::USER;
          $userPass = usuarioTableClass::PASSWORD;
          $userEmail = usuarioTableClass::EMAIL_ADDRESS;
          $userActive = usuarioTableClass::ACTIVED;
          $user_hash = usuarioTableClass::USER_HASH;
          $user_last_login = usuarioTableClass::LAST_LOGIN_AT;

          $created_at = usuarioTableClass::CREATED_AT;
          $updated_at = usuarioTableClass::UPDATED_AT;

          foreach ($objUsers as $user) {

            if ($user->$userID != 1) {
              if (empty($user->$userID)) {

                $id_field = '<div class="text-center"><i class="fa fa-exclamation-circle" style="color: #cc0000" aria-hidden="true"></i></div>';
              } else {
                $id_field = $user->$userID;
              }

              $user_profile = profileTableClass::getProfileByUserId($user->$userID);
              if (empty($user_profile)) {

                $user_field = '<span class="mdl-chip mdl-chip--contact mdl-chip--deletable">
                <img class="mdl-chip__contact" src="' . routing::getInstance()->getUrlImg("logo/logo1.png") . '"></img>
                <span class="mdl-chip__text">TO SETUP</span>
            </span>';
              } else {
                $user_field = '<span class="mdl-chip mdl-chip--contact mdl-chip--deletable">
                <img class="mdl-chip__contact" src="' . routing::getInstance()->getUrlImg('profile/user.png') . '"></img>
                <span class="mdl-chip__text">' . $user_profile . '</span>
            </span>';
              }

              if (empty($user->$username)) {
                $username_field = '<div class="text-center"><i class="fa fa-exclamation-circle" style="color: #cc0000" aria-hidden="true"></i><button data-id="<?php echo $user->$user_hash; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn_set_user_credentials"> Set Username & Password</button></div>';
              } else {
                $username_field = $user->$username;
              }

              if ($user->$userActive == "1") {
                $status_field = '<button class="mdl-button mdl-js-button mdl-button--primary"> ACTIVE</button>';
              } elseif ($user->$userActive == "0") {
                $status_field = '<button class="mdl-button mdl-js-button "> INVITED</button>';
              } elseif ($user->$userActive == "2") {
                $status_field = '<button class="mdl-button mdl-js-button"> INACTIVE</button>';
              } else {
                $status_field = '<button type="button" class="mdl-button mdl-js-button">NO STATUS</button>';
              }
              if (empty($user->$userEmail)) {
                $email_field = '<div class="text-center"><i class="fa fa-exclamation-circle" style="color: #cc0000" aria-hidden="true"></i></div>';
              } else {
                $email_field = '<a href="mailto:' . $user->$userEmail . '" >' . $user->$userEmail . '</a>';
              }

              $user_credential = credencialTableClass::getNameCredencial(usuarioCredencialTableClass::getIdUserCredencial($user->$userID));
              if (empty($user_credential)) {
                $credencial_field = '<button class="mdl-button mdl-js-button mdl-button--info"> TO SETUP</button>';
              } else {
                $credencial_field = '<span class="mdl-chip">
                                <span class="mdl-chip__text">' . $user_credential . '</span>
                                 </span>';
              }
              if (empty($user->$user_last_login)) {
                $last_login_field = '<button class="mdl-button mdl-js-button mdl-button--info"> TO SETUP</button>';
              } else {
                $last_login_field = $user->$user_last_login;
              }

              if (empty($user->$created_at)) {
                $created_at_field = '<div class="text-center"><i class="fa fa-exclamation-circle" style="color: #cc0000" aria-hidden="true"></i></div>';
              } else {
                $created_at_field = $user->$created_at;
              }

              if (empty($user->$updated_at)) {
                $updated_at_field = '<button class="mdl-button mdl-js-button mdl-button--info"> NO UPDATES</button>';
              } else {
                $updated_at_field = $user->$updated_at;
              }
              $actions = '';
              if ($user->$userActive == "1") {
                $actions .= ' <a target="_blank" href="' . routing::getInstance()->getUrlWeb("profile", "view", array(profileTableClass::getNameField(profileTableClass::PROFILE_HASH, true) => $user->$user_hash)) . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " ><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a>';
              }
              $actions .= ' <button data-id="' . $user->$user_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnUpdate_user"><i class="fa fa-server" aria-hidden="true"></i> Manage</button>';
              if ($user->$userActive == "1") {
                $actions .= '<button data-id="' . $user->$user_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn_deactivate_user"><i class="fa fa-ban" aria-hidden="true"></i> Deactivate</button>';
              } else {
                $actions .= '<button data-id="' . $user->$user_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn_activate_user"><i class="fa fa-power-off" aria-hidden="true"></i> Activate</button>';
              }
              if ($user->$userActive == "1" || $user->$userActive == "2") {
                $actions .= '<button data-id="' . $user->$user_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn_update_Profile_photo_user"><i class="fa fa-image" aria-hidden="true"></i> Upload Profile Photo</button>';
              }
              if (empty($user->$username)) {
                $actions .= '<button data-id="' . $user->$user_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn_set_user_credentials"> Set Username & Password</button>';
              }
              $actions .= '<!--<a href="' . routing::getInstance()->getUrlWeb("profile", "edit", array(profileTableClass::getNameField(profileTableClass::PROFILE_HASH, true) => $user->$user_hash)) . '" data-id="' . $user->$user_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect "><i class="fa fa-briefcase" aria-hidden="true"></i>  ASSIGN TITLE</a>-->';
              $actions .= '<button data-id="' . $user->$user_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnDelete_user" type="button"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';

              $subdata = array();
              $subdata[] = $id_field;
              $subdata[] = $user_field;
              $subdata[] = $username_field;
              $subdata[] = $status_field;
              $subdata[] = $email_field;
              $subdata[] = $credencial_field;
              $subdata[] = $last_login_field;
              $subdata[] = $created_at_field;
              $subdata[] = $updated_at_field;
              $subdata[] = $actions;
              $data[] = $subdata;
            }
          }

          $json_data = array(
              "draw" => intval($request['draw']),
              "recordsTotal" => intval(count($objUsers)),
              "recordsFiltered" => intval(count($objUsers)),
              "data" => $data
          );

          echo json_encode($json_data);
        }
      }

      /**
       * update User parcial form
       */
      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['userID'])) {
          $user_hash = request::getInstance()->getPost("userID");

          $userID = usuarioTableClass::getIdNewUserByHash($user_hash);

          $credencials = array(
              credencialTableClass::ID,
              credencialTableClass::NOMBRE,
              credencialTableClass::CREATED_AT,
              credencialTableClass::UPDATED_AT,
              credencialTableClass::DELETED_AT,
          );
          $credencialOrderBy = array(
              credencialTableClass::ID
          );
          $objCredencials = credencialTableClass::getAll($credencials, true, $credencialOrderBy, 'ASC');
          $id = credencialTableClass::ID;
          $role = credencialTableClass::NOMBRE;
          $created_at = credencialTableClass::CREATED_AT;
          $updated_at = credencialTableClass::UPDATED_AT;

          $fields = array(
              profileTableClass::FIRST_NAME,
              profileTableClass::MIDDLE_NAME,
              profileTableClass::LAST_NAME
          );
          $where = array(
              profileTableClass::USUARIO_ID => $userID
          );
          $objProfileUser = profileTableClass::getAll($fields, true, null, null, null, null, $where);
          $userfields = array(
              usuarioTableClass::ID,
              usuarioTableClass::USER,
              usuarioTableClass::EMAIL_ADDRESS,
              usuarioTableClass::PASSWORD,
              usuarioTableClass::ACTIVED,
              usuarioTableClass::UPDATED_AT
          );
          $userwhere = array(
              usuarioTableClass::ID => $userID
          );
          $objUser = usuarioTableClass::getAll($userfields, true, null, null, null, null, $userwhere);
          $user = usuarioTableClass::USER;
          $email = usuarioTableClass::EMAIL_ADDRESS;
          $pass = usuarioTableClass::PASSWORD;
          $status = usuarioTableClass::ACTIVED;
          $updated_at = usuarioTableClass::UPDATED_AT;

          $usercredfields = array(
              usuarioCredencialTableClass::ID,
              usuarioCredencialTableClass::CREDENCIAL_ID,
              usuarioCredencialTableClass::USUARIO_ID
          );
          $usercredwhere = array(
              usuarioCredencialTableClass::USUARIO_ID => $userID
          );
          $objUserCredencial = usuarioCredencialTableClass::getAll($usercredfields, true, null, null, null, null, $usercredwhere);
          $idUserCredencial = usuarioCredencialTableClass::ID;
          if (empty($objProfileUser)) {
            $username = $objUser[0]->$user;
          } else {
            $firstName = profileTableClass::FIRST_NAME;
            $middleName = profileTableClass::MIDDLE_NAME;
            $lastName = profileTableClass::LAST_NAME;

            $username = $objProfileUser[0]->$firstName . " " . $objProfileUser[0]->$middleName . " " . $objProfileUser[0]->$lastName;
          }
          ?>
          <div class="panel panel-bohemia">
              <div class="panel-heading">
                  <h3 class="panel-title"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Manage User <?php echo $username; ?> <small></small></h2></h3>
              </div>
              <div class="panel-body">

                  <form id="updateUser" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("usuario", "update", array(usuarioTableClass::getNameField(usuarioTableClass::ID, true) => $userID)); ?>">

                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h3 class="panel-title">User Credentials</h3>
                          </div>
                          <div class="panel-body">
                              <p><small>Fields marked with (*) are mandatory.</small></p>
                              <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="text" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" value="<?php echo $objUser[0]->$user ?>" placeholder="Enter User Name" required readonly>
                                      <span class="fa fa-user-circle form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="email" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true) ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true) ?>" value="<?php echo $objUser[0]->$email ?>" placeholder="Enter Email Address" required>
                                      <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Role As</label>
                                      <div class="col-md-9 col-sm-9 col-xs-12 selectContainer">
                                          <select id="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true); ?>" name="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true); ?>" class="form-control">
                                              <option value="">Select Role</option>  
                                              <?php foreach ($this->getCredencials() as $credencial): ?>
                                                <?php
                                                $id = usuarioCredencialTableClass::getIdUserCredencial($userID);
                                                if ($id == $credencial->id) {
                                                  ?>
                                                  <option value="<?php echo $id ?>" selected><?php echo $credencial->nombre; ?></option>
                                                <?php } else { ?>
                                                  <option value="<?php echo $credencial->id ?>"><?php echo $credencial->nombre; ?></option>
                                                <?php } ?>
                                              <?php endforeach; ?>
                                          </select>
                                      </div>
                                  </div>

                              </div>
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                      <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnClose_update_user"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                                      <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Update User</button>
                                  </div>
                              </div>

                          </div>
                      </div>

                      <div class="ln_solid"></div>
                  </form>

                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div class=" pull-right">
                              <button data-id="<?php echo $userID; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnChange_pass" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Change Password</button>
                          </div>

                      </div>
                  </div>
                  <div id="changePassword_panel"></div>
              </div>
          </div> 
          <script>
            $(document).ready(function () {
                $('#updateUser').formValidation({
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
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The user name is required'
                                },
                                stringLength: {
                                    max: <?php echo usuarioTableClass::USER_LENGTH ?>,
                                    message: 'The user name must be less than <?php echo usuarioTableClass::getNameField(usuarioTableClass::USER_LENGTH, true); ?> characters long'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z ]/,
                                    message: 'The user name can only consist of alphabetical, and spaces.'
                                }
                            }
                        },
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true); ?>: {
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
                                    max: <?php echo usuarioTableClass::EMAIL_ADDRESS_LENGTH; ?>,
                                    message: 'The email address must be less than <?php echo usuarioTableClass::EMAIL_ADDRESS_LENGTH; ?> characters long'
                                }
                            }
                        },
          <?php echo credencialTableClass::getNameField(credencialTableClass::ID, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The user role is required'
                                }
                            }
                        }
                    }
                });

                //button change ´password function
                var btnChange_pass = $(".btnChange_pass");
                $(btnChange_pass).on('click', function () {
                    var idUser = $(this).data("id");
                    $.ajax({
                        async: true,
                        type: "POST",
                        dataType: "html",
                        contentType: "application/x-www-form-urlencoded",
                        url: "http://localhost/bohemiarealtygroup.com/web/index.php/users/ajax",
                        data: ('changePassId=' + idUser),
                        success: function (data) {
                            $('html, body').animate({scrollTop: $('#changePassword_panel').offset().top}, 'slow');
                            $("#changePassword_panel").show();
                            $("#changePassword_panel").html(data);
                        }
                    });
                });

                //button close delete user function
                var btnClose_update_user = $(".btnClose_update_user");
                $(btnClose_update_user).on('click', function () {
                    $("#user_update_panel").hide(300);
                    $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                });


            });
          </script>
          <?php
        }
      }

      /**
       * delete User parcial form
       */
      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['deleteUser'])) {
          $user_hash = request::getInstance()->getPost("deleteUser");

          $deleteUser = usuarioTableClass::getIdNewUserByHash($user_hash);

          $fields = array(
              profileTableClass::FIRST_NAME,
              profileTableClass::MIDDLE_NAME,
              profileTableClass::LAST_NAME
          );
          $where = array(
              profileTableClass::USUARIO_ID => $deleteUser
          );
          $objProfileUser = profileTableClass::getAll($fields, true, null, null, null, null, $where);
          if (empty($objProfileUser)) {
            $fields = array(
                usuarioTableClass::ID,
                usuarioTableClass::USER,
            );
            $where = array(
                usuarioTableClass::ID => $deleteUser
            );
            $objUser = usuarioTableClass::getAll($fields, true, null, null, null, null, $where);
            $user = usuarioTableClass::USER;
            $username = $objUser[0]->$user;
          } else {
            $firstName = profileTableClass::FIRST_NAME;
            $middleName = profileTableClass::MIDDLE_NAME;
            $lastName = profileTableClass::LAST_NAME;

            $username = $objProfileUser[0]->$firstName . " " . $objProfileUser[0]->$middleName . " " . $objProfileUser[0]->$lastName;
          }
          ?>
          <div class="panel panel-danger">
              <div class="panel-body">
                  <div class="btn-group  btn-group-sm pull-right">
                      <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnClose_delete" type="button"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel </a>
                      <a href="<?php echo routing::getInstance()->getUrlWeb("usuario", "delete", array(usuarioTableClass::getNameField(usuarioTableClass::ID, true) => $deleteUser)); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" type="button"><i class="fa fa-user-plus" aria-hidden="true"></i> Confirm Delete User <?php echo $username ?> </a>
                  </div>
              </div>
          </div>
          <script>
            $(document).ready(function () {

                //button close delete user function
                var btnClose_delete = $(".btnClose_delete");
                $(btnClose_delete).on('click', function () {
                    $("#deleteUser_panel").hide(300);
                    $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                });

            });
          </script>
          <?php
        }
      }

      /**
       * add User parcial form
       */
      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['addUser'])) {
          $addUser = request::getInstance()->getPost("addUser");
          ?>

          <div class="panel panel-bohemia">
              <div class="panel-heading">
                  <h3 class="panel-title">Add User<small></small></h3>
              </div>
              <div class="panel-body">

                  <form id="addUser" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("usuario", "create"); ?>">

                      <p><small>Fields marked with (*) are mandatory.</small></p>
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
                              <input type="password" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true) ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>" placeholder="Enter Password" required>
                              <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="password" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>_confirm" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>_confirm" placeholder="Confirm Password" required>
                              <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12"> Role As</label>
                              <div class="col-md-9 col-sm-9 col-xs-12 selectContainer">
                                  <select id="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true); ?>" name="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true); ?>" class="form-control">
                                      <option value="">Select User Role</option>  
                                      <?php foreach ($this->getCredencials() as $credencial): ?>
                                        <option value="<?php echo $credencial->id ?>"><?php echo $credencial->nombre; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                          </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="text-center">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnClose_adduser"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add User</button>
                          </div>
                      </div>
                  </form>

              </div>
          </div>
          <script>
            $(document).ready(function () {
                $('#addUser').formValidation({
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
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The user name is required'
                                },
                                stringLength: {
                                    max: <?php echo usuarioTableClass::USER_LENGTH ?>,
                                    message: 'The user name must be less than <?php echo usuarioTableClass::getNameField(usuarioTableClass::USER_LENGTH, true) ?> characters long'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z ]/,
                                    message: 'The user name can only consist of alphabetical, and spaces.'
                                }
                            }
                        },
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true); ?>: {
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
                                    max: <?php echo usuarioTableClass::EMAIL_ADDRESS_LENGTH; ?>,
                                    message: 'The email address must be less than <?php echo usuarioTableClass::EMAIL_ADDRESS_LENGTH; ?> characters long'
                                }
                            }
                        },
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Password is required'
                                },
                                identical: {
                                    field: <?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_confirm'; ?>,
                                    message: 'The Password and its confirmation are not the same'
                                },
                                stringLength: {
                                    min: 8,
                                    max: <?php echo usuarioTableClass::PASSWORD_LENGTH; ?>,
                                    message: 'The Password must be at least 8 characters long'
                                }

                            }
                        },
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_confirm'; ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Password is required'
                                },
                                identical: {
                                    field: '<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true); ?>',
                                    message: 'The Passwords must be the same.'
                                },
                                stringLength: {
                                    min: 8,
                                    max: <?php echo usuarioTableClass::PASSWORD_LENGTH; ?>,
                                    message: 'The Password must be at least 8 characters long'
                                }
                            }
                        },
          <?php echo credencialTableClass::getNameField(credencialTableClass::ID, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The user role is required'
                                }
                            }
                        }
                    }
                });

                //button close adduser user function
                var btnClose_adduser = $(".btnClose_adduser");
                $(btnClose_adduser).on('click', function () {
                    $("#addUser_panel").hide(300);
                    //$('html, body').animate({scrollTop: $('#usuarios').offset().top}, 'slow');
                });

            });
          </script>
          <?php
        }
      }

      /**
       * change password parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["changePassId"])) {
          $userID = request::getInstance()->getPost("changePassId");
          ?>

          <div class="panel panel-bohemia">
              <div class="panel-heading">
                  <h4 class="panel-title"></h4>
              </div>

              <div class="panel-body">
                  <form id="changePassword" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("usuario", "update", array('updatedUserID' => $userID)); ?>">
                      <p><small>Fields marked with (*) are mandatory.</small></p>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="password" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>"  placeholder="Enter New Password" required>
                              <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="password" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>_confirm" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>_confirm" placeholder="Confirm New Password" required>
                              <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnClose_changePass"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Save Password</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
          <script>
            $(document).ready(function () {
                $('#changePassword').formValidation({
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
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Password is required'
                                },
                                identical: {
                                    field: <?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_confirm'; ?>,
                                    message: 'The Password and its confirmation are not the same'
                                },
                                stringLength: {
                                    min: 8,
                                    max: <?php echo usuarioTableClass::PASSWORD_LENGTH; ?>,
                                    message: 'The Password must be at least 8 characters long'
                                }

                            }
                        },
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_confirm'; ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Password is required'
                                },
                                identical: {
                                    field: '<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true); ?>',
                                    message: 'The Passwords must be the same.'
                                },
                                stringLength: {
                                    min: 8,
                                    max: <?php echo usuarioTableClass::PASSWORD_LENGTH; ?>,
                                    message: 'The Password must be at least 8 characters long'
                                }
                            }
                        }
                    }
                });

                //button close change passwordd user function
                var btnClose_changePass = $(".btnClose_changePass");
                $(btnClose_changePass).on('click', function () {
                    $("#changePassword_panel").hide(300);
                    //$('html, body').animate({scrollTop: $('#usuarios').offset().top}, 'slow');
                });

            });
          </script>
          <?php
        }
      }


      /**
       * deactivate parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["deactivateUser"])) {
          $user_hash = request::getInstance()->getPost("deactivateUser");

          $fields = array(
              usuarioTableClass::ID,
              usuarioTableClass::USER,
              usuarioTableClass::PASSWORD,
              usuarioTableClass::EMAIL_ADDRESS,
              usuarioTableClass::ACTIVED,
              usuarioTableClass::USER_HASH,
              usuarioTableClass::LAST_LOGIN_AT,
              usuarioTableClass::CREATED_AT,
              usuarioTableClass::UPDATED_AT
          );
          $where = array(
              usuarioTableClass::USER_HASH => $user_hash
          );
          $objUser = usuarioTableClass::getAll($fields, true, null, null, null, null, $where);
          $user_id_field = usuarioTableClass::ID;
          $user_id = $objUser[0]->$user_id_field;
          $fields_profile = array(
              profileTableClass::FIRST_NAME,
              profileTableClass::MIDDLE_NAME,
              profileTableClass::LAST_NAME
          );
          $where_profile = array(
              profileTableClass::USUARIO_ID => $user_id
          );
          $objProfile = profileTableClass::getAll($fields_profile, true, null, null, null, null, $where_profile);

          $first_name_field = profileTableClass::FIRST_NAME;
          $last_name_field = profileTableClass::LAST_NAME;

          $first_name = $objProfile[0]->$first_name_field;
          $last_name = $objProfile[0]->$last_name_field;
          ?>
          <script>
            $(document).ready(function () {
                $('#deactivateUser').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="deactivateUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"> Deactivate User </h4>
                      </div>
                      <div class="modal-body">
                          <div class="row text-center" style="color: #cc0000"><i class="fa fa-exclamation-circle fa-4x" aria-hidden="true"></i></div>
                          <div class="text-center" > Do you want to Deactivate </br> <h3><b><?php echo $first_name; ?> <?php echo $last_name; ?></b></h3> Account?</div>
                      </div>
                      <div class=" modal-footer">
                          <div class="text-center">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                              <a href="<?php echo routing::getInstance()->getUrlWeb('usuario', 'deactivate', array(usuarioTableClass::getNameField(usuarioTableClass::ACTIVED, true) => $user_hash)) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">Yes, Confirm </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }

      /**
       * activate parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["activateUser"])) {
          $user_hash = request::getInstance()->getPost("activateUser");

          $fields = array(
              usuarioTableClass::ID,
              usuarioTableClass::USER,
              usuarioTableClass::PASSWORD,
              usuarioTableClass::EMAIL_ADDRESS,
              usuarioTableClass::ACTIVED,
              usuarioTableClass::USER_HASH,
              usuarioTableClass::LAST_LOGIN_AT,
              usuarioTableClass::CREATED_AT,
              usuarioTableClass::UPDATED_AT
          );
          $where = array(
              usuarioTableClass::USER_HASH => $user_hash
          );
          $objUser = usuarioTableClass::getAll($fields, true, null, null, null, null, $where);
          $user_id_field = usuarioTableClass::ID;
          $user_id = $objUser[0]->$user_id_field;

          if (profileTableClass::verifyProfile($user_id) != false) {

            $fields_profile = array(
                profileTableClass::FIRST_NAME,
                profileTableClass::MIDDLE_NAME,
                profileTableClass::LAST_NAME
            );
            $where_profile = array(
                profileTableClass::USUARIO_ID => $user_id
            );
            $objProfile = profileTableClass::getAll($fields_profile, true, null, null, null, null, $where_profile);

            $first_name_field = profileTableClass::FIRST_NAME;
            $last_name_field = profileTableClass::LAST_NAME;

            $first_name = $objProfile[0]->$first_name_field;
            $last_name = $objProfile[0]->$last_name_field;

            $user = $first_name . ' ' . $last_name;
            ?>
            <script>
              $(document).ready(function () {
                  $('#activateUser').modal('show');
              });
            </script>
            <!-- Modal -->
            <div class="modal fade" id="activateUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header bohemia-">
                            <button type="button" class="close" data-dismiss="modal" >&times;</button>
                            <h4 class="modal-title"> Activate User </h4>
                        </div>
                        <div class="modal-body">
                            <div class="row text-center" style="color: #cc0000"><i class="fa fa-exclamation-circle fa-4x" aria-hidden="true"></i></div>
                            <div class="text-center" > Do you want to activate </br> <h3><b><?php echo $user; ?></b></h3> Account?</div>
                        </div>
                        <div class=" modal-footer">
                            <div class="text-center">
                                <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                                <a href="<?php echo routing::getInstance()->getUrlWeb('usuario', 'activate', array(usuarioTableClass::getNameField(usuarioTableClass::ACTIVED, true) => $user_hash)) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Activate </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
          } else {

            $username_field = usuarioTableClass::USER;
            $user_name = $objUser[0]->$username_field;

            if (empty($user_name)) {
              $user_email_address_field = usuarioTableClass::EMAIL_ADDRESS;
              $user_email_address = $objUser[0]->$user_email_address_field;
              $user = $user_email_address;
            } else {
              $user = $user_name;
            }
            ?>
            <script>
              $(document).ready(function () {
                  $('#activateUser').modal('show');
              });
            </script>
            <!-- Modal -->
            <div class="modal fade" id="activateUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header bohemia-">
                            <button type="button" class="close" data-dismiss="modal" >&times;</button>
                            <h4 class="modal-title"> Activate User </h4>
                        </div>
                        <div class="modal-body">
                            <div class="row text-center" style="color: #cc0000"><i class="fa fa-exclamation-circle fa-4x" aria-hidden="true"></i></div>
                            <div class="text-center" > Do you want to activate </br> <h3><b><?php echo $user; ?></b></h3> Account?</div>
                        </div>
                        <div class=" modal-footer">
                            <div class="text-center">
                                <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                                <a target="_blank" href="<?php echo routing::getInstance()->getUrlWeb('usuario', 'activation', array("hash" => $user_hash)) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Activate </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
          }
        }
      }


      /**
       * invite User parcial form
       */
      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['inviteUser'])) {
          $inviteUser = request::getInstance()->getPost("inviteUser");
          ?>

          <div class="panel panel-bohemia">
              <div class="panel-heading">
                  <h3 class="panel-title">Invite<small></small></h3>
              </div>
              <div class="panel-body">

                  <form id="inviteUser" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("usuario", "invite"); ?>">

                      <p><small>Fields marked with (*) are mandatory.</small></p>
                      <div class="form-group">

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="email" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true) ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true) ?>" placeholder="Enter Email Address" required>
                              <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label class="control-label col-md-2 col-sm-2 col-xs-12"> Role As</label>
                              <div class="col-md-10 col-sm-10 col-xs-12 selectContainer">
                                  <select id="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true); ?>" name="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true); ?>" class="form-control">
                                      <option value="">Select User Role</option>  
                                      <?php foreach ($this->getCredencials() as $credencial): ?>
                                        <option value="<?php echo $credencial->id ?>"><?php echo $credencial->nombre; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                          </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="text-center">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnClose_inviteuser"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Invite</button>
                          </div>
                      </div>
                  </form>

              </div>
          </div>
          <script>
            $(document).ready(function () {
                $('#inviteUser').formValidation({
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
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true); ?>: {
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
                                    max: <?php echo usuarioTableClass::EMAIL_ADDRESS_LENGTH; ?>,
                                    message: 'The email address must be less than <?php echo usuarioTableClass::EMAIL_ADDRESS_LENGTH; ?> characters long'
                                }
                            }
                        },
          <?php echo credencialTableClass::getNameField(credencialTableClass::ID, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The user role is required'
                                }
                            }
                        }
                    }
                });

                //button close adduser user function
                var btnClose_inviteuser = $(".btnClose_inviteuser");
                $(btnClose_inviteuser).on('click', function () {
                    $("#inviteUser_panel").hide(300);
                    //$('html, body').animate({scrollTop: $('#usuarios').offset().top}, 'slow');
                });

            });
          </script>
          <?php
        }
      }

      /**
       * Users Notifications parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["user_notifications"])) {
          $fieldsUser = array(
              usuarioTableClass::ID,
              usuarioTableClass::USER,
              usuarioTableClass::PASSWORD,
              usuarioTableClass::EMAIL_ADDRESS,
              usuarioTableClass::ACTIVED,
              usuarioTableClass::USER_HASH,
              usuarioTableClass::LAST_LOGIN_AT
          );
          $where_user = array(
              usuarioTableClass::LAST_LOGIN_AT => null
          );

          $objUser_notification = usuarioTableClass::getAll($fieldsUser, true, null, null, null, null, $where_user);

          $userID = usuarioTableClass::ID;
          $userEmail = usuarioTableClass::EMAIL_ADDRESS;
          ?>
          <script>
            $(document).ready(function () {
                $('#user_notifications').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="user_notifications" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"><i class="fa fa-bullhorn" aria-hidden="true"></i> User Notifications  <b><?php ?></b> </h4>
                      </div>
                      <div class="modal-body">
                          <?php print_r($objUser_notification); ?>
                          <table id="notifications" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Email Address</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($objUser_notification as $user): ?>
                                    <tr>
                                        <td>
                                            <?php echo $user->$userID; ?>
                                        </td>
                                        <td><a href="mailto:<?php echo $user->$userEmail; ?>" ><?php echo $user->$userEmail; ?></a></td>
                                        <td>
                                            <div class="switch-guest-item">
                                                <div class="material-switch">
                                                    <input id="<?php ?>_<?php ?>"  name="<?php ?>_<?php ?>" value="<?php ?>" type="checkbox"/>
                                                    <label for="<?php ?>_<?php ?>" class="label-bohemia"></label>
                                                    <span> <b><?php ?></b> </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                  <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>ID</th>
                                      <th>Email Address</th>
                                      <th>Actions</th>
                                  </tr>
                              </tfoot>
                          </table>
                          <script type="text/javascript">
                            $(document).ready(function () {
                                $('#notifications').DataTable({
                                    responsive: true
                                });
                                $table_notifications = $('table#notifications').DataTable();
                            });
                          </script>

                      </div>
                      <div class=" modal-footer">
                          <div class="pull-right">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }

      /**
       * upload profile User parcial form
       */
      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['uploadProfileUser'])) {
          $user_hash = request::getInstance()->getPost("uploadProfileUser");
          ?>

          <div class="panel panel-bohemia">
              <div class="panel-heading">
                  <h3 class="panel-title"> <i class="fa fa-file-image-o" aria-hidden="true"></i> Upload Profile Photo<small></small></h3>
              </div>
              <div class="panel-body">
                  <form id="upload_profile_user" method="post" action="<?php routing::getInstance()->getUrlWeb("profile", "upload") ?>">
                      <div id="uploader">
                          <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
                      </div>

                  </form>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                      <div class="text-center">
                          <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnClose_upload_photo"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                      </div>
                  </div>
                  <script type="text/javascript">
                    $(document).ready(function () {
                        // Initialize the widget when the DOM is ready
                        $(function () {
                            // Setup html5 version
                            $("#uploader").pluploadQueue({
                                // General settings
                                runtimes: 'html5,flash,silverlight,html4',
                                url: url + 'profile/upload.php',
                                chunk_size: '1mb',
                                rename: true,
                                dragdrop: true,

                                filters: {
                                    // Maximum file size
                                    max_file_size: '5mb',
                                    // Specify what files to browse for
                                    mime_types: [
                                        {title: "Image files", extensions: "jpg,gif,png"}
                                    ]
                                },

                                // Resize images on clientside if we can
                                resize: {width: 540, height: 440, quality: 90},

                                flash_swf_url: path_absolute + 'assets/vendors/plupload/js/Moxie.swf',
                                silverlight_xap_url: path_absolute + 'assets/vendors/js/Moxie.xap'
                            });

                            // Handle the case when form was submitted before uploading has finished
                            $('#upload_profile_user').submit(function (e) {
                                // Files in queue upload them first
                                if ($('#uploader').pluploadQueue('getFiles').length > 0) {

                                    // When all files are uploaded submit form
                                    $('#uploader').on('complete', function () {
                                        $('#upload_profile_user')[0].submit();
                                    });

                                    $('#uploader').pluploadQueue('start');
                                } else {
                                    alert("You must have at least one file in the queue.");
                                }
                                return false; // Keep the form from submitting
                            });
                        });
                        //button close upload profile photo user function
                        var btnClose_upload_photo = $(".btnClose_upload_photo");
                        $(btnClose_upload_photo).on('click', function () {
                            $("#user_profile_photo_upload_panel").hide(300);
                            $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                        });
                    });
                  </script>
              </div>
          </div>
          <?php
        }
      }

      /**
       * set User credentials parcial form
       */
      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['set_credentials_User'])) {
          $user_hash = request::getInstance()->getPost("set_credentials_User");

          $user_email_address = usuarioTableClass::getUserEmailAddressByHash($user_hash);
          ?>
          <script>
            $(document).ready(function () {
                $('#user_credentials').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="user_credentials" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"><i class="fa fa-bullhorn" aria-hidden="true"></i> User Notification  <b>Set Username & Password</b> </h4>
                      </div>
                      <div class="modal-body">
                          <div class="row text-center" style="color: #cc0000"><i class="fa fa-exclamation-circle fa-4x" aria-hidden="true"></i></div>
                          <div class="text-center" > Do you want to send an E-mail Request to  </br> <h3><b><?php echo $user_email_address; ?></b></h3> to Set Username & Password?</div>
                      </div>
                      <div class=" modal-footer">
                          <div class="pull-right">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                              <a href="<?php echo routing::getInstance()->getUrlWeb('usuario', 'setRequest', array(usuarioTableClass::getNameField(usuarioTableClass::USER_HASH, true) => $user_hash)) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Send Request </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  public function getCredencials() {
    $credencials = array(
        credencialTableClass::ID,
        credencialTableClass::NOMBRE,
        credencialTableClass::CREATED_AT,
        credencialTableClass::UPDATED_AT,
        credencialTableClass::DELETED_AT,
    );
    $credencialOrderBy = array(
        credencialTableClass::ID
    );
    $objCredencials = credencialTableClass::getAll($credencials, true, $credencialOrderBy, 'ASC');
    return $objCredencials;
  }

}
