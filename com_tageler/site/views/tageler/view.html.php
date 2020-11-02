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
class TagelerViewTageler extends JViewLegacy
{
    function display($tpl = null)
    {
        // Daten laden
        $model = $this->getModel();
        $allTageler = $model->getTageler();

        // Inhalt für das Template definieren
        $this->assignRef( 'allTageler', $allTageler );

        // Stylesheet hinzufügen
        $this->document->addStyleSheet('components/com_tageler/css/tageler-style.css');

        // Titel setzen
        $app = JFactory::getApplication();
        $title = 'Tageler';
        if ($app->getCfg('sitename_pagetitles', 0))
        {
            $title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
        }
        $this->document->setTitle($title);

        parent::display($tpl);
    }
}
