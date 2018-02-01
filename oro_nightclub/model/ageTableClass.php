<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of ageTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class ageTableClass extends ageBaseTableClass {

  /**
   * 
   * @param type $age_id
   * @return type
   * @throws PDOException
   */
  public static function getAgeName($age_id) {
    try {
      $sql = 'SELECT ' . ageTableClass::getNameField(ageTableClass::ID) . ', '
              . ageTableClass::getNameField(ageTableClass::DESCRIPTION_AGE) . ' AS age'
              . ' FROM  ' . ageTableClass::getNameTable()
              . ' WHERE ' . ageTableClass::getNameField(ageTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . ageTableClass::getNameField(ageTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $age_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->age;
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
