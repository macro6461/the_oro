<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;
use mvc\session\sessionClass as session;
use mvc\routing\routingClass as routing;

/**
 * Description of usuarioTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class userProfilesTableClass extends userProfilesBaseTableClass {

  /**
   * 
   * @param type $usuario
   * @param type $password
   * @return type
   * @throws PDOException
   */
  public static function verifyUser($usuario, $password) {
    try {
      $sql = 'SELECT ' . credencialTableClass::getNameField(credencialTableClass::NOMBRE) . ' as credencial,
	' . usuarioTableClass::getNameField(usuarioTableClass::USER) . ' as usuario,
	' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ' as id_usuario
    FROM ' . usuarioTableClass::getNameTable() . ' LEFT JOIN ' . usuarioCredencialTableClass::getNameTable() . ' ON ' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ' = ' . usuarioCredencialTableClass::getNameField(usuarioCredencialTableClass::USUARIO_ID) . '
    LEFT JOIN ' . credencialTableClass::getNameTable() . ' ON ' . credencialTableClass::getNameField(credencialTableClass::ID) . ' = ' . usuarioCredencialTableClass::getNameField(usuarioCredencialTableClass::CREDENCIAL_ID) . '
    WHERE ' . usuarioTableClass::getNameField(usuarioTableClass::ACTIVED) . ' = :actived
    AND ' . usuarioTableClass::getNameField(usuarioTableClass::DELETED_AT) . ' IS NULL
    AND ' . credencialTableClass::getNameField(credencialTableClass::DELETED_AT) . ' IS NULL
    AND ' . usuarioTableClass::getNameField(usuarioTableClass::USER) . ' = :user
    AND ' . usuarioTableClass::getNameField(usuarioTableClass::PASSWORD) . ' = :pass';
      $params = array(
          ':user' => $usuario,
          ':pass' => md5(md5($password)),
          ':actived' => ((config::getDbDriver() === 'mysql') ? 1 : 't')
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $usuario
   * @param type $password
   * @return type
   * @throws PDOException
   */
  public static function verifyActivation($usuario, $password) {
    try {
      $sql = 'SELECT ' . usuarioTableClass::getNameField(usuarioTableClass::USER) . ' as usuario,
	' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ' as id_usuario, '
              . usuarioTableClass::getNameField(usuarioTableClass::ACTIVED) . ' as status '
              . ' FROM ' . usuarioTableClass::getNameTable() . '
    WHERE ' . usuarioTableClass::getNameField(usuarioTableClass::DELETED_AT) . ' IS NULL
    AND ' . usuarioTableClass::getNameField(usuarioTableClass::USER) . ' = :user
    AND ' . usuarioTableClass::getNameField(usuarioTableClass::PASSWORD) . ' = :pass';
      $params = array(
          ':user' => $usuario,
          ':pass' => md5(md5($password)),
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->status : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $userID
   * @return type
   * @throws PDOException
   */
  public static function isActivated($userID) {
    try {
      $sql = 'SELECT ' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ', '
              . usuarioTableClass::getNameField(usuarioTableClass::ACTIVED) . ' as status '
              . ' FROM ' . usuarioTableClass::getNameTable() 
              . ' WHERE ' . usuarioTableClass::getNameField(usuarioTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ' = :id';
      $params = array(
          ':id' => $userID,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->status : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $usuario
   * @param type $password
   * @return type
   * @throws PDOException
   */
  public static function getUserEmail($usuario, $password) {
    try {
      $sql = 'SELECT ' . usuarioTableClass::getNameField(usuarioTableClass::USER) . ' as usuario,
	' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ' as id_usuario, '
              . usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS) . ' as email '
              . ' FROM ' . usuarioTableClass::getNameTable() . '
    WHERE ' . usuarioTableClass::getNameField(usuarioTableClass::DELETED_AT) . ' IS NULL
    AND ' . usuarioTableClass::getNameField(usuarioTableClass::USER) . ' = :user
    AND ' . usuarioTableClass::getNameField(usuarioTableClass::PASSWORD) . ' = :pass';
      $params = array(
          ':user' => $usuario,
          ':pass' => md5(md5($password)),
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->email : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $id
   * @return boolean
   * @throws PDOException
   */
  public static function setRegisterLastLoginAt($id) {
    try {
      $sql = 'UPDATE ' . usuarioTableClass::getNameTable() . '
              SET ' . usuarioTableClass::LAST_LOGIN_AT . ' = :last_login_at
              WHERE ' . usuarioTableClass::ID . ' = :id';
      $params = array(
          ':id' => $id,
          ':last_login_at' => date(config::getFormatTimestamp())
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      return true;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $id
   * @return type
   * @throws PDOException
   */
  public static function getUserName($id) {
    try {
      $sql = 'SELECT ' . usuarioTableClass::USER . ' AS nombre ,' . usuarioTableClass::ID .
              ' FROM ' . usuarioTableClass::getNameTable() .
              ' WHERE ' . usuarioTableClass::ID . ' = :id';
      $params = array(
          ':id' => $id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->nombre : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @return type
   * @throws PDOException
   */
  public static function countUsers() {
    try {
      $sql = 'SELECT COUNT(' . usuarioTableClass::ID . ') AS USER' .
              ' FROM ' . usuarioTableClass::getNameTable() . '';
      $answer = model::getInstance()->prepare($sql);
      $answer->execute();
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->user;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $userHash
   * @return type $id (userid)
   * @throws PDOException
   */
  public static function VerifyUserHash($userHash) {
    try {
      $sql = 'SELECT ' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ','
              . usuarioTableClass::getNameField(usuarioTableClass::USER_HASH) . ' '
              . ' FROM ' . usuarioTableClass::getNameTable()
              . ' WHERE ' . usuarioTableClass::getNameField(usuarioTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . usuarioTableClass::getNameField(usuarioTableClass::USER_HASH) . ' = :hash ';
      $params = array(
          ':hash' => $userHash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $id
   * @return type
   * @throws PDOException
   */
  public static function getVerifyUserPass($id) {
    try {
      $sql = 'SELECT ' . usuarioTableClass::ID . ','
              . usuarioTableClass::PASSWORD . ' '
              . ' FROM ' . usuarioTableClass::getNameTable()
              . ' WHERE ' . usuarioTableClass::getNameField(usuarioTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . usuarioTableClass::ID . ' = :id ';
      $params = array(
          ':id' => $id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->password;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $user
   * @return type
   * @throws PDOException
   */
  public static function getVerifyExistingUser($user) {
    try {
      $sql = 'SELECT ' . usuarioTableClass::ID . ','
              . usuarioTableClass::USER . ' '
              . ' FROM ' . usuarioTableClass::getNameTable()
              . ' WHERE ' . usuarioTableClass::getNameField(usuarioTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . usuarioTableClass::USER . ' = :user ';
      $params = array(
          ':user' => $user,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $usuario
   * @return type
   * @throws PDOException
   */
  public static function getIdNewUser($usuario) {
    try {
      $sql = 'SELECT ' . usuarioTableClass::ID
              . ' FROM ' . usuarioTableClass::getNameTable()
              . ' WHERE ' . usuarioTableClass::getNameField(usuarioTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . usuarioTableClass::USER . ' = :user ';
      $params = array(
          ':user' => $usuario,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->id;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
  /**
   * 
   * @param type $user_hash
   * @return type
   * @throws PDOException\
   */
   public static function getIdNewUserByHash($user_hash) {
    try {
      $sql = 'SELECT ' . usuarioTableClass::ID
              . ' FROM ' . usuarioTableClass::getNameTable()
              . ' WHERE ' . usuarioTableClass::getNameField(usuarioTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . usuarioTableClass::USER_HASH . ' = :hash ';
      $params = array(
          ':hash' => $user_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->id;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
  /**
   * 
   * @param type $user_hash
   * @return type
   * @throws PDOException
   */
  public static function getUserEmailAddressByHash($user_hash) {
    try {
      $sql = 'SELECT ' . usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS) . ' AS usuario_email_address '
              . ' FROM ' . usuarioTableClass::getNameTable()
              . ' WHERE ' . usuarioTableClass::getNameField(usuarioTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . usuarioTableClass::getNameField(usuarioTableClass::USER_HASH) . ' = :hash ';
      $params = array(
          ':hash' => $user_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->usuario_email_address : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $userID
   */
  public static function emailActivationNotification($userID) {

    $mail = new PHPMailer;

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host = "smtp.gmail.com"; // SMTP server
    $mail->SMTPDebug = 1;                     // enables SMTP debug information (for testing) // 1 = errors and messages // 2 = messages only
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;                  // enable SMTP authentication
    $mail->Port = 587; // set the SMTP port for the GMAIL server
    $mail->SMTPAuth = true;
    $mail->Username = "andres@bohemiarealtygroup.com";  // SMTP account username
    $mail->Password = "jaguares2006";        // SMTP account password

    $mail->CharSet = 'UTF-8';

    $mail->From = 'no-reply@bohemiarealtygroup.com';
    $mail->FromName = 'Bohemia Realty Group - Welcome Abroad';

    /**
     * user data
     */
    $fields = array(
        usuarioTableClass::ID,
        usuarioTableClass::USER,
        usuarioTableClass::USER_HASH,
        usuarioTableClass::EMAIL_ADDRESS,
        usuarioTableClass::ACTIVED,
        usuarioTableClass::LAST_LOGIN_AT,
        usuarioTableClass::CREATED_AT,
        usuarioTableClass::UPDATED_AT
    );
    $where = array(
        usuarioTableClass::ID => $userID
    );
    $userData = usuarioTableClass::getAll($fields, true, null, null, null, null, $where);
      
    $user_hash = $userData[0]->user_hash;

    /**
     * Email template objects
     */
    $bohemia_logo_link = routing::getInstance()->getUrlImg("logo/logo.png");
    $welcome_banner_link = routing::getInstance()->getUrlImg("email_template/activate_user/welcome_banner.png");
    $footer_logo_link = routing::getInstance()->getUrlImg("email_template/activate_user/footer-logo.png");
    $activate_account_link = routing::getInstance()->getUrlWeb("usuario", "activation", array("hash" => $user_hash));
    /**
     * Header email Template
     */
    $mail->addAddress($userData[0]->email_address); //send to...
//    $mail->addAddress("andres@bohemiarealtygroup.com"); //send to...

    $mail->isHTML(true); //Set email format to HTML

    $mail->Subject = 'Bohemia Realty Group Notification: Activate your Account.'; //Email Subject
   
    $html = <<<STARTEMAIL
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta charset="utf-8"> <!-- utf-8 works for most cases -->
	<meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
	<meta name="x-apple-disable-message-reformatting">	<!-- Disable auto-scale in iOS 10 Mail entirely -->
	<title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

	<!-- Web Font / @font-face : BEGIN -->
	<!-- NOTE: If web fonts are not required, lines 10 - 27 can be safely removed. -->

	<!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
	<!--[if mso]>
		<style>
			* {
				font-family: sans-serif !important;
			}
		</style>
	<![endif]-->

	<!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
	<!--[if !mso]><!-->
		<!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
	<!--<![endif]-->

	<!-- Web Font / @font-face : END -->

	<!-- CSS Reset -->
	<style>

		/* What it does: Remove spaces around the email design added by some email clients. */
		/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
		html,
		body {
			margin: 0 auto !important;
			padding: 0 !important;
			height: 100% !important;
			width: 100% !important;
		}

		/* What it does: Stops email clients resizing small text. */
		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}

		/* What it does: Centers email on Android 4.4 */
		div[style*="margin: 16px 0"] {
			margin:0 !important;
		}

		/* What it does: Stops Outlook from adding extra spacing to tables. */
		table,
		td {
			mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
		}

		/* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
		table {
			border-spacing: 0 !important;
			border-collapse: collapse !important;
			table-layout: fixed !important;
			margin: 0 auto !important;
		}
		table table table {
			table-layout: auto;
		}

		/* What it does: Uses a better rendering method when resizing images in IE. */
		img {
			-ms-interpolation-mode:bicubic;
		}

		/* What it does: A work-around for email clients meddling in triggered links. */
		*[x-apple-data-detectors],	/* iOS */
		.x-gmail-data-detectors, 	/* Gmail */
		.x-gmail-data-detectors *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}

		/* What it does: Prevents Gmail from displaying an download button on large, non-linked images. */
		.a6S {
			 display: none !important;
			 opacity: 0.01 !important;
		}
		/* If the above doesn't work, add a .g-img class to any image in question. */
		img.g-img + div {
			 display:none !important;
			}

		/* What it does: Prevents underlining the button text in Windows 10 */
		.button-link {
			text-decoration: none !important;
		}

		/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
		/* Create one of these media queries for each additional viewport size you'd like to fix */
		/* Thanks to Eric Lepetit (@ericlepetitsf) for help troubleshooting */
		@media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */
			.email-container {
				min-width: 375px !important;
			}
		}

	</style>

	<!-- Progressive Enhancements -->
	<style>

		/* What it does: Hover styles for buttons */
		.button-td,
		.button-a {
			transition: all 100ms ease-in;
		}
		.button-td:hover,
		.button-a:hover {
			background: #346d21 !important;
			border-color: #346d21 !important;
		}

		/* Media Queries */
		@media screen and (max-width: 600px) {

			.email-container {
				width: 100% !important;
				margin: auto !important;
			}

			/* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
			.fluid {
				max-width: 100% !important;
				height: auto !important;
				margin-left: auto !important;
				margin-right: auto !important;
			}

			/* What it does: Forces table cells into full-width rows. */
			.stack-column,
			.stack-column-center {
				display: block !important;
				width: 100% !important;
				max-width: 100% !important;
				direction: ltr !important;
			}
			/* And center justify these ones. */
			.stack-column-center {
				text-align: center !important;
			}

			/* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
			.center-on-narrow {
				text-align: center !important;
				display: block !important;
				margin-left: auto !important;
				margin-right: auto !important;
				float: none !important;
			}
			table.center-on-narrow {
				display: inline-block !important;
			}

			/* What it does: Adjust typography on small screens to improve readability */
			.email-container p {
				font-size: 17px !important;
				line-height: 22px !important;
			}

		}

	</style>

	<!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
	<!--[if gte mso 9]>
	<xml>
		<o:OfficeDocumentSettings>
			<o:AllowPNG/>
			<o:PixelsPerInch>96</o:PixelsPerInch>
		</o:OfficeDocumentSettings>
	</xml>
	<![endif]-->

</head>
<body width="100%" bgcolor="#FFF" style="margin: 0; mso-line-height-rule: exactly;">
	<center style="width: 100%; background: #FFF; text-align: left;">

		<!-- Visually Hidden Preheader Text : BEGIN -->
		<div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
			(Optional) This text will appear in the inbox preview, but not the email body.
		</div>
		<!-- Visually Hidden Preheader Text : END -->

		<!-- Email Header : BEGIN -->
		<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto; border-bottom: solid 5px rgb(104, 152, 67); border-color: #568c44;" class="email-container">
			<tr>
				<td style="padding: 20px 0; text-align: center">
					<img src="$bohemia_logo_link" width="200" height="50" alt="bohemia realty group logo" border="0" style="height: auto; background: #fffff; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
				</td>
			</tr>
		</table>
		<!-- Email Header : END -->

		<!-- Email Body : BEGIN -->
		<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">

			<!-- Hero Image, Flush : BEGIN -->
			<tr>
				<td bgcolor="#ffffff">
					<img src="$welcome_banner_link" width="600" height="" alt="bohemia_realty_group_banner_image" border="0" align="center" style="width: 100%; max-width: 600px; height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
				</td>
			</tr>
			<!-- Hero Image, Flush : END -->

			<!-- 1 Column Text + Button : BEGIN -->
			<tr>
				<td bgcolor="#568c44" style="padding: 40px 40px 20px; text-align: center;">
					<h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #FFF; font-weight: normal;">WELCOME ABROAD TO THE BOHEMIA REALTY GROUP</h1>
				</td>
			</tr>
			<tr>
				<td bgcolor="#ffffff" style="padding: 20px 10px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: justify; font-weight: normal;">
                    <h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #346d21; font-weight: normal; text-align: center;">Your Almost there!</h1><br>
                    <p style="margin: auto;">Hello there,</p><br>
                    <p style="margin: 0;">Thanks for signing up for Bohemia Realty Group Dashboard. We're very excited to have you on board.</p><br>   
                    <p style="margin: 0;">To get started using <b>Bohemia Realty Group Dashboard</b>, please confirm to activate your account below:</p>
                </td>
			</tr>
			<tr>
				<td bgcolor="#ffffff" style="padding: 0 20px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #568c44;">
					<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto">
						<tr>
							<td style="border-radius: 3px; background: #568c44; text-align: center;" class="button-td">
                                <a href="$activate_account_link" style="background: #568c44; border: 15px solid #568c44; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a" target="_blank">
									&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#ffffff;">Activate your Account</span>&nbsp;&nbsp;&nbsp;&nbsp;
								</a>
							</td>
                            
						</tr>
					</table>
					<!-- Button : END -->
				</td>
			</tr>
			<!-- 1 Column Text + Button : END -->
            <tr>
				<td bgcolor="#ffffff" style="padding: 20px 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: justify; font-weight: normal;">
                     <p style="margin: 0;">If the Button above doesn't work, please use the following link to Activate your account:</p><br>
                    <p style="margin: 0;"><a href="$activate_account_link"  target="_blank">
						$activate_account_link
					</a></p><br><br>

                    <p style="margin: 0;">Thanks,</p><br>
                        <p style="margin: 0;"><b>The Bohemia Realty Group Team</b></p>
                </td>
			</tr>
			<!-- Clear Spacer : BEGIN -->
			<tr>
				<td aria-hidden="true" height="40" style="font-size: 0; line-height: 0;">
					&nbsp;
				</td>
			</tr>
			<!-- Clear Spacer : END -->

			<!-- 1 Column Text : BEGIN -->
			<tr>
				<td bgcolor="#ffffff">
					<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
						<tr>
							<td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: center; border: solid 2px #006e6d; border-color: #006e6d;">
                                <b>Bohemia Realty Group is a proud member of the Real Estate Board of New York (REBNY) and an Equal Housing Opportunity provider. <b>
							</td>
						</tr>
					</table><br><br>
				</td>
			</tr>
			<!-- 1 Column Text : END -->

		</table>
		<!-- Email Body : END -->

		<!-- Full Bleed Background Section : BEGIN -->
		<table role="presentation" bgcolor="#505050" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
			<tr>
				<td valign="top" align="center">
					<div style="max-width: 600px; margin: auto;" class="email-container">
						<!--[if mso]>
						<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" align="center">
						<tr>
						<td>
						<![endif]-->
						<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
							<tr>
								<td style="padding: 40px; text-align: center; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #ffffff;">
                                    <a href="https://bohemiarealtygroup.com/">
                                     <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto; " class="email-container">
                                        <tr>
                                            <td style="padding: 10px 0; text-align: center">
                                                <img src="$footer_logo_link" width="200" height="50" alt="alt_text" border="0" style="height: auto; background: #505050; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                            </td>
                                        </tr>
                                    </table>
                                    </a>
                                    <br>Bohemia Harlem - 2101 Frederick Douglass Blvd., New York, NY 10026 <br> Phone: 212.663.6215
                                    <br>Bohemia Washington Heights - 3880 Broadway, New York, NY 10032 <br> Phone: 646.661.1579
                                     <br><br>
                                    <br>Email: info@bohemiarealtygroup.com
                                    <br>Fax: 866.598.1059.
                                    <br><br>Copyright © 2017 Bohemia Realty Group LLC. All Rights Reserved.
                                    <br><br>
								</td>
							</tr>
						</table>
						<!--[if mso]>
						</td>
						</tr>
						</table>
						<![endif]-->
					</div>
				</td>
			</tr>
		</table>
		<!-- Full Bleed Background Section : END -->

	</center>
</body>
</html>

     
STARTEMAIL;
    $mail->Body = $html;
    $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

    if (!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
      exit;
    }
  }
  
  
  
  /**
   * 
   * @param type $userID
   */
  public static function emailCredentialsNotification($userID) {

    $mail = new PHPMailer;

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host = "smtp.gmail.com"; // SMTP server
    $mail->SMTPDebug = 1;                     // enables SMTP debug information (for testing) // 1 = errors and messages // 2 = messages only
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;                  // enable SMTP authentication
    $mail->Port = 587; // set the SMTP port for the GMAIL server
    $mail->SMTPAuth = true;
    $mail->Username = "andres@bohemiarealtygroup.com";  // SMTP account username
    $mail->Password = "jaguares2006";        // SMTP account password

    $mail->CharSet = 'UTF-8';

    $mail->From = 'no-reply@bohemiarealtygroup.com';
    $mail->FromName = 'Bohemia Realty Group - Set BRG Credentials';

    /**
     * user data
     */
    $fields = array(
        usuarioTableClass::ID,
        usuarioTableClass::USER,
        usuarioTableClass::USER_HASH,
        usuarioTableClass::EMAIL_ADDRESS,
        usuarioTableClass::ACTIVED,
        usuarioTableClass::LAST_LOGIN_AT,
        usuarioTableClass::CREATED_AT,
        usuarioTableClass::UPDATED_AT
    );
    $where = array(
        usuarioTableClass::ID => $userID
    );
    $userData = usuarioTableClass::getAll($fields, true, null, null, null, null, $where);
      
    $user_hash = $userData[0]->user_hash;
    
    /**
     * Email template objects
     */
    $bohemia_logo_link = routing::getInstance()->getUrlImg("logo/logo.png");
    $welcome_banner_link = routing::getInstance()->getUrlImg("email_template/set_credentials/welcome_banner.png");
    $footer_logo_link = routing::getInstance()->getUrlImg("email_template/set_credentials/footer-logo.png");
    $set_credentials_account_link = routing::getInstance()->getUrlWeb("shfSecurity", "setAccount", array(usuarioTableClass::getNameField(usuarioTableClass::USER_HASH, true) => $user_hash));
    /**
     * Header email Template
     */
    $mail->addAddress($userData[0]->email_address); //send to...
    $mail->addAddress("andres@bohemiarealtygroup.com"); //send to...

    $mail->isHTML(true); //Set email format to HTML

    $mail->Subject = 'Bohemia Realty Group Notification: Set Account Credentials.'; //Email Subject
   
    $html = <<<STARTEMAIL
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta charset="utf-8"> <!-- utf-8 works for most cases -->
	<meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
	<meta name="x-apple-disable-message-reformatting">	<!-- Disable auto-scale in iOS 10 Mail entirely -->
	<title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

	<!-- Web Font / @font-face : BEGIN -->
	<!-- NOTE: If web fonts are not required, lines 10 - 27 can be safely removed. -->

	<!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
	<!--[if mso]>
		<style>
			* {
				font-family: sans-serif !important;
			}
		</style>
	<![endif]-->

	<!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
	<!--[if !mso]><!-->
		<!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
	<!--<![endif]-->

	<!-- Web Font / @font-face : END -->

	<!-- CSS Reset -->
	<style>

		/* What it does: Remove spaces around the email design added by some email clients. */
		/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
		html,
		body {
			margin: 0 auto !important;
			padding: 0 !important;
			height: 100% !important;
			width: 100% !important;
		}

		/* What it does: Stops email clients resizing small text. */
		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}

		/* What it does: Centers email on Android 4.4 */
		div[style*="margin: 16px 0"] {
			margin:0 !important;
		}

		/* What it does: Stops Outlook from adding extra spacing to tables. */
		table,
		td {
			mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
		}

		/* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
		table {
			border-spacing: 0 !important;
			border-collapse: collapse !important;
			table-layout: fixed !important;
			margin: 0 auto !important;
		}
		table table table {
			table-layout: auto;
		}

		/* What it does: Uses a better rendering method when resizing images in IE. */
		img {
			-ms-interpolation-mode:bicubic;
		}

		/* What it does: A work-around for email clients meddling in triggered links. */
		*[x-apple-data-detectors],	/* iOS */
		.x-gmail-data-detectors, 	/* Gmail */
		.x-gmail-data-detectors *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}

		/* What it does: Prevents Gmail from displaying an download button on large, non-linked images. */
		.a6S {
			 display: none !important;
			 opacity: 0.01 !important;
		}
		/* If the above doesn't work, add a .g-img class to any image in question. */
		img.g-img + div {
			 display:none !important;
			}

		/* What it does: Prevents underlining the button text in Windows 10 */
		.button-link {
			text-decoration: none !important;
		}

		/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
		/* Create one of these media queries for each additional viewport size you'd like to fix */
		/* Thanks to Eric Lepetit (@ericlepetitsf) for help troubleshooting */
		@media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */
			.email-container {
				min-width: 375px !important;
			}
		}

	</style>

	<!-- Progressive Enhancements -->
	<style>

		/* What it does: Hover styles for buttons */
		.button-td,
		.button-a {
			transition: all 100ms ease-in;
		}
		.button-td:hover,
		.button-a:hover {
			background: #346d21 !important;
			border-color: #346d21 !important;
		}

		/* Media Queries */
		@media screen and (max-width: 600px) {

			.email-container {
				width: 100% !important;
				margin: auto !important;
			}

			/* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
			.fluid {
				max-width: 100% !important;
				height: auto !important;
				margin-left: auto !important;
				margin-right: auto !important;
			}

			/* What it does: Forces table cells into full-width rows. */
			.stack-column,
			.stack-column-center {
				display: block !important;
				width: 100% !important;
				max-width: 100% !important;
				direction: ltr !important;
			}
			/* And center justify these ones. */
			.stack-column-center {
				text-align: center !important;
			}

			/* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
			.center-on-narrow {
				text-align: center !important;
				display: block !important;
				margin-left: auto !important;
				margin-right: auto !important;
				float: none !important;
			}
			table.center-on-narrow {
				display: inline-block !important;
			}

			/* What it does: Adjust typography on small screens to improve readability */
			.email-container p {
				font-size: 17px !important;
				line-height: 22px !important;
			}

		}

	</style>

	<!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
	<!--[if gte mso 9]>
	<xml>
		<o:OfficeDocumentSettings>
			<o:AllowPNG/>
			<o:PixelsPerInch>96</o:PixelsPerInch>
		</o:OfficeDocumentSettings>
	</xml>
	<![endif]-->

</head>
<body width="100%" bgcolor="#FFF" style="margin: 0; mso-line-height-rule: exactly;">
	<center style="width: 100%; background: #FFF; text-align: left;">

		<!-- Visually Hidden Preheader Text : BEGIN -->
		<div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
			(Optional) This text will appear in the inbox preview, but not the email body.
		</div>
		<!-- Visually Hidden Preheader Text : END -->

		<!-- Email Header : BEGIN -->
		<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto; border-bottom: solid 5px rgb(104, 152, 67); border-color: #568c44;" class="email-container">
			<tr>
				<td style="padding: 20px 0; text-align: center">
					<img src="$bohemia_logo_link" width="200" height="50" alt="bohemia realty group logo" border="0" style="height: auto; background: #fffff; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
				</td>
			</tr>
		</table>
		<!-- Email Header : END -->

		<!-- Email Body : BEGIN -->
		<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">

			<!-- Hero Image, Flush : BEGIN -->
			<tr>
				<td bgcolor="#ffffff">
					<img src="$welcome_banner_link" width="600" height="" alt="bohemia_realty_group_banner_image" border="0" align="center" style="width: 100%; max-width: 600px; height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
				</td>
			</tr>
			<!-- Hero Image, Flush : END -->

			<!-- 1 Column Text + Button : BEGIN -->
			<tr>
				<td bgcolor="#568c44" style="padding: 40px 40px 20px; text-align: center;">
					<h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #FFF; font-weight: normal;">WELCOME ABROAD TO THE BOHEMIA REALTY GROUP</h1>
				</td>
			</tr>
			<tr>
				<td bgcolor="#ffffff" style="padding: 20px 10px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: justify; font-weight: normal;">
                    <h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #346d21; font-weight: normal; text-align: center;">Your Almost there!</h1><br>
                    <p style="margin: auto;">Hello there,</p><br>
                    <p style="margin: 0;">Thanks for signing up for Bohemia Realty Group Dashboard. We're very excited to have you on board.</p><br>   
                    <p style="margin: 0;">To get started using <b>Bohemia Realty Group Dashboard</b>.</p>
                    <p style="margin: 0;">Please access to the link below set up your account:</p>
                </td>
			</tr>
			<tr>
				<td bgcolor="#ffffff" style="padding: 0 20px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #568c44;">
					<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto">
						<tr>
							<td style="border-radius: 3px; background: #568c44; text-align: center;" class="button-td">
                                <a href="$set_credentials_account_link" style="background: #568c44; border: 15px solid #568c44; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a" target="_blank">
									&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#ffffff;">Set Up Account</span>&nbsp;&nbsp;&nbsp;&nbsp;
								</a>
							</td>
                            
						</tr>
					</table>
					<!-- Button : END -->
				</td>
			</tr>
			<!-- 1 Column Text + Button : END -->
            <tr>
				<td bgcolor="#ffffff" style="padding: 20px 10px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: justify; font-weight: normal;">
                     <p style="margin: 0;">If the Button above doesn't work, please use the following link to Set your account Credentials:</p><br>
                    <p style="margin: 0;"><a href="$set_credentials_account_link"  target="_blank">
						$set_credentials_account_link
					</a></p><br><br>

                    <p style="margin: 0;">Thanks,</p><br>
                        <p style="margin: 0;"><b>The Bohemia Realty Group Team</b></p>
                </td>
			</tr>
			<!-- Clear Spacer : BEGIN -->
			<tr>
				<td aria-hidden="true" height="40" style="font-size: 0; line-height: 0;">
					&nbsp;
				</td>
			</tr>
			<!-- Clear Spacer : END -->

			<!-- 1 Column Text : BEGIN -->
			<tr>
				<td bgcolor="#ffffff">
					<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
						<tr>
							<td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: center; border: solid 2px #006e6d; border-color: #006e6d;">
                                <b>Bohemia Realty Group is a proud member of the Real Estate Board of New York (REBNY) and an Equal Housing Opportunity provider. <b>
							</td>
						</tr>
					</table><br><br>
				</td>
			</tr>
			<!-- 1 Column Text : END -->

		</table>
		<!-- Email Body : END -->

		<!-- Full Bleed Background Section : BEGIN -->
		<table role="presentation" bgcolor="#505050" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
			<tr>
				<td valign="top" align="center">
					<div style="max-width: 600px; margin: auto;" class="email-container">
						<!--[if mso]>
						<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" align="center">
						<tr>
						<td>
						<![endif]-->
						<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
							<tr>
								<td style="padding: 40px; text-align: center; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #ffffff;">
                                    <a href="https://bohemiarealtygroup.com/">
                                     <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto; " class="email-container">
                                        <tr>
                                            <td style="padding: 10px 0; text-align: center">
                                                <img src="$footer_logo_link" width="200" height="50" alt="alt_text" border="0" style="height: auto; background: #505050; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                            </td>
                                        </tr>
                                    </table>
                                    </a>
                                    <br>Bohemia Harlem - 2101 Frederick Douglass Blvd., New York, NY 10026 <br> Phone: 212.663.6215
                                    <br>Bohemia Washington Heights - 3880 Broadway, New York, NY 10032 <br> Phone: 646.661.1579
                                     <br><br>
                                    <br>Email: info@bohemiarealtygroup.com
                                    <br>Fax: 866.598.1059.
                                    <br><br>Copyright © 2017 Bohemia Realty Group LLC. All Rights Reserved.
                                    <br><br>
								</td>
							</tr>
						</table>
						<!--[if mso]>
						</td>
						</tr>
						</table>
						<![endif]-->
					</div>
				</td>
			</tr>
		</table>
		<!-- Full Bleed Background Section : END -->

	</center>
</body>
</html>

     
STARTEMAIL;
    $mail->Body = $html;
    $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

    if (!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
      exit;
    }
  }

}
