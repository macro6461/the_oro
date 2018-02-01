<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of activateActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class activateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      if (request::getInstance()->isMethod('GET')) {

        if (request::getInstance()->hasGet(usuarioTableClass::getNameField(usuarioTableClass::ACTIVED, true))) {

          $user_hash = request::getInstance()->getGet(usuarioTableClass::getNameField(usuarioTableClass::ACTIVED, true));
          $userID = usuarioTableClass::VerifyUserHash($user_hash);
          $fields_profile = array(
              profileTableClass::FIRST_NAME,
              profileTableClass::MIDDLE_NAME,
              profileTableClass::LAST_NAME
          );
          $where_profile = array(
              profileTableClass::USUARIO_ID => $userID
          );
          $objProfile = profileTableClass::getAll($fields_profile, true, null, null, null, null, $where_profile);

          $first_name_field = profileTableClass::FIRST_NAME;
          $last_name_field = profileTableClass::LAST_NAME;

          $first_name = $objProfile[0]->$first_name_field;
          $last_name = $objProfile[0]->$last_name_field;

          if ($userID != false) {

            if (usuarioTableClass::isActivated($userID) != 1) {
              $ids = array(
                  usuarioTableClass::ID => $userID
              );
              $data = array(
                  usuarioTableClass::ACTIVED => 1
              );
              usuarioTableClass::update($ids, $data);
              session::getInstance()->setSuccess("<b> $first_name $last_name </b> Account has been successfully Activated.");
              routing::getInstance()->redirect("usuario", "index");
            } else {
              session::getInstance()->setInformation("This Account has been Already Activated. No Update Required. ");
              routing::getInstance()->redirect('usuario', 'index');
            }
          } else {
            session::getInstance()->setError(" The  Application encountered an error and it couldn't complete your request.<br> Your <b>User Token (hash)</b> is not valid, please try again!. ");
            routing::getInstance()->redirect('usuario', 'index');
          }
        } else {
          session::getInstance()->setError(" The  Application encountered an error and it couldn't complete your request.<br> Your <b>User Token (hash)</b> is missing, please try again!. ");
          routing::getInstance()->redirect("usuario", "index");
        }
      } else {
        routing::getInstance()->redirect("shfSecurity", "noPermission");
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
