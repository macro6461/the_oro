<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of profileTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class profileTableClass extends profileBaseTableClass {

  /**
   * 
   * @param type $user_id
   * @return type
   * @throws PDOException
   */
  public static function verifyProfile($user_id) {
    try {

      $sql = 'SELECT ' . profileTableClass::getNameField(profileTableClass::USUARIO_ID) . ' as user_id 
    FROM ' . profileTableClass::getNameTable() . '
    WHERE ' . profileTableClass::getNameField(profileTableClass::ACTIVED) . ' = :actived
    AND ' . profileTableClass::getNameField(profileTableClass::USUARIO_ID) . ' = :iduser';
      $params = array(
          ':iduser' => $user_id,
          ':actived' => ((config::getDbDriver() === 'mysql') ? 1 : 't')
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $profile_hash
   * @return type
   * @throws PDOException
   */
  public static function verifyProfileByHash($profile_hash) {
    try {

      $sql = 'SELECT ' . profileTableClass::getNameField(profileTableClass::ID) . ' as  profile_id '
              . ' FROM ' . profileTableClass::getNameTable()
              . ' WHERE ' . profileTableClass::getNameField(profileTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . profileTableClass::getNameField(profileTableClass::PROFILE_HASH) . ' = :hash ';
      $params = array(
          ':hash' => $profile_hash
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->profile_id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $user_id
   * @return type
   * @throws PDOException
   */
  public static function getProfileByUserId($user_id) {
    try {

      $sql = 'SELECT ' . profileTableClass::getNameField(profileTableClass::USUARIO_ID) . ' as user_id, '
              . profileTableClass::getNameField(profileTableClass::FIRST_NAME) . ', '
              . profileTableClass::getNameField(profileTableClass::MIDDLE_NAME) . ', '
              . profileTableClass::getNameField(profileTableClass::LAST_NAME)
              . ' FROM ' . profileTableClass::getNameTable()
              . ' WHERE ' . profileTableClass::getNameField(profileTableClass::ACTIVED) . ' = :actived'
              . ' AND ' . profileTableClass::getNameField(profileTableClass::USUARIO_ID) . ' = :user';
      $params = array(
          ':user' => $user_id,
          ':actived' => ((config::getDbDriver() === 'mysql') ? 1 : 't')
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->first_name . ' ' . $answer[0]->last_name : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $profile_hash
   * @return type
   * @throws PDOException
   */
  public static function getIdNewProfileByHash($profile_hash) {
    try {
      $sql = 'SELECT ' . profileTableClass::ID . ' AS profile_id '
              . ' FROM ' . profileTableClass::getNameTable()
              . ' WHERE ' . profileTableClass::getNameField(profileTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . profileTableClass::PROFILE_HASH . ' = :hash ';
      $params = array(
          ':hash' => $profile_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->profile_id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
