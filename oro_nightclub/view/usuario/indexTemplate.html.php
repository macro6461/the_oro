<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$userID = usuarioTableClass::ID;
$username = usuarioTableClass::USER;
$userPass = usuarioTableClass::PASSWORD;
$userEmail = usuarioTableClass::EMAIL_ADDRESS;
$userActive = usuarioTableClass::ACTIVED;
$user_hash = usuarioTableClass::USER_HASH;
$user_last_login = usuarioTableClass::LAST_LOGIN_AT;

$created_at = usuarioTableClass::CREATED_AT;
$updated_at = usuarioTableClass::UPDATED_AT;
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
                            <div class="x_title hidden-xs">
                                <h2><i class="fa fa-users" aria-hidden="true"></i> Manage Users</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h3 class="text-center"><i class="fa fa-users" aria-hidden="true"></i>Manage Users</h3>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="  pull-right">
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn_manage_user_notifications"> Manage User Notifications</button>
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("team", "index"); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark " type="button"> Manage Teams</a>
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("credencial", "index"); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark " type="button"> User Roles</a>
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_user" type="button"><i class="fa fa-user-plus" aria-hidden="true"></i> Add User</button>
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnInvite_user" type="button"><i class="fa fa-envelope-o" aria-hidden="true"></i> Invite </button>
                                        </div>

                                    </div>
                                </div>
                                <div id="addUser_panel"></div>
                                <div id="inviteUser_panel"></div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="  pull-right">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("usuario", "index", array(usuarioTableClass::getNameField(usuarioTableClass::ACTIVED, true) => "Active")); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-filter" aria-hidden="true"></i> Active Users</a>
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("usuario", "index", array(usuarioTableClass::getNameField(usuarioTableClass::ACTIVED, true) => "Inactive")); ?>" class=" mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-filter" aria-hidden="true"></i> Inactive Users</a>
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("usuario", "index", array(usuarioTableClass::getNameField(usuarioTableClass::ACTIVED, true) => "Archived")); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " type="button"><i class="fa fa-filter" aria-hidden="true"></i> Archived Users</a>
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("usuario", "index", array(usuarioTableClass::getNameField(usuarioTableClass::ACTIVED, true) => "Invited")); ?>" class=" mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-filter" aria-hidden="true"></i> Invited Users</a>
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("usuario", "index"); ?>" class=" mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark" type="button"> Reset</a>
                                        </div>

                                    </div>
                                </div>

                                <div id="deleteUser_panel"></div>
                                <table id="usuarios" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>username</th>
                                            <th>Status</th>
                                            <th>Email Address</th>
                                            <th>Role</th>
                                            <th>Last Login</th>
                                            <th>Sign Up Date</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>

                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>username</th>
                                            <th>Status</th>
                                            <th>Email Address</th>
                                            <th>Role</th>
                                            <th>Last Login</th>
                                            <th>Sign Up Date</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="ln_solid"></div>

                                <div id="user_update_panel"></div>
                                <div id="user_profile_photo_upload_panel"></div>
                                <div id="user_set_credentials_panel"></div>

                            </div>
                        </div>
                        <script>
                          $(document).ready(function () {

                              $('#usuarios').DataTable({
                                  responsive: true,
                                  "pageLength": 50,
                                  "ajax": {
                                      url: "ajax?usuarios<?php if (\mvc\request\requestClass::getInstance()->hasGet(usuarioTableClass::getNameField(usuarioTableClass::ACTIVED, true))) {
                          echo '&status=' . \mvc\request\requestClass::getInstance()->getGet(usuarioTableClass::getNameField(usuarioTableClass::ACTIVED, true));
                        } ?>",
                                      type: "GET"

                                  }
                              });

                              $table = $('table#usuarios').DataTable();

                              $table.on('click', 'button.btnUpdate_user', function () {
                                  var idUser = $(this).data("id");
                                  var urlajax = url + 'users/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('userID=' + idUser),
                                      success: function (data) {

                                          $('#addUser_panel').fadeOut(300);
                                          $('#deleteUser_panel').fadeOut(300);
                                          $("#user_update_panel").show();
                                          $('html, body').animate({scrollTop: $('footer').offset().top}, 'slow');
                                          $("#user_update_panel").html(data);
                                      }
                                  });
                              });

                              $table.on('click', 'button.btnDelete_user', function () {
                                  var idUser = $(this).data("id");
                                  var urlajax = url + 'users/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('deleteUser=' + idUser),
                                      success: function (data) {

                                          $('#addUser_panel').fadeOut(300);
                                          $('#user_update_panel').fadeOut(300);
                                          $("#deleteUser_panel").show();
                                          $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                          $("#deleteUser_panel").html(data);
                                      }
                                  });
                              });

                              var btn_manage_user_notifications = $(".btn_manage_user_notifications");
                              $(btn_manage_user_notifications).on('click', function () {
                                  var urlajax = url + 'users/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('user_notifications'),
                                      success: function (data) {
                                          $("#user_profile_photo_upload_panel").show();
                                          $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                          $("#user_profile_photo_upload_panel").html(data);
                                      }
                                  });
                              });

                              var btnAdd_user = $(".btnAdd_user");
                              $(btnAdd_user).on('click', function () {
                                  var urlajax = url + 'users/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('addUser'),
                                      success: function (data) {
                                          $('#deleteUser_panel').fadeOut(300);
                                          $('#user_update_panel').fadeOut(300);
                                          $("#addUser_panel").show();
                                          $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                          $("#addUser_panel").html(data);
                                      }
                                  });
                              });

                              var btnInvite_user = $(".btnInvite_user");
                              $(btnInvite_user).on('click', function () {
                                  var urlajax = url + 'users/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('inviteUser'),
                                      success: function (data) {
                                          $('#deleteUser_panel').fadeOut(300);
                                          $('#user_update_panel').fadeOut(300);
                                          $("#addUser_panel").fadeOut(300);
                                          $("#inviteUser_panel").show();
                                          $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                          $("#inviteUser_panel").html(data);
                                      }
                                  });
                              });

                              $table.on('click', 'button.btn_deactivate_user', function () {
                                  var idUser = $(this).data("id");
                                  var urlajax = url + 'users/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('deactivateUser=' + idUser),
                                      success: function (data) {

                                          $('#addUser_panel').fadeOut(300);
                                          $('#user_update_panel').fadeOut(300);
                                          $("#user_deactivate_modal").show();
                                          $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                          $("#user_deactivate_modal").html(data);
                                      }
                                  });
                              });

                              $table.on('click', 'button.btn_activate_user', function () {
                                  var idUser = $(this).data("id");
                                  var urlajax = url + 'users/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('activateUser=' + idUser),
                                      success: function (data) {

                                          $('#addUser_panel').fadeOut(300);
                                          $('#user_update_panel').fadeOut(300);
                                          $("#user_activate_modal").show();
                                          $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                          $("#user_activate_modal").html(data);
                                      }
                                  });
                              });

                              $table.on('click', 'button.btn_update_Profile_photo_user', function () {
                                  var idUser = $(this).data("id");
                                  var urlajax = url + 'users/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('uploadProfileUser=' + idUser),
                                      success: function (data) {

                                          $('#addUser_panel').fadeOut(300);
                                          $('#user_update_panel').fadeOut(300);
                                          $("#user_profile_photo_upload_panel").show();
                                          $('html, body').animate({scrollTop: $('#user_profile_photo_upload_panel').offset().top}, 'slow');
                                          $("#user_profile_photo_upload_panel").html(data);
                                      }
                                  });
                              });

                              $table.on('click', 'button.btn_set_user_credentials', function () {
                                  var user_hash = $(this).data("id");
                                  var urlajax = url + 'users/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('set_credentials_User=' + user_hash),
                                      success: function (data) {

                                          $('#addUser_panel').fadeOut(300);
                                          $('#user_update_panel').fadeOut(300);
                                          $("#user_set_credentials_panel").show();
                                          $('html, body').animate({scrollTop: $('#user_set_credentials_panel').offset().top}, 'slow');
                                          $("#user_set_credentials_panel").html(data);
                                      }
                                  });
                              });


                          });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div id="user_deactivate_modal"></div>
        <div id="user_activate_modal"></div>
        <div id="user_notifications_modal"></div>

        <!-- /page content -->
<?php echo view::includePartial("partials/modal", array('objProfile' => $objProfile)) ?>
<?php echo view::includePartial("partials/footer") ?>

    </div>
</div>

