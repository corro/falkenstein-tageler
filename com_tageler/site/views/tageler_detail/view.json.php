<?php
/**
 * JSON Tageler View für das Tageler Component
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
 * JSON Viewklasse für die Tageler.
 *
 * @package		Falkenstein.Joomla
 * @subpackage	Components
 */
class Tageler_DetailViewTageler_Detail extends JViewLegacy
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

        $document =& JFactory::getDocument();
        $document->setMimeEncoding('application/json');

        $tageler->extra = $felder;
        $tageler->abtInfos = $abtInfos;

        echo json_encode($tageler);
    }
}
