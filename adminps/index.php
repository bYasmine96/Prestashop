<?php
/*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

// BEGIN - EasyPHP DevServer module - update path in the db
$db_host = $_SERVER['SERVER_NAME'];
$db_username = 'easyphp';
$db_password = 'easyphp';
$domain = ($_SERVER['SERVER_PORT'] == 80) ? $_SERVER['SERVER_NAME'] : $_SERVER['SERVER_NAME']. ":" . $_SERVER['SERVER_PORT'];
$mysqli = new mysqli($db_host, $db_username, $db_password);
$path = explode('/', dirname($_SERVER['PHP_SELF']));
$mysqli->query("UPDATE `" . $path[2] . "`.`ps_configuration` SET `value` = '" . $domain . "' WHERE `ps_configuration`.`name` = 'PS_SHOP_DOMAIN'");
$mysqli->query("UPDATE `" . $path[2] . "`.`ps_configuration` SET `value` = '" . $domain . "' WHERE `ps_configuration`.`name` = 'PS_SHOP_DOMAIN_SSL'");
//$mysqli->query("UPDATE `" . $path[2] . "`.`ps_shop_url` SET `physical_uri` = '/modules/" . $path[2] . "/' WHERE `ps_shop_url`.`id_shop_url` = 1");
$mysqli->query("UPDATE `" . $path[2] . "`.`ps_shop_url` SET `domain` = '" . $domain . "' WHERE `ps_shop_url`.`id_shop_url` = 1");
$mysqli->query("UPDATE `" . $path[2] . "`.`ps_shop_url` SET `domain_ssl` = '" . $domain . "' WHERE `ps_shop_url`.`id_shop_url` = 1");
$mysqli->close();
// END - EasyPHP DevServer module

$timer_start = microtime(true);
if (!defined('_PS_ADMIN_DIR_'))
	define('_PS_ADMIN_DIR_', getcwd());

if (!defined('PS_ADMIN_DIR'))
	define('PS_ADMIN_DIR', _PS_ADMIN_DIR_);

require(_PS_ADMIN_DIR_.'/../config/config.inc.php');
require(_PS_ADMIN_DIR_.'/functions.php');

//small test to clear cache after upgrade
if (Configuration::get('PS_UPGRADE_CLEAR_CACHE'))
{
	header('Cache-Control: max-age=0, must-revalidate');
	header('Expires: Mon, 06 Jun 1985 06:06:00 GMT+1');
	Configuration::updateValue('PS_UPGRADE_CLEAR_CACHE', 0);
}

// For retrocompatibility with "tab" parameter
if (!isset($_GET['controller']) && isset($_GET['tab']))
	$_GET['controller'] = strtolower($_GET['tab']);
if (!isset($_POST['controller']) && isset($_POST['tab']))
	$_POST['controller'] = strtolower($_POST['tab']);
if (!isset($_REQUEST['controller']) && isset($_REQUEST['tab']))
	$_REQUEST['controller'] = strtolower($_REQUEST['tab']);

// Prepare and trigger admin dispatcher
Dispatcher::getInstance()->dispatch();
