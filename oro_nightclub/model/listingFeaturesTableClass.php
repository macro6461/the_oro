<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of listingFeaturesTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class listingFeaturesTableClass extends listingFeaturesBaseTableClass {

  /**
   * 
   * @param type $listing_hash
   * @return type
   * @throws PDOException
   */
  public static function getIdNewListingFeatures($listing_hash) {
    try {
      $sql = 'SELECT ' . listingFeaturesTableClass::ID . ' AS listing_features_id '
              . ' FROM ' . listingFeaturesTableClass::getNameTable()
              . ' WHERE ' . listingFeaturesTableClass::getNameField(listingFeaturesTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . listingFeaturesTableClass::LISTING_FEATURES_HASH . ' = :hash ';
      $params = array(
          ':hash' => $listing_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->listing_features_id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
