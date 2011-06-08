<?php

function date_mysql2german($date)
{
    $d    =    explode("-",$date);
    return    sprintf("%02d.%02d.%04d", $d[2], $d[1], $d[0]);
}

function getEditButton($component, $title, $controller, $target)
{
    $user =& JFactory::getUser();
    if ($user->authorise('core.manage', $component))
    {
        return '<span class="hasTip" title="'.$title.'">
                    <a href="index.php?option='.$component.'&controller='.$controller.'&task=edit&cid[]='.$target.'">
                        <img src="images/M_images/edit.png" alt="edit" />
                    </a>
                </span>';
    }
    return '';
}
