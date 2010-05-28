<?php
/**
 * Tageler Controller für das Tageler Component
 * 
 * @package    Falkenstein.Joomla
 * @subpackage Components
 * @link       http://www.pfadi-falkenstein.ch
 * @license		GNU/GPL
 */

// Import der Basisklasse
jimport('joomla.application.component.controller');

/**
 * Tageler Controller
 *
 * @package    Falkenstein.Joomla
 * @subpackage Components
 */
class TagelersController extends JController
{
    /**
     * Standardansicht
     */
    function display()
    {
        JRequest::setVar( 'view', 'tageler' );
        parent::display();
    }

    /**
     * Editieransicht
     */
    function edit()
    {
        JRequest::setVar( 'view', 'tageler' );
        JRequest::setVar( 'layout', 'form' );
        JRequest::setVar( 'hidemainmenu', 1 );

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

        $this->setRedirect('index.php?option=com_tageler');
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

        $this->setRedirect('index.php?option=com_tageler&view='.$view.'&task=edit&cid[]='.$einheit);
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

        $this->setRedirect('index.php?option=com_tageler&view='.$view.'&task=edit&cid[]='.$einheit);
    }

    /**
     * Abbruchaufruf -> Redirect
     */
    function cancel()
    {
        $einheit = JRequest::getWord('einheit');
        $view = JRequest::getWord('view');
        $this->setRedirect('index.php?option=com_tageler');
    }
}