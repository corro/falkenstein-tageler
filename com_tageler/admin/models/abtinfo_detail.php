<?php
/**
 * Abteilungsinfo Model für das Tageler Component
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
 * Abteilungsinfo Model
 *
 * @package    Falkenstein.Joomla
 * @subpackage Components
 */
class AbtInfo_DetailModelAbtInfo_Detail extends JModel
{
    /**
     * Liefert die Abteilungsinfos (einheit=all)
     * @return Abteilungsinfos
     */
    function getAbteilungsinfo($id)
    {
        $db =& JFactory::getDBO();

        $query = 'SELECT * FROM #__tagelerfelder'.
                 ' WHERE id = '.$db->quote($id);
        $db->setQuery( $query );
        $abtInfo = $db->loadObject();

        if (is_null($abtInfo))
        {
            $app->enqueueMessage(nl2br($db->getErrorMsg()),'error');
        }

        return $abtInfo;
    }

    function store($data)
    {
        $app =& JFactory::getApplication();
        $db  =& JFactory::getDBO();

        $id         = $db->quote($data['id']);
        $titel      = $db->quote($data['titel']);
        $inhalt     = $db->quote($data['inhalt']);
        $idx        = $db->quote($data['idx']);

        $query = 'UPDATE #__tagelerfelder'.
                 ' SET titel = '.$titel.', inhalt = '.$inhalt.', idx = '.$idx.
                 ' WHERE id = '.$id;

        $db->setQuery($query);
        if (!$db->query())
        {
            $app->enqueueMessage(nl2br($db->getErrorMsg()), 'error');
            return false;
        }
        return true;
    }
}