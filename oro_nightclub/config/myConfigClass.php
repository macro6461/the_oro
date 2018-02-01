<?php

namespace mvc\config {

  use mvc\config\configClass;

  /**
   * Description of myConfigClass
   *
   * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
   */
  class myConfigClass extends configClass {

    private static $bohemia_dsn;
    private static $bohemia_driver;
    private static $bohemia_host;
    private static $bohemia_port;
    private static $bohemia_name;
    private static $bohemia_user;
    private static $bohemia_password;
    private static $bohemia_unix_socket;
    private static $google_maps_api;
    private static $remote_access;

   
    /**
     * @return string
     */
    public static function getRemoteAccess() {
      return self::$remote_access;
    }

    /**
     * @param string $remote_access
     */
    public static function setRemoteAccess($remote_access) {
      self::$remote_access = $remote_access;
    }

    /**
     * @return string
     */
    public static function getGoogleMapsAPI() {
      return self::$google_maps_api;
    }

    /**
     * @param string $google_maps_api
     */
    public static function setGoogleMapsAPI($google_maps_api) {
      self::$google_maps_api = $google_maps_api;
    }

    /**
     * @return string
     */
    public static function getBohemiaDriver() {
      return self::$bohemia_driver;
    }

    /**
     * @param string $bohemia_driver
     */
    public static function setBohemiaDriver($bohemia_driver) {
      self::$bohemia_driver = $bohemia_driver;
    }

    /**
     * @return string
     */
    public static function getBohemiaHost() {
      return self::$bohemia_host;
    }

    /**
     * @param string $bohemia_host
     */
    public static function setBohemiaHost($bohemia_host) {
      self::$bohemia_host = $bohemia_host;
    }

    /**
     * @return string
     */
    public static function getBohemiaName() {
      return self::$bohemia_name;
    }

    /**
     * @param string $bohemia_name
     */
    public static function setBohemiaName($bohemia_name) {
      self::$bohemia_name = $bohemia_name;
    }

    /**
     * @return string
     */
    public static function getBohemiaPassword() {
      return self::$bohemia_password;
    }

    /**
     * @param string $bohemia_password
     */
    public static function setBohemiaPassword($bohemia_password) {
      self::$bohemia_password = $bohemia_password;
    }

    /**
     * @return integer
     */
    public static function getBohemiaPort() {
      return self::$bohemia_port;
    }

    /**
     * @param integer $bohemia_port
     */
    public static function setBohemiaPort($bohemia_port) {
      self::$bohemia_port = $bohemia_port;
    }

    /**
     * @return string
     */
    public static function getBohemiaUser() {
      return self::$bohemia_user;
    }

    /**
     * @param string $bohemia_user
     */
    public static function setBohemiaUser($bohemia_user) {
      self::$bohemia_user = $bohemia_user;
    }

    /**
     * @return string
     */
    public static function getBohemiaDsn() {
      return self::$bohemia_dsn;
    }

    /**
     * @param string $bohemia_dsn
     */
    public static function setBohemiaDsn($bohemia_dsn) {
      self::$bohemia_dsn = $bohemia_dsn;
    }

    /**
     * 
     * @return type
     */
    public static function getBohemiaUnixSocket() {
      return self::$bohemia_unix_socket;
    }

    /**
     * 
     * @param type $bohemia_unix_socket
     */
    public static function setBohemiaUnixSocket($bohemia_unix_socket) {
      self::$bohemia_unix_socket = $bohemia_unix_socket;
    }

  }

}