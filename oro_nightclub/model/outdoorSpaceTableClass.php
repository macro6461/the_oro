<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of outdoorSpaceTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class outdoorSpaceTableClass extends outdoorSpaceBaseTableClass {

  /**
   * 
   * @param type $id_outdoor_space
   * @return type
   * @throws PDOException
   */
  public static function getOutdoorSpaceName($id_outdoor_space) {
    try {
      $sql = 'SELECT ' . outdoorSpaceTableClass::getNameField(outdoorSpaceTableClass::ID) . ', '
              . outdoorSpaceTableClass::getNameField(outdoorSpaceTableClass::DESCRIPTION_OUTDOOR_SPACE) . ' AS outdoor_space'
              . ' FROM  ' . outdoorSpaceTableClass::getNameTable()
              . ' WHERE ' . outdoorSpaceTableClass::getNameField(outdoorSpaceTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . outdoorSpaceTableClass::getNameField(outdoorSpaceTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $id_outdoor_space,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->outdoor_space;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $credencialName
   * @return type
   * @throws PDOException
   */
  public static function getVerifyExistingCredencial($credencialName) {
    try {
      $sql = 'SELECT ' . credencialTableClass::getNameField(credencialTableClass::ID) . ', '
              . credencialTableClass::getNameField(credencialTableClass::NOMBRE)
              . ' FROM  ' . credencialTableClass::getNameTable()
              . ' WHERE ' . credencialTableClass::getNameField(credencialTableClass::DELETED_AT) . '  IS NULL  '
              . 'AND ' . credencialTableClass::NOMBRE . '  = :credencial';
      $params = array(
          ':credencial' => $credencialName,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
