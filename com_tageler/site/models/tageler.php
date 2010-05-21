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

        $query = 'SELECT * FROM #__tageler WHERE einheit = "'.$gruppe.'"';
        $db->setQuery( $query );
        $tageler = $db->loadObject();

        return $tageler;
    }

	function store($data)
	{
		$d = explode('.', $data['datum']);
		$datum = sprintf("%04d-%02d-%02d", $d[2], $d[1], $d[0]);
		$db =& JFactory::getDBO();

		$query = "UPDATE #__tageler SET datum='".$datum."', titel='".$data['titel']."', beginn='".$data['beginn']."',
										schluss='".$data['schluss']."', mitbringen='".$data['mitbringen']."', tenue='".$data['tenue']."'
				  WHERE einheit='".$data['einheit']."'";
		echo $query;
		$db->setQuery( $query );
		$db->query();
		
		return $db->getErrorMsg();

// 		// get the table
// 		$row =& $this->getTable();
//  
// 		// Bind the form fields to the hello table
// 		if (!$row->bind($data)) {
// 			$this->setError($this->_db->getErrorMsg());
// 			return false;
// 		}
//  
// 		// Make sure the hello record is valid
// 		if (!$row->check()) {
// 			$this->setError($this->_db->getErrorMsg());
// 			return false;
// 		}
//  
// 		// Store the web link table to the database
// 		if (!$row->store()) {
// 			$this->setError( $row->getErrorMsg() );
// 			return false;
// 		}
//  
// 		return true;
	}
}
