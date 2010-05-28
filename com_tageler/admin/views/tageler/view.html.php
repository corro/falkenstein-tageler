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
        JToolBarHelper::title( 'Tageler Manager' );
        JToolBarHelper::editList();

        // Get data from the model
        $model =& $this->getModel();
        $tageler = $model->getTagelers();

        $this->assignRef( 'tageler', $tageler );

        parent::display($tpl);
    }
}