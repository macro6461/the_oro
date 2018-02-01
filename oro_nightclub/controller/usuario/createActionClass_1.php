<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
//      if (request::getInstance()->isMethod('POST')) {
      $fields = array(
          userTableClass::ID,
          userTableClass::USER,
          userTableClass::PASSWORD,
          userTableClass::EMAIL_ADDRESS,
          userTableClass::ACTIVED,
          userTableClass::CREATED_AT,
          userTableClass::UPDATED_AT
      );
      $OrderBy = array(
          userTableClass::ID
      );
      $objUsers = userTableClass::getAll($fields, true, $OrderBy, 'ASC');

      $_user_id = userTableClass::ID;
      $_username = userTableClass::USER;
      $_password = userTableClass::PASSWORD;
      $_email = userTableClass::EMAIL_ADDRESS;
      $_status = userTableClass::ACTIVED;
      $_position = userTableClass::POSITION;
      $_created = userTableClass::CREATED_AT;
      $_updated = userTableClass::UPDATED_AT;

      foreach ($objUsers as $user):
        

        $id_user = $user->$_user_id;
        $usuario = $user->$_username;
        $password = $user->$_password;
        $email = $user->$_email;
        if ($user->$_status == "Active") {
          $status = 1;
        } elseif ($user->$_status == "Inactive") {
          $status = 0;
        } else {
          $status = 0;
        }
        if ($user->$_position == "Agent") {
          $user_roleID = 5;
        } elseif ($user->$_position == "Co-Founder") {
          $user_roleID = 3;
        } else {
          $user_roleID = 5;
        }
        $created_at = $user->$_created;
        $updated_at = $user->$_updated;


//        $usuario = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true));
//        $password = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true));
//        $confirmPass = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD . '_confirm', true));
//        $email = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true));
//        $user_roleID = request::getInstance()->getPost(credencialTableClass::getNameField(credencialTableClass::ID, true));
//        if (usuarioTableClass::getVerifyExistingUser($usuario) == false) {
        $user_hash = md5(md5(date('U') + $user->$_user_id));
        $data = array(
            usuarioTableClass::ID => $id_user,
            usuarioTableClass::USER => $usuario,
            usuarioTableClass::PASSWORD => null,
            usuarioTableClass::EMAIL_ADDRESS => $email,
            usuarioTableClass::ACTIVED => $status,
            usuarioTableClass::USER_HASH => $user_hash,
            usuarioTableClass::INTRANET_ID => $id_user,
            usuarioTableClass::CREATED_AT => $created_at,
            usuarioTableClass::UPDATED_AT => $updated_at
        );

        usuarioTableClass::insert($data);
        $userID = usuarioTableClass::VerifyUserHash($user_hash);

        $dataRole = array(
            usuarioCredencialTableClass::USUARIO_ID => $userID,
            usuarioCredencialTableClass::CREDENCIAL_ID => $user_roleID
        );
        usuarioCredencialTableClass::insert($dataRole);
      endforeach;
//          usuarioTableClass::emailActivationNotification($userID);
//          session::getInstance()->setSuccess("The User <b>" . $usuario . "</b> has been Successfully Registered, please verify it by clicking the activation link that has been send to your email.");
//          routing::getInstance()->redirect('usuario', 'index');
//        } else {
//          session::getInstance()->setError("The User name <b>" . $usuario . " is already registered.");
//          routing::getInstance()->redirect('usuario', 'index');
//        }
//      } else {
//        routing::getInstance()->redirect('usuario', 'index');
//      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }
}
