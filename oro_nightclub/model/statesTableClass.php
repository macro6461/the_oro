<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of statesTableClass
 *
 * @author Andres Felipe Alvarez <andresf9321@gmail.com>
 */
class statesTableClass extends statesBaseTableClass {
  
  /**
   * 
   * @param type $state_id
   * @return type
   * @throws PDOException
   */
  public static function getStateName($state_id) {
    try {
      $sql = 'SELECT ' . statesTableClass::getNameField(statesTableClass::STATE_NAME) . ' as state '
              . ' FROM ' . statesTableClass::getNameTable()
              . ' WHERE ' . statesTableClass::getNameField(statesTableClass::DELETED_AT) . ' IS NULL '
              . ' AND ' . statesTableClass::getNameField(statesTableClass::ID) . ' = :state_id ';
      $params = array(
          ':state_id' => $state_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->state : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
  
}
