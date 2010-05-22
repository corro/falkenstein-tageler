<?php
// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

function date_mysql2german($date)
{
    $d    =    explode("-",$date);
    return    sprintf("%02d.%02d.%04d", $d[2], $d[1], $d[0]);
}

function ball2img($str)
{
    return str_replace("*", "<img src='components/com_tageler/img/falkipfeilgruen.gif' />", $str);
}

if ($this->tageler->datum >= date("Y-m-d"))
{
?>
    <style type='text/css'>
        td {
            padding-bottom:10px;
            vertical-align:top;
        }
        td.label {
            width:120px;
        }
    </style>

	<h1>Tageler für <?php echo $this->einheit; ?> am <?php echo date_mysql2german($this->tageler->datum); ?></h1>
    <h2><?php echo $this->tageler->titel; ?></h2>
	<table>
		<tr>
			<td class='label'>Beginn:</td><td><?php echo $this->tageler->beginn; ?></td>
		</tr>
		<tr>
			<td class='label'>Schluss:</td><td><?php echo $this->tageler->schluss; ?></td>
		</tr>
		<tr>
			<td class='label'>Mitbringen:</td><td><?php echo ball2img(nl2br($this->tageler->mitbringen)); ?></td>
		</tr>
		<tr>
			<td class='label'>Tenü:</td><td><?php echo ball2img(nl2br($this->tageler->tenue)); ?></td>
		</tr>
<?php
    foreach($this->felder as $feld)
    {
        if ($feld->titel)
            echo "<tr><td style='vertical-align:top'>".$feld->titel.":</td><td>".ball2img(nl2br($feld->inhalt))."</td></tr>";
        else
            echo "<tr><td></td><td>".ball2img(nl2br($feld->inhalt))."</td></tr>";
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