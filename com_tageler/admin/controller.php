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
        JRequest::setVar( 'view', 'tagelerubersicht' );
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
     * Aufruf zum Hinzufügen eines Zusatzfeldes
     */
    function addField()
    {
        // Sicherheitsüberprüfung zum Verhindern von Request-Fälschungen
        JRequest::checkToken() or jexit('Invalid Token');

        $einheit = JRequest::getWord('einheit');
        $view = JRequest::getWord('view');

        $model =& $this->getModel();

        // Zusatzfeld hinzufügen
        $model->addField($einheit);

        $this->setRedirect('index.php?option=com_tageler&view='.$view.'&einheit='.$einheit.'&task=edit');
    }

    /**
     * Aufruf zum Entfernen eines Zusatzfeldes
     */
    function remField()
    {
        // Sicherheitsüberprüfung zum Verhindern von Request-Fälschungen
        JRequest::checkToken() or jexit('Invalid Token');

        $fieldId = JRequest::getInt('fieldId');
        $view    = JRequest::getWord('view');
        $einheit = JRequest::getWord('einheit');

        $model =& $this->getModel();
        $model->remField($fieldId);

        $this->setRedirect('index.php?option=com_tageler&view='.$view.'&einheit='.$einheit.'&task=edit');
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