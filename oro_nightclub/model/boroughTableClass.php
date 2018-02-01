<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of boroughTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class boroughTableClass extends boroughBaseTableClass {

  /**
   * 
   * @param type $borough_id
   * @return type
   * @throws PDOException
   */
  public static function getBoroughName($borough_id) {
    try {
      $sql = 'SELECT ' . boroughTableClass::getNameField(boroughTableClass::ID) . ', '
              . boroughTableClass::getNameField(boroughTableClass::DESCRIPTION_BOROUGH) . ' AS borough'
              . ' FROM  ' . boroughTableClass::getNameTable()
              . ' WHERE ' . boroughTableClass::getNameField(boroughTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . boroughTableClass::getNameField(boroughTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $borough_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->borough;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
