<?php
/**
 * Einstiegspunkt für das Tageler Component
 * 
 * @package    Falkenstein.Joomla
 * @subpackage Components
 * @link       http://www.pfadi-falkenstein.ch
 * @license    GNU/GPL
 */

// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

// Basiscontroller importieren
require_once (JPATH_COMPONENT.DS.'controller.php');

// Import eines spezifischen Controllers wenn nötig
if($controller = JRequest::getVar('controller'))
{
	require_once (JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php');
}

$auth =& JFactory::getACL();
$auth->addACL('com_tageler', 'edit', 'users', 'super administrator');
$auth->addACL('com_tageler', 'edit', 'users', 'administrator');
$auth->addACL('com_tageler', 'edit', 'users', 'author');

// Controller instanzieren
$classname	= 'TagelerController'.$controller;
$controller = new $classname();

// Request bearbeiten
$controller->execute( JRequest::getVar('task'));

// Redirect wenn nötig
$controller->redirect();
