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
class setCredentialsActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      /**
       * Update user information  
       */
      if (request::getInstance()->hasGet(usuarioTableClass::getNameField(usuarioTableClass::USER_HASH, true))) {
        
        $user_hash = request::getInstance()->getGet(usuarioTableClass::getNameField(usuarioTableClass::USER_HASH, true));
        $usuario = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true));
        $password = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true));
        $confirmPass = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD . '_confirm', true));
        
        $user_id = usuarioTableClass::getIdNewUserByHash($user_hash);
        $user_email_address = usuarioTableClass::getUserEmailAddressByHash($user_hash);
        $ids = array(
            usuarioTableClass::ID => $user_id
        );
        $data = array(
            usuarioTableClass::USER => $usuario,
            usuarioTableClass::PASSWORD => md5(md5($password))
        );
        usuarioTableClass::update($ids, $data);
        session::getInstance()->setSuccess("Congratulations! Your Account for <b>" . $user_email_address . "</b>  has been completed!. Please Log In");
        routing::getInstance()->redirect('shfSecurity', 'index');
      }else{
        session::getInstance()->setError("The  Application encountered an error and it couldn't complete your request.<br> The <b>User Token (hash)</b> is missing, please try again!.  ");
        routing::getInstance()->redirect('shfSecurity', 'index');
      }

    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
