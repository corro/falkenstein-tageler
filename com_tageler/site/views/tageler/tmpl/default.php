<?php
// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

function date_mysql2german($date)
{
    $d    =    explode("-",$date);
    return    sprintf("%02d.%02d.%04d", $d[2], $d[1], $d[0]);
}

if ($this->tageler->datum >= date("Y-m-d"))
{
?>

	<h1>Tageler für <?php echo $this->einheit; ?> am <?php echo date_mysql2german($this->tageler->datum); ?></h1>
	<table>
		<tr>
			<td>Titel:</td><td><?php echo $this->tageler->titel; ?></td>
		</tr>
		<tr>
			<td>Beginn:</td><td><?php echo $this->tageler->beginn; ?></td>
		</tr>
		<tr>
			<td>Schluss:</td><td><?php echo $this->tageler->schluss; ?></td>
		</tr>
		<tr>
			<td style='vertical-align:top'>Mitbringen:</td><td><?php echo nl2br($this->tageler->mitbringen); ?></td>
		</tr>
		<tr>
			<td style='vertical-align:top'>Tenü:</td><td><?php echo nl2br($this->tageler->tenue); ?></td>
		</tr>
<?php
    foreach($this->felder as $feld)
    {
        echo "<tr><td>".$feld->titel."</td><td>".nl2br($feld->inhalt)."</td></tr>";
    }
?>
	</table>

<?php
}
else
{
	echo "<h1>Kein aktueller Tageler für ".ucwords($this->tageler->einheit)." vorhanden</h1>";
}

$task = JRequest::getWord("task");
$user =& JFactory::getUser();

if ($user->authorize('com_tageler', 'edit') && $task != "edit")
{
	echo "<a href='index.php?option=com_tageler&view=tageler&einheit=".$this->tageler->einheit."&task=edit'>";
	echo "<input type='button' value='Editieren' /></a>";
}