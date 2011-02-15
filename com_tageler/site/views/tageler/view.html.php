<?php
/**
 * Tageler View für das Tageler Component
 * 
 * @package    Falkenstein.Joomla
 * @subpackage Components
 * @link       http://www.pfadi-falkenstein.ch
 * @license		GNU/GPL
 */

// Import der Basisklasse
jimport( 'joomla.application.component.view');

/**
 * Viewklasse für die Tagelerübersicht
 *
 * @package		Falkenstein.Joomla
 * @subpackage	Components
 */
class TagelerViewTageler extends JView
{
    function display($tpl = null)
    {
        // Daten laden
        $model = $this->getModel();
        $allTageler = $model->getTageler();

        // Inhalt für das Template definieren
        $this->assignRef( 'allTageler', $allTageler );

        // Stylesheet hinzufügen
        $document = JFactory::getDocument();
        $document->addStyleSheet('components/com_tageler/css/tageler-style.css');

        parent::display($tpl);
    }
}
