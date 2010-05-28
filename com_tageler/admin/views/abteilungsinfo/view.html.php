<?php
/**
 * Abteilungsinfo View für das Tageler Component
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
 * Abteilungsinfo View
 *
 * @package    Falkenstein.Joomla
 * @subpackage Components
 */
class TagelerViewAbteilungsinfo extends JView
{
    function display($tpl = null)
    {
        JToolBarHelper::title( 'Abteilungsinfo: <small><small>[ Editieren ]</small></small>' );
        JToolBarHelper::save();
        JToolBarHelper::cancel( 'cancel', 'Close' );

        $array = JRequest::getVar('cid',  0, '', 'array');
        $id = (int)$array[0];

        // Get data from the model
        $model =& $this->getModel();

        $this->assignRef( 'abtInfo', $abtInfo );

        parent::display($tpl);
    }
}