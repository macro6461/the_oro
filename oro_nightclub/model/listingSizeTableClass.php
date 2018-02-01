<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of listingSizeTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class listingSizeTableClass extends listingSizeBaseTableClass {

  
  /**
   * 
   * @param type $listing_size_id
   * @return type
   * @throws PDOException
   */
  public static function getListingSizeByID($listing_size_id) {
    try {
      $sql = 'SELECT ' . listingSizeTableClass::getNameField(listingSizeTableClass::DESCRIPTION_LISTING_SIZE) . ' as listing_size '
              . ' FROM ' . listingSizeTableClass::getNameTable()
              . ' WHERE ' . listingSizeTableClass::getNameField(listingSizeTableClass::DELETED_AT) . ' IS NULL '
              . ' AND ' . listingSizeTableClass::getNameField(listingSizeTableClass::ID) . ' = :id ';
      $params = array(
          ':id' => $listing_size_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->listing_size : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
}
