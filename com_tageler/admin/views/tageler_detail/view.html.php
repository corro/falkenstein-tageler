<?php
/**
 * Tagelerübersicht-Detail View für das Tageler Component
 * 
 * @author     R. Baumgartner
 * @package    Falkenstein.Joomla
 * @subpackage Components
 * @link       http://www.pfadi-falkenstein.ch
 * @license    GNU/GPL
 */

// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.application.component.view' );

/**
 * Tagelerübersicht-Detail View
 *
 * @package    Falkenstein.Joomla
 * @subpackage Components
 */
class Tageler_DetailViewTageler_Detail extends JViewLegacy
{
    function display($tpl = null)
    {
        JToolBarHelper::title('Tageler: Editieren');
        JToolBarHelper::apply();
        JToolBarHelper::save();
        JToolBarHelper::custom('addField', 'save-new', '', 'Feld hinzufügen', false, false);
        JToolBarHelper::cancel();

        $array = JRequest::getVar('cid',  0, '', 'array');
        $einheit = $array[0];

        // Get data from the model
        $model   = $this->getModel();
        $tageler = $model->getTageler($einheit);
        $felder  = $model->getFelder($einheit);

        $this->assignRef( 'tageler', $tageler );
        $this->assignRef( 'felder', $felder );

        parent::display($tpl);
    }
}
