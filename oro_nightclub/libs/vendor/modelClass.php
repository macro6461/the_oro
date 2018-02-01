<?php

namespace mvc\model {

  use mvc\config\configClass;
  use mvc\config\myConfigClass;
  use mvc\session\sessionClass as session;

  /**
   * Description of modelClass
   *
   * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
   */
  class modelClass {

    static private $instance = null;
//    static private $bohemiaInstance = null;

    /**
     * el constructor es privado por lo que nadie puede crear
     * una nueva instancia utilizando new
     */
    private function __construct() {
      
    }

    /**
     * Al igual que el constructor, hacemos __clone privada
     * para que nadie pueda clonar la instancia
     */
    private function __clone() {
      
    }

    /**
     * 
     * @return \PDO
     */
    static public function getInstance() {
      if (!self::$instance) {
        self::connect();
      }
      if (session::getInstance()->hasAttribute('mvcDbQuery')) {
        session::getInstance()->setAttribute('mvcDbQuery', session::getInstance()->getAttribute('mvcDbQuery') + 1);
      } else {
        session::getInstance()->setAttribute('mvcDbQuery', 1);
      }
      return self::$instance;
    }
//    
//        /**
//     * 
//     * @return \PDO
//     */
//    static public function getBohemiaInstance() {
//      if (!self::$bohemiaInstance) {
//        self::connectBohemia();
//      }
//      if (session::getInstance()->hasAttribute('mvcDbQuery')) {
//        session::getInstance()->setAttribute('mvcDbQuery', session::getInstance()->getAttribute('mvcDbQuery') + 1);
//      } else {
//        session::getInstance()->setAttribute('mvcDbQuery', 1);
//      }
//      return self::$bohemiaInstance;
//    }

    static private function connect() {
      try {
        // conexión a la DB
        self::$instance = new \PDO(configClass::getDbDsn(), configClass::getDbUser(), configClass::getDbPassword());
        // PDO::ATTR_ERRMODE: Reporte de errores
        // PDO::ERRMODE_EXCEPTION: Lanza exceptions.
        self::$instance->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
//        self::$instance->setAttribute(\PDO::ATTR_AUTOCOMMIT, FALSE);
        self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      } catch (\PDOException $exc) {
        throw $exc;
      }
    }
    
//     static private function connectBohemia() {
//      try {
//        // conexión a la DB intranet_bohemia /bohemiarealtygroup.com
//        self::$bohemiaInstance = new \PDO(myConfigClass::getBohemiaDsn(), myConfigClass::getBohemiaUser(), myConfigClass::getBohemiaPassword());
//        // PDO::ATTR_ERRMODE: Reporte de errores
//        // PDO::ERRMODE_EXCEPTION: Lanza exceptions.
//        self::$bohemiaInstance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
//      } catch (\PDOException $exc) {
//        throw $exc;
//      }
//    }

  }

}