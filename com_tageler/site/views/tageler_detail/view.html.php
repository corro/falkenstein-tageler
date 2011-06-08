<?php
/**
 * Tageler View für das Tageler Component
 * 
 * @package    Falkenstein.Joomla
 * @subpackage Components
 * @link       http://www.pfadi-falkenstein.ch
 * @license		GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

// Import der Basisklasse
jimport( 'joomla.application.component.view');

/**
 * Viewklasse für die Tageler.
 *
 * @package		Falkenstein.Joomla
 * @subpackage	Components
 */
class Tageler_DetailViewTageler_Detail extends JView
{
    function display($tpl = null)
    {
        // Daten laden
        $array = JRequest::getVar('cid',  0, '', 'array');
        $einheit = $array[0];

        $model    = $this->getModel();
        $tageler  = $model->getTageler($einheit);
        $felder   = $model->getFelder($einheit);
        $abtInfos = $model->getAbtInfos();

        // Inhalt für das Template definieren
        $this->assignRef('tageler', $tageler);
        $this->assignRef('felder', $felder);
        $this->assignRef('abtInfos', $abtInfos);

        // Breadcrumb anpassen
        $mainframe = &JFactory::getApplication();;
        $breadcrumbs = &$mainframe->getPathway();
        $breadcrumbs->addItem($tageler->name);

        // Stylesheet hinzufügen
        $this->document->addStyleSheet('components/com_tageler/css/tageler_detail-style.css');

        // Titel setzen
        $app = JFactory::getApplication();
        $title = 'Tageler '.$tageler->name;
        if ($app->getCfg('sitename_pagetitles', 0))
        {
            $title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
        }
        $this->document->setTitle($title);

        parent::display($tpl);
    }
}
