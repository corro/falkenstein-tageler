<?php
// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

// function date_mysql2german($date)
// {
//     $d    =    explode("-",$date);
//     return    sprintf("%02d.%02d.%04d", $d[2], $d[1], $d[0]);
// }

?>

<script language="javascript" type="text/javascript">
<!--
function submitbutton(pressbutton)
{
	//TODO: Überprüfen der Eingaben
	submitform(pressbutton);
}
//-->
</script>

<form action="index.php" method="post" name="adminForm" id="adminForm">
	<h1>Tageler editieren für <?php echo $this->einheit; ?></h1>
	<table>
		<tr>
			<td>Titel:</td><td><input type='text' value='<?php echo $this->tageler->titel; ?>' /></td>
		</tr>
		<tr>
			<td>Beginn:</td><td><input type='text' value='<?php echo $this->tageler->beginn; ?>' /></td>
		</tr>
		<tr>
			<td>Schluss:</td><td><input type='text' value='<?php echo $this->tageler->schluss; ?>' /></td>
		</tr>
		<tr>
			<td>Mitbringen:</td><td><input type='text' value='<?php echo $this->tageler->mitbringen; ?>' /></td>
		</tr>
		<tr>
			<td>Tenü:</td><td><input type='text' value='<?php echo $this->tageler->tenue; ?>' /></td>
		</tr>
	</table>

	<input type="hidden" name="option" value="com_tageler" />
	<input type="hidden" name="task" value="save" />
	<input type="hidden" name="controller" value="" />
	<input type="hidden" name="einheit" value="<?php echo $this->tageler->einheit; ?>" />
	<input type="hidden" name="view" value="tageler" />

	<button type="button" onclick="submitbutton('save')"><?php echo JText::_('Save') ?></button>
	<button type="button" onclick="submitbutton('cancel')"><?php echo JText::_('Cancel') ?></button>
</form>