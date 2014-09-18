<?php
error_reporting(E_ALL & ~E_NOTICE);

#########################################################################
# CONFIGURATION
# Note: Please do not edit this file. Edit the config from the admin section.
#########################################################################

define('BASE_HTTP_PATH', ''); 
define('SERVER_PATH_TO_ADMIN', '');
define('UPLOAD_PATH', '');
define('UPLOAD_HTTP_PATH', '');
define('MYSQL_HOST', ''); # mysql database host
define('MYSQL_USER', ''); #mysql user name
define('MYSQL_PASS', ''); # mysql password
define('MYSQL_DB', ''); # mysql database name

define('MDS_RESIZE', 'YES');

# SITE_CONTACT_EMAIL

define('SITE_CONTACT_EMAIL', stripslashes('test@example.com'));

# SITE_LOGO_URL

define('SITE_LOGO_URL', stripslashes('http://milliondollarscript.com/logo.gif'));

# SITE_NAME
# change to your website name
define('SITE_NAME', stripslashes('Million Dollar Script 2.0.15')); 

# ADMIN_PASSWORD

define('ADMIN_PASSWORD',  'ok');

# date formats
define('DATE_FORMAT', 'Y-M-d');
define('GMT_DIF', '6');
define('DATE_INPUT_SEQ', 'YMD');

# Output the image in JPEG? Y or N. 

define ('OUTPUT_JPEG', 'GIF'); # Y or N
define ('JPEG_QUALITY', '75'); # a number from 0 to 100
define('INTERLACE_SWITCH','YES');
# Note: Please do not edit this file. Edit from the admin section.

# USE_LOCK_TABLES
# The script can lock/unlock tables when a user is selecting pixels
define ('USE_LOCK_TABLES', 'Y');

define('BANNER_DIR', 'pixels/');

# IM_CONVERT_PATH

define('IM_CONVERT_PATH', 'IM_CONVERT_PATH');

# Note: Please do not edit this file. Edit from the admin section.
define('EMAIL_USER_ORDER_CONFIRMED', 'YES');
define('EMAIL_ADMIN_ORDER_CONFIRMED', 'YES');
define('EMAIL_USER_ORDER_COMPLETED', 'YES');
define('EMAIL_ADMIN_ORDER_COMPLETED', 'YES');
define('EMAIL_USER_ORDER_PENDED', 'YES');
define('EMAIL_ADMIN_ORDER_PENDED', 'YES');
define('EMAIL_USER_ORDER_EXPIRED', 'YES');
define('EMAIL_ADMIN_ORDER_EXPIRED', 'YES');

define('EM_NEEDS_ACTIVATION', 'YES');
define('EMAIL_ADMIN_ACTIVATION', 'YES');
define('EMAIL_ADMIN_PUBLISH_NOTIFY', '');
define('USE_PAYPAL_SUBSCR', 'USE_PAYPAL_SUBSCR');
define('EMAIL_USER_EXPIRE_WARNING', '');
define('DAYS_RENEW', '7');
define('DAYS_CONFIRMED', '7');
define('HOURS_UNCONFIRMED', '1');
define('DAYS_CANCEL', '3');
define('ENABLE_MOUSEOVER', 'YES');
define('ENABLE_CLOAKING', 'YES');
define('VALIDATE_LINK', 'NO');
define('DISPLAY_PIXEL_BACKGROUND', 'YES');
define('USE_SMTP', '');
define('EMAIL_HOSTNAME', '');
define('EMAIL_SMTP_SERVER', '');
define('EMAIL_SMTP_USER', '');
define('EMAIL_SMTP_PASS', '');
define('EMAIL_SMTP_AUTH_HOST', '');
define('POP3_PORT', '110');
define('EMAIL_POP_SERVER', '');
define('EMAIL_POP_BEFORE_SMTP', '');

define('EMAILS_PER_BATCH', '12');
define('EMAILS_MAX_RETRY', '15');
define('EMAILS_ERROR_WAIT', '20');
define('EMAILS_DAYS_KEEP', '30');
define('USE_AJAX', 'SIMPLE');
define('ANIMATION_SPEED', '50');
define('MAX_BLOCKS', '');
define('MEMORY_LIMIT', '12M');

define('REDIRECT_SWITCH', 'NO');
define('REDIRECT_URL', 'http://www.example.com');
define('ADVANCED_CLICK_COUNT', 'YES');

define('TRANSITION_EFFECT', '23');
define('ENABLE_TRANSITIONS', 'YES');
define('TRANSITION_DURATION', '1');
define('HIDE_TIMEOUT', '500');
define('MDS_AGRESSIVE_CACHE', '');

if (defined('MEMORY_LIMIT')) {
	ini_set('memory_limit', MEMORY_LIMIT);
} else {
	ini_set('memory_limit', '12M');
}

$dbhost = MYSQL_HOST;
$dbusername = MYSQL_USER;
$dbpassword = MYSQL_PASS;
$database_name = MYSQL_DB;

$connection = @mysql_connect("$dbhost","$dbusername", "$dbpassword")
	or $DB_ERROR = "Couldn't connect to server.";
	
$db = @mysql_select_db("$database_name", $connection)
	or $DB_ERROR = "Couldn't select database.";

if ($DB_ERROR=='') {

	include dirname(__FILE__).'/lang/lang.php';
	require_once (dirname(__FILE__).'/mail/email_message.php');
	require_once (dirname(__FILE__).'/mail/smtp_message.php');
	require_once (dirname(__FILE__).'/mail/smtp.php');
	require_once dirname(__FILE__).'/include/mail_manager.php';
	require_once dirname(__FILE__).'/include/currency_functions.php';
	require_once dirname(__FILE__).'/include/price_functions.php';
	require_once dirname(__FILE__).'/include/functions.php';
	require_once dirname(__FILE__).'/include/image_functions.php';
	if (!get_magic_quotes_gpc()) unfck_gpc();
	//escape_gpc();
}

function get_banner_dir() {
	if (BANNER_DIR=='BANNER_DIR') {	

		$file_path = SERVER_PATH_TO_ADMIN; // eg e:/apache/htdocs/ojo/admin/

		$p = preg_split ('%[/\\]%', $file_path);

		
		array_pop($p);
		array_pop($p);
	
		$dest = implode('/', $p);
		$dest = $dest.'/banners/';

		if (file_exists($dest)) {
			$BANNER_DIR = 'banners/';
		} else {
			$BANNER_DIR = 'pixels/';
		}
	} else {
		$BANNER_DIR = BANNER_DIR;
	}
	return $BANNER_DIR;
 
}

?>