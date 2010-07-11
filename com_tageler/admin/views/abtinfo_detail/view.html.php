<?php
/**
 * Abteilungsinfo-Detail View für das Tageler Component
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
 * Abteilungsinfo-Detail View
 *
 * @package    Falkenstein.Joomla
 * @subpackage Components
 */
class AbtInfo_DetailViewAbtInfo_Detail extends JView
{
    function display($tpl = null)
    {
        $array = JRequest::getVar('cid',  0, '', 'array');
        $id = (int)$array[0];

        JToolBarHelper::save();
        if ($id)
        {
            JToolBarHelper::title( 'Abteilungsinfo: <small><small>[ Editieren ]</small></small>' );
            JToolBarHelper::cancel( 'cancel', 'Close' );

            // Get data from the model
            $model   = $this->getModel();
            $abtInfo = $model->getAbteilungsinfo($id);

            $this->assignRef( 'abtInfo', $abtInfo );
        }
        else
        {
            JToolBarHelper::title( 'Abteilungsinfo: <small><small>[ Erfassen ]</small></small>' );
            JToolBarHelper::cancel();
        }

        parent::display($tpl);
    }
}