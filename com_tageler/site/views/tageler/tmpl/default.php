<?php
// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

function date_mysql2german($date)
{
    $d    =    explode("-",$date);
    return    sprintf("%02d.%02d.%04d", $d[2], $d[1], $d[0]);
}

if ($this->tageler->datum > date("Y-m-d"))
{
	echo "<h1>Tageler für ".$this->einheit." am ".date_mysql2german($this->tageler->datum)."</h1>
		<table>
			<tr>
				<td>Titel:</td><td>".$this->tageler->titel."</td>
			</tr>
			<tr>
				<td>Beginn:</td><td>".$this->tageler->beginn."</td>
			</tr>
			<tr>
				<td>Schluss:</td><td>".$this->tageler->schluss."</td>
			</tr>
			<tr>
				<td>Mitbringen:</td><td>".$this->tageler->mitbringen."</td>
			</tr>
			<tr>
				<td>Tenü:</td><td>".$this->tageler->tenue."</td>
			</tr>
		</table>";

	$task = JRequest::getWord("task");
	$user =& JFactory::getUser();

// 	if ($user->authorize('com_tageler', 'edit') && $task != "edit")
// 	{
		echo "<a href='index.php?option=com_tageler&view=tageler&einheit=".$this->tageler->einheit."&task=edit'>";
		echo "<input type='button' value='Editieren' /></a>";
// 	}
}
else
{
	echo "<h1>Kein aktueller Tageler für ".ucwords($this->tageler->einheit)." vorhanden</h1>";
}