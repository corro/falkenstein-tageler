<?php
// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'helpers.php');

?>

<div class="componentheading">
    Tagelerübersicht
</div>
<table class='tageler'>
    <tr class="header">
        <td class='adjacent'>Einheit</td>
        <td class='adjacent'>Datum</td>
        <td class='adjacent'>Titel</td>
        <td class='adjacent'>Beginn</td>
        <td class='adjacent'>Schluss</td>
    </tr>
    <?php
    foreach($this->allTageler as $tageler)
    {
    ?>
        
    <?php
        if ($tageler->datum >= date("Y-m-d"))
        { ?>
            <tr>
                <td class='adjacent'>
                    <a href='index.php?option=com_tageler&controller=tageler_detail&cid[]=<?php echo $tageler->einheit; ?>'>
                        <?php echo $tageler->name; ?>
                    </a>
                </td>
                <td class='adjacent'><?php echo date_mysql2german($tageler->datum); ?></td>
                <td class='adjacent'><?php echo $tageler->titel; ?></td>
                <td class='adjacent'><?php echo $tageler->beginn; ?></td>
                <td class='adjacent'><?php echo $tageler->schluss; ?></td>
            </tr>
    <?php
        }
        else
        { ?>
            <tr>
                <td class='adjacent'>
                    <a href='index.php?option=com_tageler&controller=tageler_detail&cid[]=<?php echo $tageler->einheit; ?>'>
                        <?php echo $tageler->name; ?>
                    </a>
                </td>
                <td class='adjacent' colspan='4' style='font-style:italic'>Kein aktueller Tageler vorhanden</td>
            </tr>
    <?php
        }
    } ?>
</table>