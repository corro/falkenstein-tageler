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
class TagelerModelAbteilungsinfo extends JModel
{
    /**
     * Liefert die Abteilungsinfos (einheit=all)
     * @return Abteilungsinfos
     */
    function getAbteilungsinfo($id)
    {
        $db =& JFactory::getDBO();

        $query = 'SELECT * FROM '.$db->nameQuote('#__tagelerfelder').
                 'WHERE '.$db->nameQuote('id').' = '.$db->quote($id);
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

        if ($data['id'] > 0)
        {
            $query = 'UPDATE '.$db->nameQuote('#__tagelerfelder').
                    'SET '.$db->nameQuote('titel').'='.$titel.', '.$db->nameQuote('inhalt').'='.$inhalt.', '.
                            $db->nameQuote('idx').'='.$idx.
                    'WHERE '.$db->nameQuote('id').'='.$id;
        }
        else
        {
            $query = 'INSERT INTO '.$db->nameQuote('#__tagelerfelder').
                     ' ('.$db->nameQuote('titel').', '.$db->nameQuote('inhalt').', '.$db->nameQuote('idx').')'.
                     'VALUES ('.$titel.', '.$inhalt.', '.$idx.')';
        }

        $db->setQuery($query);
        if (!$db->query())
        {
            $app->enqueueMessage(nl2br($db->getErrorMsg()), 'error');
        }
    }
}