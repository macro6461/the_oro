<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of superTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class superTableClass extends superBaseTableClass {

  /**
   * 
   * @param type $super_id
   * @return type
   * @throws PDOException
   */
  public static function getSuperName($super_id) {
    try {
      $sql = 'SELECT ' . superTableClass::getNameField(superTableClass::ID) . ', '
              . superTableClass::getNameField(superTableClass::SUPER_FIRST_NAME) . ', '
              . superTableClass::getNameField(superTableClass::SUPER_MIDDLE_NAME) . ', '
              . superTableClass::getNameField(superTableClass::SUPER_LAST_NAME) . ' '
              . ' FROM  ' . superTableClass::getNameTable()
              . ' WHERE ' . superTableClass::getNameField(superTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . superTableClass::getNameField(superTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $super_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->super_first_name . ' ' . $answer[0]->super_middle_name . ' ' . $answer[0]->super_last_name : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $super_hash
   * @return type
   * @throws PDOException
   */
  public static function getIdNewSuper($super_hash) {
    try {
      $sql = 'SELECT ' . superTableClass::ID
              . ' FROM ' . superTableClass::getNameTable()
              . ' WHERE ' . superTableClass::getNameField(superTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . superTableClass::SUPER_HASH . ' = :hash ';
      $params = array(
          ':hash' => $super_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->id_super;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
  /**
   * 
   * @param type $super_id
   * @return type
   * @throws PDOException
   */
   public static function getSuperHash($super_id) {
    try {
      $sql = 'SELECT ' . superTableClass::getNameField(superTableClass::SUPER_HASH) . ' AS super_hash '
              . ' FROM  ' . superTableClass::getNameTable()
              . ' WHERE ' . superTableClass::getNameField(superTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . superTableClass::getNameField(superTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $super_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->super_hash : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
