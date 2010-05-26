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
class TagelerModelTageler extends JModel
{
    /**
     * Liefert den aktuellen Tageler für die Einheit
     * @return Tageler für die Einheit
     */
    function getTageler($einheit)
    {
        $app =& JFactory::getApplication();
        $db  =& JFactory::getDBO();

        $query = 'SELECT * FROM '.$db->nameQuote('#__tageler').
                 'WHERE einheit = '.$db->quote($einheit);

        $db->setQuery($query);
        $tageler = $db->loadObject();

        if (is_null($tageler))
        {
            $app->enqueueMessage(nl2br($db->getErrorMsg()),'error');
        }

        return $tageler;
    }

    /**
     * Liefert die Zusatzfelder des Tagelers der Einheit
     * @return Zusatzfelder für den Tageler der Einheit
     */
    function getFelder($einheit)
    {
        $app =& JFactory::getApplication();
        $db =& JFactory::getDBO();

        $query = 'SELECT * FROM '.$db->nameQuote('#__tagelerfelder').
                 'WHERE einheit = '.$db->quote($einheit).
                 'ORDER BY '.$db->nameQuote('idx');

        $db->setQuery( $query );
        $felder = $db->loadObjectList();

        if (is_null($felder))
        {
            $app->enqueueMessage(nl2br($db->getErrorMsg()), 'error');
        }
        return $felder;
    }

    /**
     * Speichert den Tageler mit den Daten aus dem JRequest
     */
    function store($data)
    {
        $app =& JFactory::getApplication();
        $db  =& JFactory::getDBO();

        $d          = explode('.', $data['datum']);
        $datum      = $db->quote(sprintf("%04d-%02d-%02d", $d[2], $d[1], $d[0]));
        $titel      = $db->quote($data['titel']);
        $beginn     = $db->quote($data['beginn']);
        $schluss    = $db->quote($data['schluss']);
        $mitbringen = $db->quote($data['mitbringen']);
        $tenue      = $db->quote($data['tenue']);
        $einheit    = $db->quote($data['einheit']);

        $query = 'UPDATE '.$db->nameQuote('#__tageler').
                 'SET '.$db->nameQuote('datum').'='.$datum.', '.$db->nameQuote('titel').'='.$titel.', '.
                        $db->nameQuote('beginn').'='.$beginn.', '.$db->nameQuote('schluss').'='.$schluss.', '.
                        $db->nameQuote('mitbringen').'='.$mitbringen.', '.$db->nameQuote('tenue').'='.$tenue.
                 'WHERE '.$db->nameQuote('einheit').'='.$einheit;

        $db->setQuery($query);
        if (!$db->query())
        {
            $app->enqueueMessage(nl2br($db->getErrorMsg()), 'error');
        }

        $felder = TagelerModelTageler::getFelder($data['einheit']);
        foreach ($felder as $feld)
        {
            $titelname = 'titel_'.$feld->id;
            $inhaltname = 'inhalt_'.$feld->id;
            $indexname= 'index_'.$feld->id;

            $titel = $db->quote($data[$titelname]);
            $inhalt = $db->quote($data[$inhaltname]);
            $index = $db->quote($data[$indexname]);
            $id = $db->quote($feld->id);

            $query = 'UPDATE '.$db->nameQuote('#__tagelerfelder').
                     'SET '.$db->nameQuote('titel').'='.$titel.', '.$db->nameQuote('inhalt').'='.$inhalt.', '.
                            $db->nameQuote('idx').'='.$index.
                     'WHERE '.$db->nameQuote('id').'='.$id;

            $db->setQuery($query);
            if (!$db->query())
            {
                $app->enqueueMessage(nl2br($db->getErrorMsg()), 'error');
            }
        }
    }

    /**
     * Fügt dem Tageler der Einheit ein Zusatzfeld hinzu
     */
    function addField($einheit)
    {
        $app =& JFactory::getApplication();
        $db  =& JFactory::getDBO();

        $einheit = $db->quote($einheit);
        $titel   = $db->quote('Titel');
        $inhalt  = $db->quote('Inhalt');

        $query = 'INSERT INTO '.$db->nameQuote('#__tagelerfelder').
                            '('.$db->nameQuote('einheit').', '.$db->nameQuote('titel').', '.$db->nameQuote('inhalt').')'.
                 'VALUES ('.$einheit.', '.$titel.', '.$inhalt.')';

        $db->setQuery($query);
        if (!$db->query())
        {
            $app->enqueueMessage(nl2br($db->getErrorMsg()), 'error');
        }
    }

    /**
     * Entfernt das Zusatzfeld mit der angegebenen Id
     */
    function remField($fieldId)
    {
        $app =& JFactory::getApplication();
        $db  =& JFactory::getDBO();

        $query = 'DELETE FROM '.$db->nameQuote('#__tagelerfelder').
                 'WHERE '.$db->nameQuote('id').'='.$db->quote($fieldId);

        $db->setQuery( $query );
        $db->query();

        return $db->getErrorMsg();
    }
}
