<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of teamTypeTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class teamTypeTableClass extends teamTypeBaseTableClass {

   
  /**
   * 
   * @param type $team_type_id
   * @return type
   * @throws PDOException
   */
  public static function getNameTeamType($team_type_id) {
    try {
      $sql = 'SELECT ' . teamTypeTableClass::getNameField(teamTypeTableClass::ID) . ', '
              . teamTypeTableClass::getNameField(teamTypeTableClass::DESCRIPTION_TEAM_TYPE) . ' AS team_type'
              . ' FROM  ' . teamTypeTableClass::getNameTable() 
              . ' WHERE ' . teamTypeTableClass::getNameField(teamTypeTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . teamTypeTableClass::getNameField(teamTypeTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $team_type_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->team_type;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
