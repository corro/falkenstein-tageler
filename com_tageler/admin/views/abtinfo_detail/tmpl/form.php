<?php
// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

?>

<script language="javascript" type="text/javascript">
<!--
function submitbutton(pressbutton)
{
    submitform(pressbutton);
}
//-->
</script>

<style type="text/css">
.input {
    width: 100%;
}
textarea.input {
    height: 100px;
}
</style>

<form action="index.php" method="post" name="adminForm" id="adminForm">
    <fieldset>
    <legend>Abteilungsinfo</legend>
    <table class='admintable'>
        <tr>
            <td colspan='5'>
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
                <label for='titel'>Titel:</label>
            </td>
            <td>
                <input class='input' type='text' name='titel' id='titel' value='<?php echo $this->abtInfo->titel; ?>' />
            </td>
        </tr>
        <tr>
            <td class='key' style='vertical-align:top'>
                <label for='inhalt'>Inhalt:</label>
            </td>
            <td>
                <textarea class='input' name='inhalt' id='inhalt'><?php echo $this->abtInfo->inhalt; ?></textarea>
            </td>
        </tr>
        <tr>
            <td class='key'>
                <label for='idx'>Index:</label>
            </td>
            <td>
                <input class='input' style='width:40px' type='text' name='idx' id='idx' value='<?php echo $this->abtInfo->idx; ?>' />
            </td>
        </tr>
    </table>

    <input type='hidden' name='id' value='<?php echo $this->abtInfo->id; ?>' />
    <input type="hidden" name="option" value="com_tageler" />
    <input type="hidden" name="task" value="save" />
    <input type="hidden" name="controller" value="abtinfo_detail" />
    <?php echo JHTML::_( 'form.token' ); ?>
    </fieldset>
</form>