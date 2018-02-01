<?php

use mvc\config\myConfigClass as config;
use mvc\session\sessionClass as session;
use mvc\request\requestClass as request;

config::setRowGrid(10);

config::setSohoFrameworkVersion("1.0.15");
config::setSohoFrameworkAppName("Oro Nightclub");
config::setSohoFrameworAccronName("ORO");
config::setGoogleMapsAPI("AIzaSyC9Ry5drm4OO_jHv7kwFpqD3pm9k1A8xyQ");
config::setScope('prod'); // prod
config::setRemoteAccess('off');

if (config::getScope() == 'dev') {

  config::setDbHost('localhost');
  config::setDbDriver('mysql'); // pgsql mysql
  config::setDbName('bohemia_group');
  config::setDbPort(3306); // 5432 3306
  config::setDbUser('root');
  config::setDbPassword('');
// Esto solo es necesario en caso de necesitar un socket para la DB
  config::setDbUnixSocket(null); ///tmp/mysql.sock

  if (config::getDbUnixSocket() !== null) {
    config::setDbDsn(
            config::getDbDriver()
            . ':unix_socket=' . config::getDbUnixSocket()
            . ';dbname=' . config::getDbName()
    );
  } else {
    config::setDbDsn(
            config::getDbDriver()
            . ':host=' . config::getDbHost()
            . ';port=' . config::getDbPort()
            . ';dbname=' . config::getDbName()
    );
  }
  if (config::getRemoteAccess() == 'on') {
    $remote_address = $_SERVER['SERVER_ADDR'];
    config::setPathAbsolute('/opt/lampp/htdocs/oro_nightclub/');
    config::setUrlBase('http://' . $remote_address . '/oro_nightclub/web/');
  } elseif (config::getRemoteAccess() == 'off') {
    config::setPathAbsolute('/opt/lampp/htdocs/oro_nightclub/');
    config::setUrlBase('http://localhost/oro_nightclub/web/');
    
  }
} elseif (config::getScope() == 'prod') {

  //local db
  config::setDbHost('localhost');//10.195.64.110
  config::setDbDriver('mysql'); // pgsql mysql
  config::setDbName('mptechno_oro_night_club');
  config::setDbPort(3306); // 5432 3306
  config::setDbUser('mptechno_oro');
  config::setDbPassword('1q2w3e4r5t6y7u8i');
// Esto solo es necesario en caso de necesitar un socket para la DB
  config::setDbUnixSocket(null); ///tmp/mysql.sock

  if (config::getDbUnixSocket() !== null) {
    config::setDbDsn(
            config::getDbDriver()
            . ':unix_socket=' . config::getDbUnixSocket()
            . ';dbname=' . config::getDbName()
    );
  } else {
    config::setDbDsn(
            config::getDbDriver()
            . ':host=' . config::getDbHost()
            . ';port=' . config::getDbPort()
            . ';dbname=' . config::getDbName()
    );
  }

  config::setPathAbsolute('/home/mptechnosuite/public_html/dev/oro_nightclub/');
  config::setUrlBase('https://dev.mptechnosuite.com/oro_nightclub/web/');
  
} elseif (config::getScope() == 'test') {

  config::setDbHost('166.62');
  config::setDbDriver('mysql'); // pgsql mysql
  config::setDbName('mptechno_bohemia_group');
  config::setDbPort(3306); // 5432
  config::setDbUser('mptechno_bohemia');
  config::setDbPassword('b0hem1a2017');
// Esto solo es necesario en caso de necesitar un socket para la DB
  config::setDbUnixSocket(null); ///tmp/mysql.sock

  if (config::getDbUnixSocket() !== null) {
    config::setDbDsn(
            config::getDbDriver()
            . ':unix_socket=' . config::getDbUnixSocket()
            . ';dbname=' . config::getDbName()
    );
  } else {
    config::setDbDsn(
            config::getDbDriver()
            . ':host=' . config::getDbHost()
            . ';port=' . config::getDbPort()
            . ';dbname=' . config::getDbName()
    );
  }

}

if (session::getInstance()->hasDefaultCulture() === false) {
  config::setDefaultCulture('en');
} else {
  config::setDefaultCulture(session::getInstance()->getDefaultCulture());
}

config::setIndexFile('index.php');

config::setFormatTimestamp('Y-m-d H:i:s');

config::setHeaderJson('Content-Type: application/json; charset=utf-8');
config::setHeaderXml('Content-Type: application/xml; charset=utf-8');
config::setHeaderHtml('Content-Type: text/html; charset=utf-8');
config::setHeaderPdf('Content-type: application/pdf; charset=utf-8');
config::setHeaderJavascript('Content-Type: text/javascript; charset=utf-8');
config::setHeaderExcel2003('Content-Type: application/vnd.ms-excel; charset=utf-8');
config::setHeaderExcel2007('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8');

config::setCookieNameRememberMe('mvcSiteRememberMe');
config::setCookieNameSite('mvcSite');
config::setCookiePath('/' . config::getIndexFile());
config::setCookieDomain('https://dev.mptechnosuite.com/');
config::setCookieTime(3600 * 8); // una hora en segundo 3600 y por 8 serían 8 horas

config::setDefaultModule('default');
config::setDefaultAction('index');

config::setDefaultModuleSecurity('shfSecurity');
config::setDefaultActionSecurity('index');

config::setDefaultModulePermission('shfSecurity');
config::setDefaultActionPermission('noPermission');

config::setDefaultModuleException('shfSecurity');
config::setDefaultActionException('exception');

