<?php
// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

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

function date_mysql2german($date)
{
    $d    =    explode("-",$date);
    return    sprintf("%02d.%02d.%04d", $d[2], $d[1], $d[0]);
}

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
.input {
    width: 260px;
}
textarea.input {
    height: 100px;
}
</style>

<form action="index.php" method="post" name="adminForm" id="adminForm">
    <fieldset>
        <legend>Tageler für <?php echo $this->tageler->name; ?></legend>
        <table class='admintable'>
            <tr>
                <td class='key'>
                    <label for='datum'>Datum:</label>
                </td>
                <td>
                    <input style='vertical-align:top;width:240px;' class='input' type='text' name='datum' id='datum' value='<?php echo date_mysql2german($this->tageler->datum); ?>' />
                    <img class="calendar" src="templates/system/images/calendar.png" alt="calendar" name='datum_img' id="datum_img" />
                </td>
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
                        <label for='inhalt_<?php echo $feld->id; ?>'>
                            <input class='input' style='width:120px' type='text' name='titel_<?php echo $feld->id; ?>'
                                id='titel_<?php echo $feld->id; ?>' value='<?php echo $feld->titel; ?>' />:
                        </label>
                    </td>
                    <td>
                        <textarea class='input' name='inhalt_<?php echo $feld->id; ?>' id='inhalt_<?php echo $feld->id; ?>'><?php echo $feld->inhalt; ?></textarea>
                    </td>
                    <td style='vertical-align:top'>
                        Index:
                        <input class='input' style='width:40px' type='text' name='index_<?php echo $feld->id; ?>'
                            id='index_<?php echo $feld->id; ?>' value='<?php echo $feld->idx; ?>' />
                        <br />
                        <button onclick='removefield(<?php echo $feld->id; ?>)' title='Feld entfernen'>
                            <img src='images/cancel_f2.png' style='height:20px' alt='Feld entfernen' />
                        </button>
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
    </fieldset>
</form>