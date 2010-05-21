<?php
/**
 * Tageler Controller
 * 
 * @package    Falkenstein.Joomla
 * @subpackage Components
 * @link       http://www.pfadi-falkenstein.ch
 * @license		GNU/GPL
 */

// Import der Basisklasse
jimport('joomla.application.component.controller');

/**
 * Tageler Component Controller
 *
 * @package    Falkenstein.Joomla
 * @subpackage Components
 */
class TagelerController extends JController
{
	/**
	 * Method to display the view
	 *
	 * @access	public
	 */
	function display()
	{
		parent::display();
	}

	/**
	* Method to call the edit form
	*/
	function edit()
	{
		JRequest::setVar( 'layout', 'form' );
		parent::display();
	}

	/**
	* Method to get the data from the form and let the model save it
	*/
	function save()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

// 		// get the model
		$model =& $this->getModel();
//  
// 		//get data from request
		$post = JRequest::get('post');
// 		$post['content'] = JRequest::getVar('content', '', 'post', 'string', JREQUEST_ALLOWRAW);
//  
// 		// let the model save it
// 		if ($model->store($post)) {
// 			$message = JText::_('Success');
// 		} else {
// 			$message = JText::_('Error while saving');
// 			$message .= ' ['.$model->getError().'] ';
// 		}

		$message = $model->store($post);

		$einheit = JRequest::getWord('einheit');
		$view = JRequest::getWord('view');
		$this->setRedirect('index.php?option=com_tageler&view='.$view.'&einheit='.$einheit, $message);
	}

	/**
	* Cancel, redirect to component
	*/
	function cancel()
	{
		$einheit = JRequest::getWord('einheit');
		$view = JRequest::getWord('view');
		$this->setRedirect('index.php?option=com_tageler&view='.$view.'&einheit='.$einheit);
	}
	
}
?>
