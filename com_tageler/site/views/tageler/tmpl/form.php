<?php
// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

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
	//TODO: Überprüfen der Eingaben
	submitform(pressbutton);
}
//-->
</script>

<style type="text/css">
.input {
	width: 350px;
}
textarea.input {
	height: 100px;
}
</style>

<form action="index.php" method="post" name="adminForm" id="adminForm">
	<h1>Tageler editieren für <?php echo $this->einheit; ?></h1>
	<table>
		<tr>
			<td>Datum:</td><td><input class='input' type='text' name='datum' id='datum' value='<?php echo date_mysql2german($this->tageler->datum); ?>' /></td>
		</tr>
		<tr>
			<td>Titel:</td><td><input class='input' type='text' name='titel' id='titel' value='<?php echo $this->tageler->titel; ?>' /></td>
		</tr>
		<tr>
			<td>Beginn:</td><td><input class='input' type='text' name='beginn' id='beginn' value='<?php echo $this->tageler->beginn; ?>' /></td>
		</tr>
		<tr>
			<td>Schluss:</td><td><input class='input' type='text' name='schluss' id='schluss' value='<?php echo $this->tageler->schluss; ?>' /></td>
		</tr>
		<tr>
			<td style='vertical-align:top'>Mitbringen:</td><td><textarea class='input' name='mitbringen' id='mitbringen'><?php echo $this->tageler->mitbringen; ?></textarea></td>
		</tr>
		<tr>
			<td style='vertical-align:top;'>Tenü:</td><td><textarea class='input' name='tenue' id='tenue'><?php echo $this->tageler->tenue; ?></textarea></td>
		</tr>
	</table>

	<input type="hidden" name="option" value="com_tageler" />
	<input type="hidden" name="task" value="save" />
	<input type="hidden" name="controller" value="" />
	<input type="hidden" name="einheit" value="<?php echo $this->tageler->einheit; ?>" />
	<input type="hidden" name="view" value="tageler" />
	<?php echo JHTML::_( 'form.token' ); ?>

	<button type="button" onclick="submitbutton('save')">Speichern</button>
	<button type="button" onclick="submitbutton('cancel')">Abbrechen</button>
</form>