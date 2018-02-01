<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of accessTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class accessTableClass extends accessBaseTableClass {

  /**
   * 
   * @param type $access_id
   * @return type
   * @throws PDOException
   */
  public static function getAccessName($access_id) {
    try {
      $sql = 'SELECT ' . accessTableClass::getNameField(accessTableClass::ID) . ', '
              . accessTableClass::getNameField(accessTableClass::ACCESS_DESCRIPTION) . ' AS access'
              . ' FROM  ' . accessTableClass::getNameTable()
              . ' WHERE ' . accessTableClass::getNameField(accessTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . accessTableClass::getNameField(accessTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $access_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->access;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $credentialName
   * @return type
   * @throws PDOException
   */
  public static function getIdCredencial($credentialName) {
    try {
      $sql = 'SELECT ' . credencialTableClass::getNameField(credencialTableClass::ID)
              . ' FROM  ' . credencialTableClass::getNameTable()
              . ' WHERE ' . credencialTableClass::getNameField(credencialTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . credencialTableClass::getNameField(credencialTableClass::NOMBRE) . ' = :nombre';
      $params = array(
          ':nombre' => $credentialName,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->id;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $credencialName
   * @return type
   * @throws PDOException
   */
  public static function getVerifyExistingCredencial($credencialName) {
    try {
      $sql = 'SELECT ' . credencialTableClass::getNameField(credencialTableClass::ID) . ', '
              . credencialTableClass::getNameField(credencialTableClass::NOMBRE)
              . ' FROM  ' . credencialTableClass::getNameTable()
              . ' WHERE ' . credencialTableClass::getNameField(credencialTableClass::DELETED_AT) . '  IS NULL  '
              . 'AND ' . credencialTableClass::NOMBRE . '  = :credencial';
      $params = array(
          ':credencial' => $credencialName,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
