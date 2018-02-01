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
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      /**
       * Update user information  
       */
      if (isset($_GET['usuario_id'])) {
        
        $userID = request::getInstance()->getGet(usuarioTableClass::getNameField(usuarioTableClass::ID, true));
        $usuario = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true));
        $password = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true));
        $confirmPass = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD . '_confirm', true));
        $email = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true));
        $user_roleID = request::getInstance()->getPost(credencialTableClass::getNameField(credencialTableClass::ID, true));

        $ids = array(
            usuarioTableClass::ID => $userID
        );
        $data = array(
            usuarioTableClass::EMAIL_ADDRESS => $email,
        );
        usuarioTableClass::update($ids, $data);
        $rolids = array(
            usuarioCredencialTableClass::USUARIO_ID => $userID
        );
        $dataRole = array(
            usuarioCredencialTableClass::CREDENCIAL_ID => $user_roleID
        );

        session::getInstance()->setSuccess("The User <b>" . $usuario . "</b> has been Successfully Updated.");
        usuarioCredencialTableClass::update($rolids, $dataRole);

        routing::getInstance()->redirect('usuario', 'index');
      }
      /**
       * update user password script
       */
      if(isset($_GET['updatedUserID'])){
        
        $userID = request::getInstance()->getGet('updatedUserID');
        $password = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true));
        $passwordConfirm = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD . '_confirm', true));
        
        $usuario = usuarioTableClass::getUserName($userID);
        $ids = array(
            usuarioTableClass::ID => $userID
        );
        $data = array(
            usuarioTableClass::PASSWORD => md5(md5($password)), 
        );
        usuarioTableClass::update($ids, $data);
        session::getInstance()->setSuccess("The login Password for <b>" . $usuario . "</b> has been Successfully Updated.");
        routing::getInstance()->redirect('usuario', 'index');
      }
      
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
