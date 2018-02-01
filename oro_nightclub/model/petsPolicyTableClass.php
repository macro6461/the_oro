<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of petsPolicyTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class petsPolicyTableClass extends petsPolicyBaseTableClass {

  /**
   * 
   * @param type $pet_policy_id
   * @return type
   * @throws PDOException
   */
  public static function getPetsPolicyName($pet_policy_id) {
    try {
      $sql = 'SELECT ' . petsPolicyTableClass::getNameField(petsPolicyTableClass::ID) . ', '
              . petsPolicyTableClass::getNameField(petsPolicyTableClass::DESCRIPTION_PETS_CASE) . ' AS pet_policy'
              . ' FROM  ' . petsPolicyTableClass::getNameTable()
              . ' WHERE ' . petsPolicyTableClass::getNameField(petsPolicyTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . petsPolicyTableClass::getNameField(petsPolicyTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $pet_policy_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->pet_policy;
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
