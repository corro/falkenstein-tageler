<?php
/**
 * Tageler Model für das Tageler Component
 * 
 * @author     R. Baumgartner
 * @package    Falkenstein.Joomla
 * @subpackage Components
 * @link       http://www.pfadi-falkenstein.ch
 * @license    GNU/GPL
 */

// Sicherheitscheck
defined('_JEXEC') or die();

// Import der Basisklasse
jimport( 'joomla.application.component.model' );

/**
 * Tageler Model
 *
 * @package    Falkenstein.Joomla
 * @subpackage Components
 */
class TagelerModelTagelerubersicht extends JModel
{
    function getTageler()
    {
        $db =& JFactory::getDBO();

        $query = 'SELECT * FROM #__tageler';
        $db->setQuery( $query );
        $allTageler = $db->loadObjectList();

        return $allTageler;
    }
}