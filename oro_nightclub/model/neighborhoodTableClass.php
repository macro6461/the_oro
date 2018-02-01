<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of neighborhoodTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class neighborhoodTableClass extends neighborhoodBaseTableClass {

  /**
   * 
   * @param type $neighborhood_id
   * @return type
   * @throws PDOException
   */
  public static function getNeighborhoodName($neighborhood_id) {
    try {
      $sql = 'SELECT ' . neighborhoodTableClass::getNameField(neighborhoodTableClass::ID) . ', '
              . neighborhoodTableClass::getNameField(neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD) . ' AS neighborhood'
              . ' FROM  ' . neighborhoodTableClass::getNameTable()
              . ' WHERE ' . neighborhoodTableClass::getNameField(neighborhoodTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . neighborhoodTableClass::getNameField(neighborhoodTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $neighborhood_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->neighborhood;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * @param type $neighborhood_name
   * @return type
   * @throws PDOException
   */
  public static function getVerifyExistingNeighborhood($neighborhood_name) {
    try {
      $sql = 'SELECT ' . neighborhoodTableClass::getNameField(neighborhoodTableClass::ID) . ', '
              . neighborhoodTableClass::getNameField(neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD)
              . ' FROM  ' . neighborhoodTableClass::getNameTable()
              . ' WHERE ' . neighborhoodTableClass::getNameField(neighborhoodTableClass::DELETED_AT) . '  IS NULL  '
              . 'AND ' . neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD . ' = :neighborhood';
      $params = array(
          ':neighborhood' => $neighborhood_name,
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
   * @param type $neigborhood_id
   * @return type
   * @throws PDOException
   */
  public static function getVerifyNeighborhoodById($neigborhood_id) {
    try {
      $sql = 'SELECT ' . neighborhoodTableClass::getNameField(neighborhoodTableClass::ID) . ' AS neigborhood_id '
              . ' FROM  ' . neighborhoodTableClass::getNameTable()
              . ' WHERE ' . neighborhoodTableClass::getNameField(neighborhoodTableClass::DELETED_AT) . '  IS NULL  '
              . 'AND ' . neighborhoodTableClass::ID . ' = :id';
      $params = array(
          ':id' => $neigborhood_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->neigborhood_id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
