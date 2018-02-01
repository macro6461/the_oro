<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of sitePagesTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class sitePagesTableClass extends sitePagesBaseTableClass {

  /**
   * 
   * @param type $site_page_hash
   * @return type
   * @throws PDOException
   */
  public static function getSitePageName($site_page_hash) {
    try {
      $sql = 'SELECT ' . sitePagesTableClass::getNameField(sitePagesTableClass::DESC_SITE_PAGE) . ' as site_page '
              . ' FROM ' . sitePagesTableClass::getNameTable()
              . ' WHERE ' . sitePagesTableClass::getNameField(sitePagesTableClass::DELETED_AT) . ' IS NULL '
              . ' AND ' . sitePagesTableClass::getNameField(sitePagesTableClass::SITE_PAGE_HASH) . ' = :hash ';
      $params = array(
          ':hash' => $site_page_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->site_page : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
