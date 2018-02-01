<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of listingAssignmentTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class listingAssignmentTableClass extends listingAssignmentBaseTableClass {

  /**
   * 
   * @param type $listing_id
   * @return type
   * @throws PDOException
   */
  public static function isListingAssigned($listing_id) {
    try {
      $sql = 'SELECT ' . listingAssignmentTableClass::getNameField(listingAssignmentTableClass::ID) . ' AS listing_assignment_id'
              . ' FROM ' . listingAssignmentTableClass::getNameTable()
              . ' WHERE ' . listingAssignmentTableClass::getNameField(listingAssignmentTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . listingAssignmentTableClass::getNameField(listingAssignmentTableClass::LISTING_ID_LISTING) . ' = :id';
      $params = array(
          ':id' => $listing_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->listing_assignment_id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  /**
   * 
   * @param type $listing_id
   * @return type
   * @throws PDOException
   */
  public static function getIdListingAssignedByListingId($listing_id) {
    try {
      $sql = 'SELECT ' . listingAssignmentTableClass::getNameField(listingAssignmentTableClass::ID) . ' AS listing_assignment_id '
              . ' FROM ' . listingAssignmentTableClass::getNameTable()
              . ' WHERE ' . listingAssignmentTableClass::getNameField(listingAssignmentTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . listingAssignmentTableClass::getNameField(listingAssignmentTableClass::LISTING_ID_LISTING) . ' = :id';
      $params = array(
          ':id' => $listing_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->listing_assignment_id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
  /**
   * 
   * @param type $listing_id
   * @return type
   * @throws PDOException
   */
  public static function getHashListingAssignedByListingId($listing_id) {
    try {
      $sql = 'SELECT ' . listingAssignmentTableClass::getNameField(listingAssignmentTableClass::LISTING_ASSIGNMENT_HASH) . ' AS listing_assignment_hash '
              . ' FROM ' . listingAssignmentTableClass::getNameTable()
              . ' WHERE ' . listingAssignmentTableClass::getNameField(listingAssignmentTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . listingAssignmentTableClass::getNameField(listingAssignmentTableClass::LISTING_ID_LISTING) . ' = :id';
      $params = array(
          ':id' => $listing_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->listing_assignment_hash : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $listing_assignment_hash
   * @return type
   * @throws PDOException
   */
  public static function getIdListingAssigned($listing_assignment_hash) {
    try {
      $sql = 'SELECT ' . listingAssignmentTableClass::getNameField(listingAssignmentTableClass::LISTING_ID_LISTING) . ' AS listing_id '
              . ' FROM ' . listingAssignmentTableClass::getNameTable()
              . ' WHERE ' . listingAssignmentTableClass::getNameField(listingAssignmentTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . listingAssignmentTableClass::getNameField(listingAssignmentTableClass::LISTING_ASSIGNMENT_HASH) . ' = :hash';
      $params = array(
          ':hash' => $listing_assignment_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->listing_id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
