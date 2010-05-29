<?php
/**
 * Abteilungsinfos View für das Tageler Component
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
 * Abteilungsinfos View
 *
 * @package    Falkenstein.Joomla
 * @subpackage Components
 */
class TagelerViewAbteilungsinfos extends JView
{
    function display($tpl = null)
    {
        JToolBarHelper::title( JText::_( 'Abteilungsinfos Manager' ), 'generic.png' );
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();

        // Get data from the model
        $model =& $this->getModel();
        $abtInfos = $model->getAbteilungsinfos();

        /* Call the state object */
        $state =& $this->get( 'state' );

        /* Get the values from the state object that were inserted in the model's construct function */
        $lists['order_Dir'] = $state->get( 'filter_order_Dir' );
        $lists['order']     = $state->get( 'filter_order' );

        $this->assignRef( 'lists', $lists );
        $this->assignRef( 'abtInfos', $abtInfos );

        parent::display($tpl);
    }
}