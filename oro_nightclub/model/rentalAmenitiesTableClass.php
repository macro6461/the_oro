<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of rentalAmenitiesTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class rentalAmenitiesTableClass extends rentalAmenitiesBaseTableClass {

  /**
   * 
   * @param type $rental_amenities_id
   * @return type
   * @throws PDOException
   */
 public static function getRentalAmenitiesName($rental_amenities_id) {
    try {
      $sql = 'SELECT ' . rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::ID) . ', '
              . rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::DESCRIPTION_RENTAL_AMENITIES) . ' AS rental_amenities'
              . ' FROM  ' . rentalAmenitiesTableClass::getNameTable()
              . ' WHERE ' . rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . rentalAmenitiesTableClass::getNameField(rentalAmenitiesTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $rental_amenities_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->rental_amenities;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
}
