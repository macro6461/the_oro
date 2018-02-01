<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of rolesPermissionsTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class rolesPermissionsTableClass extends rolesPermissionsBaseTableClass {


/**
 * 
 * @param type $credencial_hash
 * @return type
 * @throws PDOException
 */
public static function getIdNewRolesPermissions($credencial_hash) {
    try {
      $sql = 'SELECT ' . rolesPermissionsTableClass::ID 
              . ' FROM ' . rolesPermissionsTableClass::getNameTable()
              . ' WHERE ' . rolesPermissionsTableClass::getNameField(rolesPermissionsTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . rolesPermissionsTableClass::ROLE_PERMISSIONS_HASH . ' = :hash ';
      $params = array(
          ':hash' => $credencial_hash,
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
