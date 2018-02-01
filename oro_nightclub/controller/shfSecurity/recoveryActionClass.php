<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of indexActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class recoveryActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      
      if (session::getInstance()->isUserAuthenticated()) {
        routing::getInstance()->redirect(config::getDefaultModule(), config::getDefaultAction());
      } else {
        $this->defineView('recovery', 'shfSecurity', session::getInstance()->getFormatOutput());
      }
      
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
