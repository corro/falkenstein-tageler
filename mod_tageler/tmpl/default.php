<?php

defined('_JEXEC') or die('Restricted access'); // no direct access

foreach ($tageler as $t)
{
	if ($t->datum >= date("Y-m-d"))
	{
		echo "<img src='modules/mod_tageler/img/new.png' alt='new' style='margin-right:10px' />";
	}
	else
	{
		echo "<img src='modules/mod_tageler/img/old.png' alt='old' style='margin-right:10px' />";
	}

	echo "<a href='index.php?option=com_tageler&view=tageler&einheit=".$t->einheit."'>".$t->name."</a><br />";
}

echo "<div style='margin-left:20px'><a href='index.php?option=com_tageler&view=tagelerubersicht'>Alle Tageler</a></div><br />";
