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
 * Viewklasse für das Tageler Component
 *
 * @package		Falkenstein.Joomla
 * @subpackage	Components
 */
class TagelerViewTagelerubersicht extends JView
{
	function display($tpl = null)
	{
//         $allTageler = $this->get( 'AllTageler' );
        $model = $this->getModel();
        $allTageler = $model->getTageler();
        $this->assignRef( 'allTageler', $allTageler );
		 
		parent::display($tpl);
	}
}