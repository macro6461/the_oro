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
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {


    try {

      if (request::getInstance()->hasGet(usuarioTableClass::getNameField(usuarioTableClass::ACTIVED, true))) {


        if (request::getInstance()->getGet(usuarioTableClass::getNameField(usuarioTableClass::ACTIVED, true)) == "Active") {
          $status = 1;
        } elseif (request::getInstance()->getGet(usuarioTableClass::getNameField(usuarioTableClass::ACTIVED, true)) == "Inactive") {
          $status = 2;
        } elseif (request::getInstance()->getGet(usuarioTableClass::getNameField(usuarioTableClass::ACTIVED, true)) == "Archived") {
          $status = 3;
        } elseif (request::getInstance()->getGet(usuarioTableClass::getNameField(usuarioTableClass::ACTIVED, true)) == "Invited") {
          $status = 0;
        }

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
            usuarioTableClass::ACTIVED => $status
        );
        $OrderBy = array(
            usuarioTableClass::ID
        );
        $this->objUsers = usuarioTableClass::getAll($fields, true, $OrderBy, 'ASC', null, null, $where);
        $this->defineView('index', 'usuario', session::getInstance()->getFormatOutput());
      } else {
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
        $usersOrderBy = array(
            usuarioTableClass::ID
        );



        $this->objUsers = usuarioTableClass::getAll($fieldsUser, true, $usersOrderBy, 'ASC');
        $this->defineView('index', 'usuario', session::getInstance()->getFormatOutput());
      }

      
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
