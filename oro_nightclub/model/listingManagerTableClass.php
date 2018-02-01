<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of listingManagerTableClass
 *
 * @author Andres Felipe Alvarez <andresf9321@gmail.com>
 */
class listingManagerTableClass extends listingManagerBaseTableClass {
  
  /**
   * 
   * @param type $listing_hash
   * @return type
   * @throws PDOException
   */
  public static function getIdNewListingManager($listing_hash) {
    try {
      $sql = 'SELECT ' . listingManagerTableClass::ID
              . ' FROM ' . listingManagerTableClass::getNameTable()
              . ' WHERE ' . listingManagerTableClass::getNameField(listingManagerTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . listingManagerTableClass::LISTING_MANAGER_HASH . ' = :hash ';
      $params = array(
          ':hash' => $listing_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->id_listing_manager;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $listing_manager_id
   * @return type
   * @throws PDOException
   */
  public static function getListingManagerUserId($listing_manager_id) {
    try {
      $sql = 'SELECT ' . listingManagerTableClass::getNameField(listingManagerTableClass::USUARIO_ID) . ' as manager, '
              . listingManagerTableClass::getNameField(listingManagerTableClass::ID)
              . ' FROM ' . listingManagerTableClass::getNameTable()
              . ' WHERE ' . listingManagerTableClass::getNameField(listingManagerTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . listingManagerTableClass::getNameField(listingManagerTableClass::ID) . ' = :listingid';
      $params = array(
          ':listingid' => $listing_manager_id
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->manager : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
    /**
   * 
   * @param type $listing_manager_id
   * @return type
   * @throws PDOException
   */
  public static function getCoListingManagerUserId($listing_manager_id) {
    try {
      $sql = 'SELECT ' . listingManagerTableClass::getNameField(listingManagerTableClass::USUARIO_ID_CO) . ' as co_manager, '
              . listingManagerTableClass::getNameField(listingManagerTableClass::ID)
              . ' FROM ' . listingManagerTableClass::getNameTable()
              . ' WHERE ' . listingManagerTableClass::getNameField(listingManagerTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . listingManagerTableClass::getNameField(listingManagerTableClass::ID) . ' = :listingid';
      $params = array(
          ':listingid' => $listing_manager_id
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->co_manager : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
