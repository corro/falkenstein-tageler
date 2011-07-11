<?php

defined('_JEXEC') or die('Restricted access'); // no direct access

foreach ($tageler as $t)
{
	if ($t->datum >= date("Y-m-d"))
	{
		echo '<img src="modules/mod_tageler/img/new.png" width="9" height="9" alt="new" style="margin-right:10px" />';
	}
	else
	{
		echo '<img src="modules/mod_tageler/img/old.png" width="9" height="9" alt="old" style="margin-right:10px" />';
	}

  $link = JRoute::_('index.php?option=com_tageler&controller=tageler_detail&id='.strtolower($t->einheit));
	echo '<a href="'.$link.'">'.$t->name.'</a><br />';
}

$link = JRoute::_('index.php?option=com_tageler');
echo '<div style="margin-left:20px"><a href="'.$link.'">Alle Tageler</a></div><br />';
