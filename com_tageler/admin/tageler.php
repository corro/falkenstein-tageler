<?php
/**
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_4
 * @license    GNU/GPL
*/

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Require the base controller
$controller = JRequest::getVar('controller','tageler');

require_once(JPATH_COMPONENT.'/controllers/'.$controller.'.php');

// Create the controller
$classname  = $controller.'controller';

$controller = new $classname( array('default_task' => 'display') );

// Perform the Request task
$controller->execute( JRequest::getVar( 'task' ) );

// Redirect if set by the controller
$controller->redirect();
