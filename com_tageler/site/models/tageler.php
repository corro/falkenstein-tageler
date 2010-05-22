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
class TagelerModelTageler extends JModel
{
    /**
     * Liefert den aktuellen Tageler für die Einheit
     * @return Tageler für die Einheit
     */
    function getTageler($gruppe)
    {
        $db =& JFactory::getDBO();

        $gruppe = mysql_escape_string($gruppe);

        $query = "SELECT * FROM #__tageler WHERE einheit = '".$gruppe."'";
        $db->setQuery( $query );
        $tageler = $db->loadObject();

        return $tageler;
    }

	function getFelder($gruppe)
	{
		$db =& JFactory::getDBO();

        $gruppe = mysql_escape_string($gruppe);

		$query = "SELECT * FROM #__tagelerfelder WHERE einheit = '".$gruppe."' ORDER BY idx";
		$db->setQuery( $query );
		$felder = $db->LoadObjectList();

		return $felder;
	}

	function store($data)
	{
		$d = explode('.', $data['datum']);
		$datum = sprintf("%04d-%02d-%02d", $d[2], $d[1], $d[0]);
		$db =& JFactory::getDBO();

        $einheit = mysql_escape_string($data['einheit']);
        $titel = mysql_escape_string($data['titel']);
        $beginn = mysql_escape_string($data['beginn']);
        $schluss = mysql_escape_string($data['schluss']);
        $mitbringen = mysql_escape_string($data['mitbringen']);
        $tenue = mysql_escape_string($data['tenue']);

		$query = "UPDATE #__tageler SET datum='".$datum."', titel='".$titel."', beginn='".$beginn."',
										schluss='".$schluss."', mitbringen='".$mitbringen."', tenue='".$tenue."'
				  WHERE einheit='".$einheit."'";
        
		$db->setQuery( $query );
		$db->query();

        $felder = TagelerModelTageler::getFelder($data['einheit']);
        foreach ($felder as $feld)
        {
            $titelname = 'titel_'.$feld->id;
            $inhaltname = 'inhalt_'.$feld->id;
            $indexname= 'index_'.$feld->id;

            $titel = mysql_escape_string($data[$titelname]);
            $inhalt = mysql_escape_string($data[$inhaltname]);
            $index = mysql_escape_string($data[$indexname]);

            $query = "UPDATE #__tagelerfelder SET titel='".$titel."', inhalt='".$inhalt."', idx=".$index."
                      WHERE id = ".$feld->id;

            $db->setQuery( $query );
            $db->query();
        }
		
		return $db->getErrorMsg();
	}

    function addField($gruppe)
    {
        $db =& JFactory::getDBO();

        $gruppe = mysql_escape_string($gruppe);

        $query = "INSERT INTO #__tagelerfelder (einheit, titel, inhalt) 
                  VALUES ('".$gruppe."', '<Titel (kann auch leer sein)>', '<Inhalt>')";
        $db->setQuery( $query );
        $db->query();

        return $db->getErrorMsg();
    }

    function remField($fieldId)
    {
        $db =& JFactory::getDBO();

        $fieldId = mysql_escape_string($fieldId);

        $query = "DELETE FROM #__tagelerfelder WHERE id = ".$field;
        $db->setQuery( $query );
        $db->query();

        return $db->getErrorMsg();
    }
}
