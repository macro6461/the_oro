<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use hook\log\logHookClass as log;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of loginActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class loginActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      
//      print($_POST);
//      
//      echo $usuario = request::getInstance()->getPost('brgusername');
//      
//      exit();
      
      
      if (request::getInstance()->getServer('REQUEST_METHOD') === 'POST') {
        
        $usuario = request::getInstance()->getPost('brgusername');
        $password = request::getInstance()->getPost('brgpassword');


        if (($objUsuario = usuarioTableClass::verifyUser($usuario, $password)) !== false) {

          hook\security\securityHookClass::login($objUsuario);
          if (request::getInstance()->hasPost('chkRememberMe') === true) {
            $chkRememberMe = request::getInstance()->getPost('chkRememberMe');
            
            $hash = md5(md5($objUsuario[0]->id_usuario . $objUsuario[0]->usuario . date(config::getFormatTimestamp())));
            $data = array(
                recordarMeTableClass::USUARIO_ID => $objUsuario[0]->id_usuario,
                recordarMeTableClass::HASH_COOKIE => $hash,
                recordarMeTableClass::IP_ADDRESS => request::getInstance()->getServer('REMOTE_ADDR'),
                recordarMeTableClass::CREATED_AT => date(config::getFormatTimestamp())
            );
            recordarMeTableClass::insert($data);
            setcookie(config::getCookieNameRememberMe(), $hash, time() + config::getCookieTime(), config::getCookiePath());
          }

          log::register('Log In', 'NONE');
          hook\security\securityHookClass::redirectUrl();
        } else {
          $status = usuarioTableClass::verifyActivation($usuario, $password);
          if ($status !== false) {

            if ($status == 0) {
              $userEmailAddress = usuarioTableClass::getUserEmail($usuario, $password);
              session::getInstance()->setError(" Your account hasn't been activated, Please log into your email account (" . $userEmailAddress . ") to complete the activation process!.");
              routing::getInstance()->redirect(config::getDefaultModuleSecurity(), config::getDefaultActionSecurity());
            } elseif($status == 2) {
              session::getInstance()->setError(" Your account has been Deactivated, Please contact Administration for more information!.");
              routing::getInstance()->redirect(config::getDefaultModuleSecurity(), config::getDefaultActionSecurity());
            }
          } else {
            $existingUser = usuarioTableClass::getVerifyExistingUser($usuario);
            if ($existingUser == false) {
              session::getInstance()->setError('The User <b>' . $usuario . '</b>  is not registered in our database, Please may sure your user name and password are correct!.');
              routing::getInstance()->redirect(config::getDefaultModuleSecurity(), config::getDefaultActionSecurity());
            } else {
              session::getInstance()->setError(' User & Password Incorrect!, Please Try Again.');
              routing::getInstance()->redirect(config::getDefaultModuleSecurity(), config::getDefaultActionSecurity());
            }
          }
        }
      } else {
        session::getInstance()->setError('test');
        routing::getInstance()->redirect(config::getDefaultModule(), config::getDefaultAction());
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
