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

// Import Joomla Controller
jimport('joomla.application.component.controller');

$controller_name = JRequest::getVar('controller', 'tageler');

require_once (JPATH_COMPONENT.'/controllers/'.$controller_name.'.php');

// TODO: Editierfunktionen implementieren

// Controller instanzieren
$controller = JControllerLegacy::getInstance($controller_name);

// Request bearbeiten
$controller->execute(JRequest::getCmd('task'));

// Redirect wenn nötig
$controller->redirect();
