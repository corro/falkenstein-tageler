<?php
/**
 * Abteilungsinfo-Detail Controller für das Tageler Component
 * 
 * @package    Falkenstein.Joomla
 * @subpackage Components
 * @link       http://www.pfadi-falkenstein.ch
 * @license    GNU/GPL
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Import der Basisklasse
jimport( 'joomla.application.component.controller' );


/**
 * Abteilungsinfo-Detail Controller
 *
 * @package     Falkenstein.Joomla
 * @subpackage  Components
 */
class AbtInfo_DetailController extends JControllerLegacy
{
    /**
     * Custom Constructor
     */
    function __construct( $default = array())
    {
        parent::__construct( $default );

        // Register Extra tasks
        $this->registerTask( 'add', 'edit' );
    }

    /**
     * display the edit form
     * @return void
     */
    function edit()
    {
        JRequest::setVar( 'view', 'abtinfo_detail' );
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
        if ($model->store($post)) {
            $msg = 'Abteilungsinfo erfolgreich gespeichert';
        } else {
            $msg = 'Fehler beim Speichern der Abteilungsinfo';
        }

        $this->setRedirect('index.php?option=com_tageler&controller=abtinfo', $msg);
    }

    function remove()
    {
        $cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );

        $model = $this->getModel();
        if ($model->delete($cid)) {
            $msg = 'Abteilungsinfo erfolgreich entfernt';
        } else {
            $msg = 'Fehler beim Entfernen der Abteilungsinfo';
        }

        $this->setRedirect( 'index.php?option=com_tageler&controller=abtinfo', $msg);
    }

    /**
    * Abbruch
    */
    function cancel()
    {
        $this->setRedirect( 'index.php?option=com_tageler&controller=abtinfo', $msg);
    }
}
