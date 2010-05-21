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

        $query = "SELECT * FROM #__tageler WHERE einheit = '".$gruppe."'";
        $db->setQuery( $query );
        $tageler = $db->loadObject();

        return $tageler;
    }

	function getFelder($gruppe)
	{
		$db =& JFactory::getDBO();

		$query = "SELECT * FROM #__tagelerfelder WHERE einheit = '".$gruppe."'";
		$db->setQuery( $query );
		$felder = $db->LoadObjectList();

		return $felder;
	}

	function store($data)
	{
		$d = explode('.', $data['datum']);
		$datum = sprintf("%04d-%02d-%02d", $d[2], $d[1], $d[0]);
		$db =& JFactory::getDBO();

		$query = "UPDATE #__tageler SET datum='".$datum."', titel='".$data['titel']."', beginn='".$data['beginn']."',
										schluss='".$data['schluss']."', mitbringen='".$data['mitbringen']."', tenue='".$data['tenue']."'
				  WHERE einheit='".$data['einheit']."'";
        
		$db->setQuery( $query );
		$db->query();
		
		return $db->getErrorMsg();
	}

    function addField($gruppe)
    {
        $db =& JFactory::getDBO();

        $query = "INSERT INTO #__tagelerfelder (einheit, titel, inhalt) VALUES ('".$gruppe."', '<Titel>', '<Inhalt>')";
        $db->setQuery( $query );
        $db->query();

        return $db->getErrorMsg();
    }

    function remField($fid)
    {
        $db =& JFactory::getDBO();

        $query = "DELETE FROM #__tagelerfelder WHERE id = ".$fid;
        $db->setQuery( $query );
        $db->query();

        return $db->getErrorMsg();
    }
}
