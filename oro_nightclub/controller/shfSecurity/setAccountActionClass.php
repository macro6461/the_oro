<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of setAccountActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class setAccountActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet(usuarioTableClass::getNameField(usuarioTableClass::USER_HASH, true))) {
        $user_hash = request::getInstance()->getGet(usuarioTableClass::getNameField(usuarioTableClass::USER_HASH, true));
        $this->defineView('setAccount', 'shfSecurity', session::getInstance()->getFormatOutput());
      } else {
        session::getInstance()->setError("The  Application encountered an error and it couldn't complete your request.<br> The <b>User Token (hash)</b> is missing, please try again!.  ");
        routing::getInstance()->redirect('shfSecurity', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
