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
class TagelerViewTageler extends JView
{
	function display($tpl = null)
	{
		$einheit = JRequest::getWord('einheit');
        $model = $this->getModel();
        $tageler = $model->getTageler($einheit);
        $felder = $model->getFelder($einheit);

        $einheit = ucwords($einheit);
        $this->assignRef( 'tageler', $tageler );
        $this->assignRef( 'felder', $felder );
        $this->assignRef( 'einheit', $einheit );

		parent::display($tpl);
	}
}