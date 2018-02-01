<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of teamLeaderTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class teamLeaderTableClass extends teamLeaderBaseTableClass {

  /**
   * 
   * @param type $team_hash
   * @param type $main_leader_id 
   * @return type
   * @throws PDOException
   */
  public static function getIdTeamLeader($team_hash, $main_leader_id) {
    try {
      $sql = 'SELECT ' . teamLeaderTableClass::USUARIO_ID
              . ' FROM ' . teamLeaderTableClass::getNameTable()
              . ' WHERE ' . teamLeaderTableClass::getNameField(teamLeaderTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . teamLeaderTableClass::MAIN_LEADER . '= :main_leader '
              . ' AND ' . teamLeaderTableClass::TEAM_LEADER_HASH . ' = :hash ';
      $params = array(
          ':main_leader' => $main_leader_id,
          ':hash' => $team_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->usuario_id;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
