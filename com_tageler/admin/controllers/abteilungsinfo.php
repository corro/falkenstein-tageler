<?php
/**
 * Abteilungsinfos Controller für das Tageler Component
 * 
 * @package    Falkenstein.Joomla
 * @subpackage Components
 * @link       http://www.pfadi-falkenstein.ch
 * @license		GNU/GPL
 */

// Import der Basisklasse
jimport('joomla.application.component.controller');

/**
 * Abteilungsinfos Controller
 *
 * @package    Falkenstein.Joomla
 * @subpackage Components
 */
class TagelerControllerAbteilungsinfo extends JController
{
    function __construct()
    {
        parent::__construct();

        // Zusätzliche Task registrieren
        $this->registerTask( 'add', 'edit' );
    }

    /**
     * Standardansicht
     */
    function display()
    {
        JRequest::setVar( 'view', 'abteilungsinfo' );
        parent::display();
    }

    /**
     * display the edit form
     * @return void
     */
    function edit()
    {
        JRequest::setVar( 'view', 'abteilungsinfo' );
        JRequest::setVar( 'layout', 'form'  );
        JRequest::setVar('hidemainmenu', 1);

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

        $this->setRedirect('index.php?option=com_tageler&controller=abteilungsinfo');
    }

    /**
     * Abbruchaufruf -> Redirect
     */
    function cancel()
    {
        $this->setRedirect('index.php?option=com_tageler&controller=abteilungsinfo');
    }
}