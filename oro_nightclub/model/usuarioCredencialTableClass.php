<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of usuarioCredencialTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class usuarioCredencialTableClass extends usuarioCredencialBaseTableClass {
  
  
  public static function getIdUserCredencial($userId) {
    try {
      $sql = 'SELECT ' . usuarioCredencialTableClass::ID
              . ', ' . usuarioCredencialTableClass::CREDENCIAL_ID . ' AS idrole '
              . ' FROM  ' . usuarioCredencialTableClass::getNameTable()
              . ' WHERE ' . usuarioCredencialTableClass::DELETED_AT
              . '  IS NULL  AND ' . usuarioCredencialTableClass::USUARIO_ID . '  = :userid';
      $params = array(
          ':userid' => $userId,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->idrole;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
}
