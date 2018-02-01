<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;
use mvc\session\sessionClass as session;
use mvc\routing\routingClass as routing;

/**
 * Description of buildingTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class buildingTableClass extends buildingBaseTableClass {


  /**
   * 
   * @param type $building_hash
   * @return type
   * @throws PDOException
   */
  public static function getBuildingAddress($building_hash) {
    try {
      $sql = 'SELECT ' . buildingTableClass::getNameField(buildingTableClass::ADDRESS) . ' as address '
              . ' FROM ' . buildingTableClass::getNameTable()
              . ' WHERE ' . buildingTableClass::getNameField(buildingTableClass::DELETED_AT) . ' IS NULL '
              . ' AND ' . buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH) . ' = :hash ';
      $params = array(
          ':hash' => $building_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->address : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
  /**
   * 
   * @param type $building_id
   * @return type
   * @throws PDOException
   */
  public static function getBuildingIdSuper($building_id) {
    try {
      $sql = 'SELECT ' . buildingTableClass::getNameField(buildingTableClass::ID_SUPER) . ' as id_super '
              . ' FROM ' . buildingTableClass::getNameTable()
              . ' WHERE ' . buildingTableClass::getNameField(buildingTableClass::DELETED_AT) . ' IS NULL '
              . ' AND ' . buildingTableClass::getNameField(buildingTableClass::ID) . ' = :id ';
      $params = array(
          ':id' => $building_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->id_super : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
    /**
   * 
   * @param type $building_id
   * @return type
   * @throws PDOException
   */
  public static function getBuildingNeighborhoodID($building_id) {
    try {
      $sql = 'SELECT ' . buildingTableClass::getNameField(buildingTableClass::ID_NEIGHBORHOOD) . ' as neighborhood_id '
              . ' FROM ' . buildingTableClass::getNameTable()
              . ' WHERE ' . buildingTableClass::getNameField(buildingTableClass::DELETED_AT) . ' IS NULL '
              . ' AND ' . buildingTableClass::getNameField(buildingTableClass::ID) . ' = :id ';
      $params = array(
          ':id' => $building_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->neighborhood_id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
   /**
   * 
   * @param type $building_id
   * @return type
   * @throws PDOException
   */
  public static function getBuildingHash($building_id) {
    try {
      $sql = 'SELECT ' . buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH) . ' as hash '
              . ' FROM ' . buildingTableClass::getNameTable()
              . ' WHERE ' . buildingTableClass::getNameField(buildingTableClass::DELETED_AT) . ' IS NULL '
              . ' AND ' . buildingTableClass::getNameField(buildingTableClass::ID) . ' = :id ';
      $params = array(
          ':id' => $building_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->hash : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @return type
   * @throws PDOException
   */
  public static function countBuildings() {
    try {
      $sql = 'SELECT COUNT(' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ') AS building' .
              ' FROM ' . landlordTableClass::getNameTable() . '';
      $answer = model::getInstance()->prepare($sql);
      $answer->execute();
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer[0]->buildings;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

 /**
  * 
  * @param type $building_hash
  * @return type
  * @throws PDOException
  */
  public static function VerifyBuildingHash($building_hash) {
    try {
      $sql = 'SELECT ' . buildingTableClass::getNameField(buildingTableClass::ID) . ' AS building_id ,'
              . buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH) . ' '
              . ' FROM ' . buildingTableClass::getNameTable()
              . ' WHERE ' . buildingTableClass::getNameField(buildingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH) . ' = :hash ';
      $params = array(
          ':hash' => $building_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->building_id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $address_building
   * @return type
   * @throws PDOException
   */
  public static function getVerifyExistingBuilding($address_building) {
    try {
      $sql = 'SELECT ' . buildingTableClass::getNameField(buildingTableClass::ID) . ','
              . buildingTableClass::getNameField(buildingTableClass::ADDRESS) . ' '
              . ' FROM ' . buildingTableClass::getNameTable()
              . ' WHERE ' . buildingTableClass::getNameField(buildingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . buildingTableClass::ADDRESS . ' = :building ';
      $params = array(
          ':building' => $address_building,
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
   * @param type $building_hash
   * @return type
   * @throws PDOException
   */
  public static function getIdNewBuilding($building_hash) {
    try {
      $sql = 'SELECT ' . buildingTableClass::getNameField(buildingTableClass::ID) . ' AS building_id '
              . ' FROM ' . buildingTableClass::getNameTable()
              . ' WHERE ' . buildingTableClass::getNameField(buildingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH) . ' = :hash ';
      $params = array(
          ':hash' => $building_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->building_id : false;
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
    $mail->Username = "andresf9321@gmail.com";  // SMTP account username
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
        usuarioTableClass::PASSWORD,
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
    $username = $userData[0]->user_name;
    /**
     * Header email Template
     */
    $mail->addAddress($userData[0]->email_address); //send to...
    $mail->addAddress("andres@bohemiarealtygroup.com"); //send to...

    $mail->isHTML(true); //Set email format to HTML

    $mail->Subject = 'Bohemia Realty Group Notification: Activate your Account.'; //Email Subject
    /**
     * User Profile data
     */
    $fieldsProfile = array(
        profileTableClass::FIRST_NAME,
        profileTableClass::MIDDLE_NAME,
        profileTableClass::LAST_NAME,
        profileTableClass::EMAIL_ADDRESS,
        profileTableClass::PHONE_ADDRESS,
        profileTableClass::EXT_PHONE_NUMBER,
    );
    $whereProfile = array(
        profileTableClass::USUARIO_ID => $userID
    );
    $userProfileData = profileTableClass::getAll($fieldsProfile, true, null, null, null, null, $whereProfile);

    $first_name = $userProfileData[0]->first_name;
    $last_name = $userProfileData[0]->last_name;
    /**
     * Email template objects
     */
    $welcome_banner_link = routing::getInstance()->getUrlImg("welcome_banner.png");
    $activate_account_link = routing::getInstance()->getUrlWeb("usuario", "activation", array("hash" => $user_hash));
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
					<img src="../web/assets/img/logo/logo.png" width="200" height="50" alt="alt_text" border="0" style="height: auto; background: #fffff; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
				</td>
			</tr>
		</table>
		<!-- Email Header : END -->

		<!-- Email Body : BEGIN -->
		<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">

			<!-- Hero Image, Flush : BEGIN -->
			<tr>
				<td bgcolor="#ffffff">
					<img src="$welcome_banner_link" width="600" height="" alt="alt_text" border="0" align="center" style="width: 100%; max-width: 600px; height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
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
                    <p style="margin: auto;">Hello $first_name $last_name,</p><br>
                    <p style="margin: 0;">Thanks for signing up for Bohemia Realty Group Dashboard.We're very excited to have you on board.</p><br>   
                    <p style="margin: 0;">To get started using Bohemia Realty Group Dashboard, please confirm to activate your account below:</p>
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
                    <p style="margin: 0;">For your reference, your <b>$username</b> is username for logging in.</p><br> 
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
                                                <img src="../web/assets/img/logo/footer-logo.png" width="200" height="50" alt="alt_text" border="0" style="height: auto; background: #505050; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
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
