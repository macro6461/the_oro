<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of proceduresTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class proceduresTableClass extends proceduresBaseTableClass {

  /**
   * 
   * @param type $id_floor_type
   * @return type
   * @throws PDOException
   */
  public static function getFloorTypeName($id_floor_type) {
    try {
      $sql = 'SELECT ' . floorTypeTableClass::getNameField(floorTypeTableClass::ID) . ', '
              . floorTypeTableClass::getNameField(floorTypeTableClass::DESCRIPTION_FLOOR_TYPE) . ' AS floor_type'
              . ' FROM  ' . floorTypeTableClass::getNameTable()
              . ' WHERE ' . floorTypeTableClass::getNameField(floorTypeTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . floorTypeTableClass::getNameField(floorTypeTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $id_floor_type,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->floor_type;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
}
