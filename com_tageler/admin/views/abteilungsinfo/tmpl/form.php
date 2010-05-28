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
    width: 260px;
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
            <td class='key'>
                <label for='titel'>Titel:</label>
            </td>
            <td>
                <input class='input' type='text' name='titel' id='titel' value='<?php echo $this->abtInfo->titel; ?>' />
            </td>
        </tr>
        <tr>
            <td class='key'>
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
                <input class='input' type='text' name='idx' id='idx' value='<?php echo $this->abtInfo->idx; ?>' />
            </td>
        </tr>
    </table>

    <input type='hidden' name='id' value='<?php echo $this->abtInfo->id; ?>' />
    <input type="hidden" name="option" value="com_tageler" />
    <input type="hidden" name="task" value="save" />
    <input type="hidden" name="controller" value="abteilungsinfos" />
    <input type="hidden" name="view" value="abteilungsinfos" />
    <?php echo JHTML::_( 'form.token' ); ?>
    </fieldset>
</form>