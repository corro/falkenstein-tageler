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
    public static function getTageler()
    {
        $db = &JFactory::getDBO();
        $query = "SELECT * FROM #__tageler ORDER BY reihenfolge";
        $db->setQuery($query);
        $tageler = $db->LoadObjectList();

        return $tageler;
    }
}
?>
