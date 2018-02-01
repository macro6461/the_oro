<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of deleteActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class deleteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      if (request::getInstance()->isMethod("GET")) {
        $id = request::getInstance()->getGet(usuarioTableClass::getNameField(usuarioTableClass::ID, true));

        $deleteUser = usuarioTableClass::getUserName($id);

        $ids_profile = array(
            profileTableClass::USUARIO_ID => $id
        );
        profileTableClass::delete($ids_profile, false);
        $ids_usuario_credencial = array(
            usuarioCredencialTableClass::USUARIO_ID => $id
        );
        usuarioCredencialTableClass::delete($ids_usuario_credencial, false);
        $ids_bitacora = array(
            bitacoraTableClass::USUARIO_ID => $id
        );
        bitacoraTableClass::delete($ids_bitacora, false);
        
        session::getInstance()->setSuccess("The Username <b>" . $deleteUser . "</b> has been successfully deleted!");
        $ids = array(
            usuarioTableClass::ID => $id
        );
        usuarioTableClass::delete($ids, false);

       
        routing::getInstance()->redirect('usuario', 'index');
      } else {
        routing::getInstance()->redirect('default', 'init');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
