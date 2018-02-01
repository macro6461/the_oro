<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of activationActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class activationActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      if (request::getInstance()->isMethod('GET')) {

        if (request::getInstance()->hasGet("hash")) {

          $userHash = request::getInstance()->getGet('hash');

          $userID = usuarioTableClass::VerifyUserHash($userHash);
          
         
            $fields = array(
                usuarioTableClass::ID,
                usuarioTableClass::USER,
                usuarioTableClass::PASSWORD,
                usuarioTableClass::EMAIL_ADDRESS,
                usuarioTableClass::ACTIVED,
                usuarioTableClass::LAST_LOGIN_AT,
                usuarioTableClass::CREATED_AT,
                usuarioTableClass::UPDATED_AT
            );
            $where = array(
                usuarioTableClass::ID => $userID
            );
            $objUser = $this->objUser = usuarioTableClass::getAll($fields, true, null, null, null, null, $where);
            $user_email = $objUser[0]->email_address;
            $user_name = $objUser[0]->user_name;

             if ($userID != false) {

            if (usuarioTableClass::isActivated($userID) != 1) {
              $ids = array(
                  usuarioTableClass::ID => $userID
              );
              $data = array(
                  usuarioTableClass::ACTIVED => 1
              );
              usuarioTableClass::update($ids, $data);
              session::getInstance()->setFlash("active", "active");
              session::getInstance()->setSuccess(" Congratulations! Your Email Address <b> $user_email </b> is confirmed, your Account has been successfully Activated.");
              
              if(profileTableClass::verifyProfile($userID) != false){
                
                routing::getInstance()->getUrlWeb("usuario", "index");
              }else{
                
                $this->defineView('activation', 'usuario', session::getInstance()->getFormatOutput());
              }
              
            } else {
              session::getInstance()->setInformation(" Your Account has been Already activated.Please Log In");
              session::getInstance()->setFlash("session_user_name", $user_name);
              routing::getInstance()->redirect('shfSecurity', 'index');
            }
          } else {
            session::getInstance()->setFlash("hash", "hash");
            session::getInstance()->setError(" The  Application encountered an error and it couldn't complete your request.<br> Your <b>Activation Token (hash)</b> is not valid, please try again!. ");
            routing::getInstance()->redirect('usuario', 'activation');
          }
        } else {
          session::getInstance()->setFlash("hash", "hash");
          session::getInstance()->setError(" The  Application encountered an error and it couldn't complete your request.<br> Your <b>Activation Token (hash)</b> is missing, please try again!. ");
          $this->defineView('activation', 'usuario', session::getInstance()->getFormatOutput());
        }
      } else {
        session::getInstance()->setFlash("exception", "exception");
        $this->defineView('activation', 'usuario', session::getInstance()->getFormatOutput());
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
