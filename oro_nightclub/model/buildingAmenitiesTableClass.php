<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of buildingAmenitiesTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class buildingAmenitiesTableClass extends buildingAmenitiesBaseTableClass {


  /**
   * 
   * @param type $building_hash
   * @return type
   * @throws PDOException
   */
  public static function getIdNewBuildingAmenities($building_hash) {
    try {
      $sql = 'SELECT ' . buildingAmenitiesTableClass::ID 
              . ' FROM ' . buildingAmenitiesTableClass::getNameTable()
              . ' WHERE ' . buildingAmenitiesTableClass::getNameField(buildingAmenitiesTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . buildingAmenitiesTableClass::BUILDING_AMENITIES_HASH . ' = :hash ';
      $params = array(
          ':hash' => $building_hash,
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
