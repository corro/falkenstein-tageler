<?php
/**
 * Tageler Controller für das Tageler Component
 * 
 * @package    Falkenstein.Joomla
 * @subpackage Components
 * @link       http://www.pfadi-falkenstein.ch
 * @license		GNU/GPL
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Import der Basisklasse
jimport('joomla.application.component.controller');

/**
 * Tageler Controller
 *
 * @package    Falkenstein.Joomla
 * @subpackage Components
 */
class TagelerController extends JControllerLegacy
{
    /**
     * Custom Constructor
     */
    function __construct( $default = array())
    {
        parent::__construct( $default );
    }
}
