<?php
/**
 * Datenzugriffsklasse für das Tagelermodul
 * 
 * @package    Falkenstein.Joomla
 * @subpackage Modules
 * @link       http://www.pfadi-falkenstein.ch
 * @license    GNU/GPL
 */

defined('_JEXEC') or die('Direct Access to this location is not allowed.');
 
class ModTagelerHelper
{
    public function getTageler()
    {
        $db = &JFactory::getDBO();
        $query = "SELECT * FROM #__tageler";
        $db->setQuery($query);
        $tageler = $db->LoadObjectList();

        return $tageler;
    }
}
?>
