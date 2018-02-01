<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of listingTypeTableClass
 *
 * @author Andres Felipe Alvarez <andresf9321@gmail.com>
 */
class listingTypeTableClass extends listingTypeBaseTableClass {

  /**
   * 
   * @param type $listing_type_id
   * @return type
   * @throws PDOException
   */
  public static function getListingTypeName($listing_type_id) {
    try {
      $sql = 'SELECT ' . listingTypeTableClass::getNameField(listingTypeTableClass::ID) . ', '
              . listingTypeTableClass::getNameField(listingTypeTableClass::DESCRIPTION_LISTING_TYPE) . ' AS listing_policy'
              . ' FROM  ' . listingTypeTableClass::getNameTable()
              . ' WHERE ' . listingTypeTableClass::getNameField(listingTypeTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . listingTypeTableClass::getNameField(listingTypeTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $listing_type_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->listing_policy;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
