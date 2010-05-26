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
class TagelerViewTageler extends JView
{
    function display($tpl = null)
    {
        // Daten laden
        $einheit = JRequest::getWord('einheit');
        $model = $this->getModel();
        $tageler = $model->getTageler($einheit);
        $felder = $model->getFelder($einheit);

        // Inhalt für das Template definieren
        $this->assignRef( 'tageler', $tageler );
        $this->assignRef( 'felder', $felder );

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