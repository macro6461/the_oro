<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of amenitiesTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class amenitiesTableClass extends amenitiesBaseTableClass {

  /**
   * 
   * @param type $amenities_id
   * @return type
   * @throws PDOException
   */
  public static function getAmenitiesName($amenities_id) {
    try {
      $sql = 'SELECT ' . amenitiesTableClass::getNameField(amenitiesTableClass::ID) . ', '
              . amenitiesTableClass::getNameField(amenitiesTableClass::DESCRIPTION_AMENITIES) . ' AS amenities'
              . ' FROM  ' . amenitiesTableClass::getNameTable()
              . ' WHERE ' . amenitiesTableClass::getNameField(amenitiesTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . amenitiesTableClass::getNameField(amenitiesTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $amenities_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->amenities;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
