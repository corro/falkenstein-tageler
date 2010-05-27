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
    function __construct()
    {
        parent::__construct();
        global $mainframe, $option;

        $filter_order     = $mainframe->getUserStateFromRequest(  $option.'filter_order', 'filter_order', 'einheit', 'cmd' );
        $filter_order_Dir = $mainframe->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', 'asc', 'word' );

        $this->setState('filter_order', $filter_order);
        $this->setState('filter_order_Dir', $filter_order_Dir);
    }

    /**
     * Liefert die Tageler aller Einheiten
     * @return Tageler aller Einheiten
     */
    function getTageler()
    {
        $db =& JFactory::getDBO();

        $filter_order     = $this->getState('filter_order');
        $filter_order_Dir = $this->getState('filter_order_Dir');


        $query = 'SELECT * FROM '.$db->nameQuote('#__tageler').' ORDER BY '.$filter_order.' '.$filter_order_Dir;
        $db->setQuery( $query );
        $allTageler = $db->loadObjectList();

        if (is_null($allTageler))
        {
            $app->enqueueMessage(nl2br($db->getErrorMsg()),'error');
        }

        return $allTageler;
    }
}