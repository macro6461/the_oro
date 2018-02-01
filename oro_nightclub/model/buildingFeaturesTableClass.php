<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of buildingFeaturesTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class buildingFeaturesTableClass extends buildingFeaturesBaseTableClass {

  /**
   * 
   * @param type $building_hash
   * @return type
   * @throws PDOException
   */
  public static function getIdNewBuildingFeatures($building_hash) {
    try {
      $sql = 'SELECT ' . buildingFeaturesTableClass::ID
              . ' FROM ' . buildingFeaturesTableClass::getNameTable()
              . ' WHERE ' . buildingFeaturesTableClass::getNameField(buildingFeaturesTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . buildingFeaturesTableClass::BUILDING_FEATURES_HASH . ' = :hash ';
      $params = array(
          ':hash' => $building_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->id_building_features;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
