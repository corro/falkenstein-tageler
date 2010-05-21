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

		$message = $model->store($post);

		$einheit = JRequest::getWord('einheit');
		$view = JRequest::getWord('view');
		$this->setRedirect('index.php?option=com_tageler&view='.$view.'&einheit='.$einheit, $message);
	}

    function addField()
    {
        $model =& $this->getModel();

        $einheit = JRequest::getWord('einheit');
        $model->addField($einheit);

        $view = JRequest::getWord('view');
        $this->setRedirect('index.php?option=com_tageler&view='.$view.'&einheit='.$einheit.'&task=edit');
    }

    function remField()
    {
        $model =& $this->getModel();

        $fid = JRequest::getInt('fieldId');
        $model->remField($fid);

        $view = JRequest::getWord('view');
        $einheit = JRequest::getWord('einheit');
        $this->setRedirect('index.php?option=com_tageler&view='.$view.'&einheit='.$einheit.'&task=edit');
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
