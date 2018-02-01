<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of accessTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class doormanTableClass extends doormanBaseTableClass {

  /**
   * 
   * @param type $doorman_id
   * @return type
   * @throws PDOException
   */
  public static function getDoormanName($doorman_id) {
    try {
      $sql = 'SELECT ' . doormanTableClass::getNameField(doormanTableClass::ID) . ', '
              . doormanTableClass::getNameField(doormanTableClass::DESCRIPTION_DOORMAN) . ' AS doorman'
              . ' FROM  ' . doormanTableClass::getNameTable()
              . ' WHERE ' . doormanTableClass::getNameField(doormanTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . doormanTableClass::getNameField(doormanTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $doorman_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->doorman;
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
