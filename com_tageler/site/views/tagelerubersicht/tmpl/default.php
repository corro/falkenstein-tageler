<?php
// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

function date_mysql2german($date)
{
    $d    =    explode("-",$date);
    
    return    sprintf("%02d.%02d.%04d", $d[2], $d[1], $d[0]);
}
?>

<style type='text/css'>
    table.tageler {
        font: 11px/24px Verdana, Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width:100%;
        }

    tr.header td {
        background: #006f0d;
        color:white;
        border-top: 1px solid #CCC;
        font-weight:bold;
        }

    td.adjacent {
        border-left: 1px solid #CCC;
        border-right: 1px solid #CCC;
        border-bottom: 1px solid #CCC;
        padding: 0 0.5em;
        }
</style>

<div class="componentheading">
    Tagelerübersicht
</div>
<table class='tageler'>
    <tr class="header">
        <td class='adjacent'>Einheit</td>
        <td class='adjacent'>Titel</td>
        <td class='adjacent'>Beginn</td>
        <td class='adjacent'>Schluss</td>
    </tr>
    <tr><td colspan='4'></td></tr>
    <?php
    foreach($this->allTageler as $tageler)
    {
    ?>
        
    <?php
        if ($tageler->datum >= date("Y-m-d"))
        { ?>
            <tr>
                <td class='adjacent'>
                    <a href='index.php?option=com_tageler&view=tageler&einheit=<?php echo $tageler->einheit; ?>'>
                        <?php echo ucwords($tageler->einheit); ?>
                    </a>
                </td>
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
                    <a href='index.php?option=com_tageler&view=tageler&einheit=<?php echo $tageler->einheit; ?>'>
                        <?php echo ucwords($tageler->einheit); ?>
                    </a>
                </td>
                <td class='adjacent' colspan='3'>Kein aktueller Tageler vorhanden</td>
            </tr>
    <?php
        }
    } ?>
</table>