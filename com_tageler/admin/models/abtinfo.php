<?php
/**
 * Abteilungsinfos Model für das Tageler Component
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
 * Abteilungsinfos Model
 *
 * @package    Falkenstein.Joomla
 * @subpackage Components
 */
class AbtInfoModelAbtInfo extends JModel
{
    function __construct()
    {
        parent::__construct();
//         global $mainframe, $option;
// 
//         $filter_order     = $mainframe->getUserStateFromRequest(  $option.'filter_order', 'filter_order', 'idx', 'cmd' );
//         $filter_order_Dir = $mainframe->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', 'asc', 'word' );
// 
//         $this->setState('filter_order', $filter_order);
//         $this->setState('filter_order_Dir', $filter_order_Dir);
    }

    /**
     * Liefert die Abteilungsinfos (einheit=all)
     * @return Abteilungsinfos
     */
    function getAbteilungsinfos()
    {
        $db =& JFactory::getDBO();

//         $state =& $this->get( 'state' );
//         $filter_order     = $this->getState('filter_order');
//         $filter_order_Dir = $this->getState('filter_order_Dir');


        $query = 'SELECT * FROM #__tagelerfelder '.
                 'WHERE einheit = '.$db->quote('all'); //.
                 //'ORDER BY '.$filter_order.' '.$filter_order_Dir;
        $db->setQuery( $query );
        $abtInfos = $db->loadObjectList();

        if (is_null($abtInfos))
        {
            $app->enqueueMessage(nl2br($db->getErrorMsg()),'error');
        }

        return $abtInfos;
    }
}