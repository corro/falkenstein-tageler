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
 * Controller für das Tageler Component
 *
 * @package    Falkenstein.Joomla
 * @subpackage Components
 */
class TagelerController extends JController
{
    /**
     * Standardansicht
     */
    function display()
    {
        parent::display();
    }

    /**
     * Editieransicht
     */
    function edit()
    {
        JRequest::setVar( 'layout', 'form' );
        parent::display();
    }

    /**
     * Speicheraufruf
     */
    function save()
    {
        // Sicherheitsüberprüfung zum Verhindern von Request-Fälschungen
        JRequest::checkToken() or jexit('Invalid Token');

        $model =& $this->getModel();
        $post = JRequest::get('post');

        // Speichern der Informationen
        $model->store($post);

        $einheit = JRequest::getWord('einheit');
        $view = JRequest::getWord('view');
        $this->setRedirect('index.php?option=com_tageler&view='.$view.'&einheit='.$einheit);
    }

    /**
     * Abbruchaufruf -> Redirect
     */
    function cancel()
    {
        $einheit = JRequest::getWord('einheit');
        $view = JRequest::getWord('view');
        $this->setRedirect('index.php?option=com_tageler&view='.$view.'&einheit='.$einheit);
    }
}