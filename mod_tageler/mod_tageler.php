<?php
/**
 * Einstiegspunkt für das Tagelermodul
 * 
 * @package    Falkenstein.Joomla
 * @subpackage Modules
 * @link       http://www.pfadi-falkenstein.ch
 * @license    GNU/GPL
 */

//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');
 
// include the helper file
require_once(dirname(__FILE__).DS.'helper.php');
 
// get a parameter from the module's configuration
// $userCount = $params->get('usercount');
 
// get the items to display from the helper
$tageler = ModTagelerHelper::getTageler();
 
// include the template for display
require(JModuleHelper::getLayoutPath('mod_tageler'));
?>
