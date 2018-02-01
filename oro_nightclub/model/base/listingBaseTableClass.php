<?php

use mvc\model\table\tableBaseClass;

/**
 * Description of listingBaseTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class listingBaseTableClass extends tableBaseClass {

  const ID = 'id_listing';
  const UNIT_NUMBER_LISTING = 'unit_number_listing';
  const LISTING_SIZE_ID_LISTING_SIZE = 'listing_size_id_listing_size';
  const RENT_LISTING = 'rent_listing';
  const RENT_LISTING_LENGTH = 45;
  const BATH_SIZE_LISTING = 'bath_size_listing';
  const FEE_OP_LISTING = 'fee_op_listing';
  const CUSTOM_FEE_OP_LISTING = 'custom_fee_op_listing';
  const DESCRIPTION_LISTING = 'description_listing';
  const DESCRIPTION_LISTING_LENGTH = 255;
  const LEASE_TERM_START = 'lease_term_start';
  const LEASE_TERM_END = 'lease_term_end';
  const LOCKBOX_LISTING = 'lockbox_listing';
  const LOCKBOX_LISTING_LENGTH = 45;
  const FLOOR_NUMBER_LISTING = 'floor_number_listing';
  const EMAIL_NOTIFICATION_STATUS = 'email_notification_status';
  const NOTES_LISTING = 'notes_listing';
  const CONTACT_FIRST_NAME = 'contact_first_name';
  const CONTACT_FIRST_NAME_LENGTH = 80;
  const CONTACT_MIDDLE_NAME = 'contact_middle_name';
  const CONTACT_MIDDLE_NAME_LENGTH = 80;
  const CONTACT_LAST_NAME = 'contact_last_name';
  const CONTACT_LAST_NAME_LENGTH = 155;
  const CONTACT_EMAIL_ADDRESS = 'contact_email_address';
  const CONTACT_EMAIL_ADDRESS_LENGTH = 155;
  const CONTACT_PHONE_NUMBER = 'contact_phone_number';
  const CONTACT_NOTES = 'contact_notes';
  const CONTACT_NOTES_LENGTH = 255;
  const LISTING_HASH = 'listing_hash';
  const STATUS = 'status';
  const LISTING_FEATURES_ID_LISTING_FEATURES = 'listing_features_id_listing_features';
  const LANDLORD_ID_LANDLORD = 'landlord_id_landlord';
  const BUILDING_ID_BUILDING = 'building_id_building';
  const ACCESS_ID_ACCESS = 'access_id_access';
  const USUARIO_ID = 'usuario_id';
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
  const DELETED_AT = 'deleted_at';

  /**
   * Método para obtener el nombre del campo más la tabla ya sea en formato
   * DB (.) o en formato HTML (_)
   *
   * @param string $field Nombre del campo
   * @param string $html [optional] Por defecto traerá el nombre del campo en
   * versión DB
   * @return string
   */
  public static function getNameField($field, $html = false, $table = null) {
    return parent::getNameField($field, self::getNameTable(), $html);
  }

  /**
   * Obtiene el nombre de la tabla
   * @return string
   */
  public static function getNameTable() {
    return 'listing';
  }

  /**
   * Método para borrar un registro de una tabla X en la base de datos
   *
   * @param array $ids Array con los campos por posiciones
   * asociativas y los valores por valores a tener en cuenta para el borrado.
   * Ejemplo $fieldsAndValues['id'] = 1
   * @param boolean $deletedLogical [optional] Borrado lógico [por defecto] o
   * borrado físico de un registro en una tabla de la base de datos
   * @return PDOException|boolean
   */
  public static function delete($ids, $deletedLogical = true, $table = null) {
    return parent::delete($ids, $deletedLogical, self::getNameTable());
  }

  /**
   * Método para insertar en una tabla usuario
   *
   * @param array $data Array asociativo donde las claves son los nombres de
   * los campos y su valor sería el valor a insertar. Ejemplo:
   * $data['nombre'] = 'Erika'; $data['apellido'] = 'Galindo';
   * @return PDOException|boolean
   */
  public static function insert($data, $table = null) {
    return parent::insert(self::getNameTable(), $data);
  }

  /**
   * Método para leer todos los registros de una tabla
   *
   * @param array $fields Array con los nombres de los campos a solicitar
   * @param boolean $deletedLogical [optional] Indicación de borrado lógico
   * o borrado físico
   * @param array $orderBy [optional] Array con el o los nombres de los campos
   * por los cuales se ordenará la consulta
   * @param string $order [optional] Forma de ordenar la consulta
   * (por defecto NULL), pude ser ASC o DESC
   * @param integer $limit [optional] Cantidad de resultados a mostrar
   * @param integer $offset [optional] Página solicitadad sobre la cantidad
   * de datos a mostrar
   * @return mixed una instancia de una clase estandar, la cual tendrá como
   * variables publica los nombres de las columnas de la consulta o una
   * instancia de \PDOException en caso de fracaso.
   */
  public static function getAll($fields, $deletedLogical = true, $orderBy = null, $order = null, $limit = null, $offset = null, $where = null, $table = null) {
    return parent::getAll(self::getNameTable(), $fields, $deletedLogical, $orderBy, $order, $limit, $offset, $where);
  }

  /**
   * Método para actualizar un registro en una tabla de una base de datos
   *
   * @param array $ids Array asociativo con las posiciones por nombres de los
   * campos y los valores son quienes serían las llaves a buscar.
   * @param array $data Array asociativo con los datos a modificar,
   * las posiciones por nombres de las columnas con los valores por los nuevos
   * datos a escribir
   * @return PDOException|boolean
   */
  public static function update($ids, $data, $table = null) {
    return parent::update($ids, $data, self::getNameTable());
  }

}
