<?php
/**
 * Hellos View for Hello World Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_4
 * @license        GNU/GPL
 */
 
// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');
 
jimport( 'joomla.application.component.view' );
 
/**
 * Hellos View
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class TagelerViewTagelerubersicht extends JView
{
    /**
     * Hellos view display method
     * @return void
     **/
    function display($tpl = null)
    {
        JToolBarHelper::title( JText::_( 'Tageler Manager' ), 'generic.png' );
        JToolBarHelper::editListX();

        // Get data from the model
        $model =& $this->getModel();
        $tageler = $model->getTageler();

        /* Call the state object */
        $state =& $this->get( 'state' );

        /* Get the values from the state object that were inserted in the model's construct function */
        $lists['order_Dir'] = $state->get( 'filter_order_Dir' );
        $lists['order']     = $state->get( 'filter_order' );

        $this->assignRef( 'lists', $lists );
        $this->assignRef( 'tageler', $tageler );

        parent::display($tpl);
    }
}