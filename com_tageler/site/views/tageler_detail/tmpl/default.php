<?php
// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

function date_mysql2german($date)
{
    $d    =    explode('-',$date);
    return    sprintf('%02d.%02d.%04d', $d[2], $d[1], $d[0]);
}

function ball2img($str)
{
    return str_replace('*', "<img src='components/com_tageler/img/falkipfeilgruen.gif' />", $str);
}

function getEditButton($tageler)
{
    $user =& JFactory::getUser();
    if ($user->authorize('com_tageler', 'edit'))
    {
        return "<span class='hasTip' title='Tageler editieren'>
                    <a href='index.php?option=com_tageler&controller=tageler_detail&task=edit&cid[]=".$tageler->einheit."'>
                        <img src='images/M_images/edit.png' alt='edit' />
                    </a>
                </span>";
    }
    return '';
}

if ($this->tageler->datum >= date('Y-m-d'))
{
?>
    <style type='text/css'>
        td.label {
            width:120px;
            padding-bottom:10px;
            vertical-align:top;
        }
    </style>

    <div class='componentheading'>
        Tageler für <?php echo $this->tageler->name; ?> am <?php echo date_mysql2german($this->tageler->datum); ?>
         <?php echo getEditButton($this->tageler); ?>
    </div>
    <table class='contentpaneopen'  style='padding-bottom:10px;'>
        <tr>
            <td class='contentheading'>
                <?php echo $this->tageler->titel; ?>
            </td>
        </tr>
    </table>
    <table class='contentpaneopen'>
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
                echo "<tr>";
                if ($feld->titel) {
                    echo "<td style='vertical-align:top'>".$feld->titel.":</td><td>".ball2img(nl2br($feld->inhalt))."</td>";
                }
                else {
                    echo "<td></td><td>".ball2img(nl2br($feld->inhalt))."</td>";
                }
                echo "</tr>";
            }
        ?>
        <?php
            if ($this->abtInfos)
            {
                echo "<tr style='height:20px'></tr>";
                foreach($this->abtInfos as $info)
                {
                    echo "<tr style='background:#fff99d'>";
                    if ($info->titel) {
                        echo "<td style='vertical-align:top'>".$info->titel.":</td><td>".ball2img(nl2br($info->inhalt))."</td>";
                    }
                    else {
                        echo "<td></td><td>".ball2img(nl2br($info->inhalt))."</td>";
                    }
                    echo "</tr>";
                }
            }
        ?>
    </table>
<?php
}
else
{
?>
    <div class="componentheading">
        Kein aktueller Tageler für <?php echo $this->tageler->name; ?> vorhanden
        <?php echo getEditButton($this->tageler); ?>
    </div>
<?php
}