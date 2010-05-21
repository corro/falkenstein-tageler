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

// 	function store($data)
// 	{
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
// 	}
}
