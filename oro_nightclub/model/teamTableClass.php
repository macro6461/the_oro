<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of teamTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class teamTableClass extends teamBaseTableClass {

  /**
   * 
   * @param type $team_name
   * @return type
   * @throws PDOException
   */
  public static function getVerifyExistingTeam($team_name) {
    try {
      $sql = 'SELECT ' . teamTableClass::getNameField(teamTableClass::ID) . ','
              . teamTableClass::getNameField(teamTableClass::TEAM_NAME) . ' '
              . ' FROM ' . teamTableClass::getNameTable()
              . ' WHERE ' . teamTableClass::getNameField(teamTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . teamTableClass::TEAM_NAME . ' = :team_name ';
      $params = array(
          ':team_name' => $team_name,
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
   * @param type $team_hash
   * @return type
   * @throws PDOException
   */
  public static function getIdNewTeam($team_hash) {
    try {
      $sql = 'SELECT ' . teamTableClass::ID
              . ' FROM ' . teamTableClass::getNameTable()
              . ' WHERE ' . teamTableClass::getNameField(teamTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . teamTableClass::TEAM_HASH . ' = :hash ';
      $params = array(
          ':hash' => $team_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->id_team;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
