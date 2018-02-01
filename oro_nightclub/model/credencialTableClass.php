<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of credencialTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class credencialTableClass extends credencialBaseTableClass {
  
  
  
  /**
   * 
   * @param type $id
   * @return type
   * @throws PDOException
   */
  public static function getNameCredencial($id) {
    try {
      $sql = 'SELECT ' . credencialTableClass::getNameField(credencialTableClass::ID) . ', '
              . credencialTableClass::getNameField(credencialTableClass::NOMBRE) . ' AS nombre'
              . ' FROM  ' . credencialTableClass::getNameTable() 
              . ' WHERE ' . credencialTableClass::getNameField(credencialTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . credencialTableClass::getNameField(credencialTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->nombre;
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
              . ' WHERE ' . credencialTableClass::getNameField(credencialTableClass::DELETED_AT). '  IS NULL'
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
   * @param type $credencial_hash
   * @return type
   * @throws PDOException
   */
  public static function getIdCredencialByHash($credencial_hash) {
    try {
      $sql = 'SELECT ' . credencialTableClass::getNameField(credencialTableClass::ID) . ' AS credencial_id '
              . ' FROM  ' . credencialTableClass::getNameTable()
              . ' WHERE ' . credencialTableClass::getNameField(credencialTableClass::DELETED_AT). '  IS NULL'
              . ' AND ' . credencialTableClass::getNameField(credencialTableClass::CREDENCIAL_HASH) . ' = :hash';
      $params = array(
          ':hash' => $credencial_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->credencial_id : false;
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
