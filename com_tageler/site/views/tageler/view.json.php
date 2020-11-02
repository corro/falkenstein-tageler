<?php
/**
 * JSON Tageler View für das Tageler Component
 * 
 * @package    Falkenstein.Joomla
 * @subpackage Components
 * @link       http://www.pfadi-falkenstein.ch
 * @license		GNU/GPL
 */

// Import der Basisklasse
jimport( 'joomla.application.component.view');

/**
 * JSON Viewklasse für die Tagelerübersicht
 *
 * @package		Falkenstein.Joomla
 * @subpackage	Components
 */
class TagelerViewTageler extends JViewLegacy
{
    function display($tpl = null)
    {
        // Daten laden
        $model = $this->getModel();
        $allTageler = $model->getTageler();

        $document =& JFactory::getDocument();
        $document->setMimeEncoding('application/json');

        echo json_encode($allTageler);
    }
}
