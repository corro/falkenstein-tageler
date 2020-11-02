<?php
/**
 * Tageler-Detail Controller für das Tageler Component
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
 * Tageler-Detail Controller
 *
 * @package     Falkenstein.Joomla
 * @subpackage  Components
 */
class Tageler_DetailController extends JControllerLegacy
{
    /**
     * Custom Constructor
     */
    function __construct( $default = array())
    {
        parent::__construct( $default );

        $this->addModelPath( JPATH_COMPONENT_ADMINISTRATOR .'/models' );

        // Register Extra tasks
        $this->registerTask( 'add', 'edit' );
    }

    /**
     * Editieransicht
     */
    function edit()
    {
        $user =& JFactory::getUser();
        if (!$user->authorise('core.edit', 'com_tageler'))
        {
            echo '<h1>Zugriff verweigert</h1>Dieser Bereich ist den Leitern und Administratoren vorbehalten';
            return;
        }
    
        JRequest::setVar( 'view', 'tageler_detail' );
        JRequest::setVar( 'layout', 'form' );

        parent::display();
    }

    /**
     * Speicheraufruf
     */
    function save()
    {
        $user =& JFactory::getUser();
        if (!$user->authorise('core.edit', 'com_tageler'))
        {
            echo '<h1>Zugriff verweigert</h1>Dieser Bereich ist den Leitern und Administratoren vorbehalten';
            return;
        }
        
        // Sicherheitsüberprüfung zum Verhindern von Request-Fälschungen
        JRequest::checkToken() or jexit('Invalid Token');

        $einheit = JRequest::getWord('einheit');
        $model = $this->getModel();
        $post = JRequest::get('post');

        // Speichern der Informationen
        if ($model->store($post)) {
            $msg = 'Tageler erfolgreich gespeichert';
        } else {
            $msg = 'Fehler beim Speichern des Tagelers';
        }

        $this->setRedirect('index.php?option=com_tageler&controller=tageler_detail&cid[]='.$einheit, $msg);
    }

    /**
     * Aufruf zum Hinzufügen eines Zusatzfeldes
     */
    function addField()
    {
        $user =& JFactory::getUser();
        if (!$user->authorise('core.edit', 'com_tageler'))
        {
            echo '<h1>Zugriff verweigert</h1>Dieser Bereich ist den Leitern und Administratoren vorbehalten';
            return;
        }
        
        // Sicherheitsüberprüfung zum Verhindern von Request-Fälschungen
        JRequest::checkToken() or jexit('Invalid Token');

        $einheit = JRequest::getWord('einheit');
        $model = $this->getModel();

        // Zusatzfeld hinzufügen
        if ($model->addField($einheit)) {
            $msg = 'Feld hinzugefügt';
        } else {
            $msg = 'Fehler beim Hinzufügen des Feldes';
        }

        $this->setRedirect('index.php?option=com_tageler&controller=tageler_detail&task=edit&cid[]='.$einheit, $msg);
    }

    /**
     * Aufruf zum Entfernen eines Zusatzfeldes
     */
    function remField()
    {
        $user =& JFactory::getUser();
        if (!$user->authorise('core.edit', 'com_tageler'))
        {
            echo '<h1>Zugriff verweigert</h1>Dieser Bereich ist den Leitern und Administratoren vorbehalten';
            return;
        }
        
        // Sicherheitsüberprüfung zum Verhindern von Request-Fälschungen
        JRequest::checkToken() or jexit('Invalid Token');

        $einheit = JRequest::getWord('einheit');
        $fieldId = JRequest::getInt('fieldId');
        $model = $this->getModel();

        if ($model->remField($fieldId)) {
            $msg = 'Feld entfernt';
        } else {
            $msg = 'Fehler beim Entfernen des Feldes';
        }

        $this->setRedirect('index.php?option=com_tageler&controller=tageler_detail&task=edit&cid[]='.$einheit, $msg);
    }

    /**
     * Abbruchaufruf -> Redirect
     */
    function cancel()
    {
        $einheit = JRequest::getWord('einheit');
        $this->setRedirect('index.php?option=com_tageler&controller=tageler_detail&cid[]='.$einheit);
    }
}
