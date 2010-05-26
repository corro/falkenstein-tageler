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
defined('_JEXEC') or die('Restricted access');

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
    /**
     * Liefert die Tageler aller Einheiten
     * @return Tageler aller Einheiten
     */
    function getTageler()
    {
        $db =& JFactory::getDBO();

        $query = 'SELECT * FROM '.$db->nameQuote('#__tageler');
        $db->setQuery( $query );
        $allTageler = $db->loadObjectList();

        if (is_null($allTageler))
        {
            $app->enqueueMessage(nl2br($db->getErrorMsg()),'error');
        }

        return $allTageler;
    }
}