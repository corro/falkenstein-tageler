<?php
// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

function date_mysql2german($date)
{
    $d    =    explode("-",$date);
    
    return    sprintf("%02d.%02d.%04d", $d[2], $d[1], $d[0]);
}

echo "<h1>Tageler-Übersicht für ".date_mysql2german($this->allTageler[0]->datum)."</h1>";
echo "<table>";
echo "<tr><td>Einheit</td><td>Titel</td><td>Beginn</td><td>Schluss</td></tr>";

foreach($this->allTageler as $tageler)
{
    echo "<tr>";
    echo "<td><a href='index.php?option=com_tageler&view=tageler&einheit=".$tageler->einheit."'>".ucwords($tageler->einheit)."</a></td>";
    echo "<td>".$tageler->titel."</td>";
    echo "<td>".$tageler->beginn."</td>";
    echo "<td>".$tageler->schluss."</td>";
    echo "</tr>";
}

echo "</table>";