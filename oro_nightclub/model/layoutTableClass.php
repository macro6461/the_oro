<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of layoutTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class layoutTableClass extends layoutBaseTableClass {

/**
 * 
 * @param type $id_layout
 * @return type
 * @throws PDOException
 */
public static function getLayoutName($id_layout) {
    try {
      $sql = 'SELECT ' . layoutTableClass::getNameField(layoutTableClass::ID) . ', '
              . layoutTableClass::getNameField(layoutTableClass::DESCRIPTION_LAYOUT) . ' AS layout'
              . ' FROM  ' . layoutTableClass::getNameTable()
              . ' WHERE ' . layoutTableClass::getNameField(layoutTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . layoutTableClass::getNameField(layoutTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $id_layout,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->layout;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
}
