<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of inviteActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class inviteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $email = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true));
        $user_roleID = request::getInstance()->getPost(credencialTableClass::getNameField(credencialTableClass::ID, true));

        $user_hash = md5(md5(date('U')));
        $data = array(
            usuarioTableClass::ID => null,
            usuarioTableClass::EMAIL_ADDRESS => $email,
            usuarioTableClass::USER_HASH => $user_hash
        );

        usuarioTableClass::insert($data);
        $userID = usuarioTableClass::getIdNewUserByHash($user_hash);

        $dataRole = array(
            usuarioCredencialTableClass::USUARIO_ID => $userID,
            usuarioCredencialTableClass::CREDENCIAL_ID => $user_roleID
        );
        usuarioCredencialTableClass::insert($dataRole);
//        usuarioTableClass::emailActivationNotification($userID);
        session::getInstance()->setSuccess("The User <b>" . $usuario . "</b> has been Invited. To enroll the user with BRG, verify your account by  clicking the activation link that has been send to your E-mail.");
        routing::getInstance()->redirect('usuario', 'index');
      } else {
        routing::getInstance()->redirect('usuario', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
