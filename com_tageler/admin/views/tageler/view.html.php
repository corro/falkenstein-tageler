<?php
/**
 * Tagelerübersicht View für das Tageler Component
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
 * Tagelerübersicht View
 *
 * @package    Falkenstein.Joomla
 * @subpackage Components
 */
class TagelerViewTageler extends JView
{
    function display($tpl = null)
    {
        JToolBarHelper::title( JText::_( 'Tageler Manager' ), 'generic.png' );
        JToolBarHelper::editListX();

        // Get data from the model
        $model   = $this->getModel();
        $tageler = $model->getTageler();

        /* Call the state object */
//         $state =& $this->get( 'state' );

        /* Get the values from the state object that were inserted in the model's construct function */
//         $lists['order_Dir'] = $state->get( 'filter_order_Dir' );
//         $lists['order']     = $state->get( 'filter_order' );

//         $this->assignRef( 'lists', $lists );
        $this->assignRef( 'tageler', $tageler );

        parent::display($tpl);
    }
}