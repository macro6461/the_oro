<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of buildingTypebleClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class buildingTypeTableClass extends buildingTypeBaseTableClass {

  /**
   * 
   * @param type $building_type_id
   * @return type
   * @throws PDOException
   */
  public static function getBuildingTypeName($building_type_id) {
    try {
      $sql = 'SELECT ' . buildingTypeTableClass::getNameField(buildingTypeTableClass::ID) . ', '
              . buildingTypeTableClass::getNameField(buildingTypeTableClass::DESCRIPTION_BUILDING_TYPE) . ' AS building_type'
              . ' FROM  ' . buildingTypeTableClass::getNameTable()
              . ' WHERE ' . buildingTypeTableClass::getNameField(buildingTypeTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . buildingTypeTableClass::getNameField(buildingTypeTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $building_type_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->building_type;
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
