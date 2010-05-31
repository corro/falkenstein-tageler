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
        global $mainframe;
        $breadcrumbs = &$mainframe->getPathWay();
        $breadcrumbs->addItem( 'Tageler', JRoute::_('index.php?option=com_tageler&view=tagelerubersicht') );
        $breadcrumbs->addItem( $tageler->name, JRoute::_('index.php?option=com_tageler&view=tageler&einheit='.$tageler->einheit) );

        // Browsertitel anpassen
        $document = JFactory::getDocument();
        $document->setTitle('Tageler für '.$tageler->name);

        parent::display($tpl);
    }
}