<?php
// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'helpers.php');
JHTML::_('behavior.calendar'); // Kalender-Script vorbereiten
$document =& JFactory::getDocument();
$document->addScriptDeclaration(
    "window.addEvent('domready', function() {Calendar.setup({
        inputField     :    'datum',     // id of the input field
        ifFormat       :    '%d.%m.%Y',      // format of the input field
        button         :    'datum_img',  // trigger for the calendar (button ID)
        align          :    'Tl',           // alignment (defaults to 'Bl')
        singleClick    :    true
    });});"
);

?>

<script language="javascript" type="text/javascript">
<!--
function submitbutton(pressbutton)
{
    submitform(pressbutton);
}

function removefield(id)
{
    document.getElementById('fieldId').value = id;
    submitform('remField');
}

//-->
</script>

<style type="text/css">
.key {
    width:150px;
}
.input {
    width: 100%;
}
textarea.input {
    height: 100px;
}
</style>

<div class="componentheading">
    Tageler editieren für <?php echo $this->tageler->name; ?>
</div>

<form action="index.php" method="post" name="adminForm" id="adminForm">
    <fieldset>
    <legend>Tageler</legend>
    <table class='admintable'>
        <tr>
            <td colspan='3'>
                Alle mehrzeiligen Eingabefelder unterstützen die Formatierungssprache Textile. Verwende sie 
                um den Tageler zu formatieren. Die wichtigsten Befehle sind:
                <ul>
                    <li>Aufzählungszeichen: * Aufzählung</li>
                    <li>Fetter Text: *Dieser Text ist fett*</li>
                    <li>Link: "Linktext":http://www.link.ch</li>
                    <li>Mail-Link: "Pfadiname":mailto:pfadiname@pfadi-falkenstein.ch?subject=Betrefftext</li>
                </ul>
                Mehr Infos und eine komplette Liste der Befehler findest du unter
                <a href='http://textile.thresholdstate.com'>http://textile.thresholdstate.com</a>
                (einige Befehle sind deaktiviert).
                <br />
                <hr />
            </td>
        </tr>
        <tr>
            <td class='key'>
                <label for='datum'>Datum:</label>
            </td>
            <td style="width:450px">
                <input type="text" name="datum" id="datum" value="<?php echo date_mysql2german($this->tageler->datum); ?>" style="width:100px" />
                <img class='calendar' src='/media/system/images/calendar.png' alt='calendar' name='datum_img' id='datum_img' />
            </td>
            <td  style="width:100px"></td>
        </tr>
        <tr>
            <td class='key'>
                <label for='titel'>Titel:</label>
            </td>
            <td>
                <input class='input' type='text' name='titel' id='titel' value='<?php echo $this->tageler->titel; ?>' />
            </td>
        </tr>
        <tr>
            <td class='key'>
                <label for='beginn'>Beginn:</label>
            </td>
            <td>
                <input class='input' type='text' name='beginn' id='beginn' value='<?php echo $this->tageler->beginn; ?>' />
            </td>
        </tr>
        <tr>
            <td class='key'>
                <label for='schluss'>Schluss:</label>
            </td>
            <td>
                <input class='input' type='text' name='schluss' id='schluss' value='<?php echo $this->tageler->schluss; ?>' />
            </td>
        </tr>
        <tr>
            <td class='key' style='vertical-align:top'>
                <label for='mitbringen'>Mitbringen:</label>
            </td>
            <td>
                <textarea class='input' name='mitbringen' id='mitbringen'><?php echo $this->tageler->mitbringen; ?></textarea>
            </td>
        </tr>
        <tr>
            <td class='key' style='vertical-align:top;'>
                <label for='tenue'>Tenü:</label>
            </td>
            <td>
                <textarea class='input' name='tenue' id='tenue'><?php echo $this->tageler->tenue; ?></textarea>
            </td>
        </tr>
        <?php
        foreach($this->felder as $feld)
        {
        ?>
            <tr>
                <td class='key' style='vertical-align:top'>
                    <label for='titel_<?php echo $feld->id; ?>'>
                        <input class='input' style='width:120px' type='text' name='titel_<?php echo $feld->id; ?>'
                            id='titel_<?php echo $feld->id; ?>' value='<?php echo $feld->titel; ?>' />:
                    </label>
                </td>
                <td>
                    <textarea class='input' name='inhalt_<?php echo $feld->id; ?>' id='inhalt_<?php echo $feld->id; ?>'><?php echo $feld->inhalt; ?></textarea>
                </td>
                <td style='vertical-align:top'>
                    <div style="margin-left:10px">
                        Index:
                        <br />
                        <input class='input' style='width:40px' type='text' name='index_<?php echo $feld->id; ?>'
                            id='index_<?php echo $feld->id; ?>' value='<?php echo $feld->idx; ?>' />
                        <br />
                        <button onclick='removefield(<?php echo $feld->id; ?>)' title='Feld entfernen'>
                            <img src='/media/media/images/remove.png' style='height:20px' alt='Feld entfernen' />
                        </button>
                    </div>
                </td>
            </tr>
        <?php
        }
        ?>
	</table>

	<input type="hidden" name="option" value="com_tageler" />
	<input type="hidden" name="task" value="save" />
	<input type="hidden" name="controller" value="tageler_detail" />
	<input type="hidden" name="einheit" value="<?php echo $this->tageler->einheit; ?>" />
    <input type="hidden" name="fieldId" id='fieldId' value="" />
	<?php echo JHTML::_( 'form.token' ); ?>

	<button onclick="submitbutton('save')">Speichern</button>
	<button onclick="submitbutton('cancel')">Abbrechen</button>
    <button onclick="submitbutton('addField')">Feld hinzufügen</button>
    </fieldset>
</form>
