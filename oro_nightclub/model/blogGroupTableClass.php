<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of blogGroupTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class blogGroupTableClass extends blogGroupBaseTableClass {

//  /**
//   * 
//   * @param type $access_id
//   * @return type
//   * @throws PDOException
//   */
//  public static function getAccessName($access_id) {
//    try {
//      $sql = 'SELECT ' . accessTableClass::getNameField(accessTableClass::ID) . ', '
//              . accessTableClass::getNameField(accessTableClass::ACCESS_DESCRIPTION) . ' AS access'
//              . ' FROM  ' . accessTableClass::getNameTable()
//              . ' WHERE ' . accessTableClass::getNameField(accessTableClass::DELETED_AT) . '  IS NULL'
//              . ' AND ' . accessTableClass::getNameField(accessTableClass::ID) . '  = :id';
//      $params = array(
//          ':id' => $access_id,
//      );
//      $answer = model::getInstance()->prepare($sql);
//      $answer->execute($params);
//      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
//      return $answer[0]->access;
//    } catch (PDOException $exc) {
//      throw $exc;
//    }
//  }

  /**
   * 
   * @param type $blog_hash
   * @return type
   * @throws PDOException
   */
  public static function getIdBlogGroupByHash($blog_hash) {
    try {
      $sql = 'SELECT ' . blogTableClass::getNameField(blogTableClass::ID) . ' AS blog_id'
              . ' FROM  ' . blogTableClass::getNameTable()
              . ' WHERE ' . blogTableClass::getNameField(blogTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . blogTableClass::getNameField(blogTableClass::BLOG_HASH) . ' = :hash';
      $params = array(
          ':hash' => $blog_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->blog_id;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

//  /**
//   * 
//   * @param type $credencialName
//   * @return type
//   * @throws PDOException
//   */
//  public static function getVerifyExistingCredencial($credencialName) {
//    try {
//      $sql = 'SELECT ' . credencialTableClass::getNameField(credencialTableClass::ID) . ', '
//              . credencialTableClass::getNameField(credencialTableClass::NOMBRE)
//              . ' FROM  ' . credencialTableClass::getNameTable()
//              . ' WHERE ' . credencialTableClass::getNameField(credencialTableClass::DELETED_AT) . '  IS NULL  '
//              . 'AND ' . credencialTableClass::NOMBRE . '  = :credencial';
//      $params = array(
//          ':credencial' => $credencialName,
//      );
//      $answer = model::getInstance()->prepare($sql);
//      $answer->execute($params);
//      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
//      return (count($answer) > 0 ) ? $answer : false;
//    } catch (PDOException $exc) {
//      throw $exc;
//    }
//  }

}
