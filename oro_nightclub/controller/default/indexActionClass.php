<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;

/**
 * Description of indexActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {

    try {
      if (profileTableClass::verifyProfile(session::getInstance()->getUserId()) !== false) {
        session::getInstance()->setInformation("Hello, Welcome to Bohemia Realty Group, LLC Dashboard, for any inquries Email us to <a href='mailto:info@bohemiarealtygroup.com' style='color: #021925; '>info@bohemiarealtygroup.com</a>");
        routing::getInstance()->redirect("default", "init");
      } else {
        log::register('Update Profile', profileTableClass::getNameTable(), "create user profile", null, session::getInstance()->getUserId());
        session::getInstance()->setInformation("Please update your profile information to continue, thank you!");
        routing::getInstance()->redirect("profile", "edit");
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
