<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of listingTableClass
 *
 * @author Andres Felipe Alvarez <andresf9321@gmail.com>
 */
class listingTableClass extends listingBaseTableClass {

  /**
   * 
   * @param type $listing_hash
   * @return type
   * @throws PDOException
   */
  public static function getIdNewListing($listing_hash) {
    try {
      $sql = 'SELECT ' . listingTableClass::ID . ' AS listing_id '
              . ' FROM ' . listingTableClass::getNameTable()
              . ' WHERE ' . listingTableClass::getNameField(listingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . listingTableClass::LISTING_HASH . ' = :hash ';
      $params = array(
          ':hash' => $listing_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->listing_id : false;
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
  public static function getListingHashById($listing_id) {
    try {
      $sql = 'SELECT ' . listingTableClass::getNameField(listingTableClass::LISTING_HASH) . ' AS listing_hash '
              . ' FROM ' . listingTableClass::getNameTable()
              . ' WHERE ' . listingTableClass::getNameField(listingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . listingTableClass::getNameField(listingTableClass::ID) . ' = :id ';
      $params = array(
          ':id' => $listing_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->listing_hash : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $listing_id
   * @return type
   */
  public static function getListingById($listing_id) {

    $listing_fields = array(
        listingTableClass::ID,
        listingTableClass::RENT_LISTING,
        listingTableClass::UNIT_NUMBER_LISTING,
        listingTableClass::BATH_SIZE_LISTING,
        listingTableClass::FEE_OP_LISTING,
        listingTableClass::CUSTOM_FEE_OP_LISTING,
        listingTableClass::LEASE_TERM_START,
        listingTableClass::LEASE_TERM_END,
        listingTableClass::ACCESS_ID_ACCESS,
        listingTableClass::LOCKBOX_LISTING,
        listingTableClass::FLOOR_NUMBER_LISTING,
        listingTableClass::NOTES_LISTING,
        listingTableClass::DESCRIPTION_LISTING,
        listingTableClass::CONTACT_FIRST_NAME,
        listingTableClass::CONTACT_MIDDLE_NAME,
        listingTableClass::CONTACT_LAST_NAME,
        listingTableClass::CONTACT_EMAIL_ADDRESS,
        listingTableClass::CONTACT_PHONE_NUMBER,
        listingTableClass::CONTACT_NOTES,
        listingTableClass::STATUS,
        listingTableClass::EMAIL_NOTIFICATION_STATUS,
        listingTableClass::LISTING_SIZE_ID_LISTING_SIZE,
        listingTableClass::BUILDING_ID_BUILDING,
        listingTableClass::LANDLORD_ID_LANDLORD,
        listingTableClass::LISTING_FEATURES_ID_LISTING_FEATURES,
        listingTableClass::LISTING_HASH,
        listingTableClass::CREATED_AT,
        listingTableClass::UPDATED_AT
    );
    $where_listing = array(
        listingTableClass::ID => $listing_id,
    );

    $objListing = listingTableClass::getAll($listing_fields, true, null, null, null, null, $where_listing);

    return $objListing;
  }

  /**
   * 
   * @param type $listing_hash
   * @return type
   * @throws PDOException
   */
  public static function VerifyListingHash($listing_hash) {
    try {
      $sql = 'SELECT ' . listingTableClass::getNameField(listingTableClass::ID) . ' AS listing_id '
              . ' FROM ' . listingTableClass::getNameTable()
              . ' WHERE ' . listingTableClass::getNameField(listingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . listingTableClass::getNameField(listingTableClass::LISTING_HASH) . ' = :hash ';
      $params = array(
          ':hash' => $listing_hash,
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
