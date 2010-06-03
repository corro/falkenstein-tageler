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

function replace_special($text)
{
    $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '<a href="\\1">\\1</a>', $text);
    $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '\\1<a href="http://\\2">\\2</a>', $text);
    $text = eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})', '<a href="mailto:\\1">\\1</a>', $text);
    $text = ball2img($text);
    $text = nl2br($text);

    return $text;
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
        table {
            border-style:none;
            border-collapse:collapse;
        }
        .imagecontainer {
            width:170px;
            float:right;
/*             background-color:red; */
            background-image: url(<?php echo $this->tageler->image_path; ?>);
            background-repeat: no-repeat;
            height:170px;
        }
    </style>

    <div class='componentheading' style='border-bottom:1px solid black'>
        <div style='float:right;margin-right:23px'>
            <div style='font-size:10px'>Aktivität vom:</div>
            <?php echo date_mysql2german($this->tageler->datum); ?>
        </div>
        Tageler für <?php echo $this->tageler->name; ?>
         <?php echo getEditButton($this->tageler); ?><br />
        <?php echo $this->tageler->titel; ?>
    </div>
    <div class='imagecontainer'>
        
    </div>
    <table class='contentpaneopen' style='width:370px'>
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
                    echo "<td style='vertical-align:top'>".$feld->titel.":</td><td>".replace_special($feld->inhalt)."</td>";
                }
                else {
                    echo "<td></td><td>".replace_special($feld->inhalt)."</td>";
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
                        echo "<td style='vertical-align:top'>".$info->titel.":</td><td>".replace_special($info->inhalt)."</td>";
                    }
                    else {
                        echo "<td></td><td>".replace_special($info->inhalt)."</td>";
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
    <div class='componentheading' style='border-bottom:1px solid black'>
        Kein aktueller Tageler für <?php echo $this->tageler->name; ?> vorhanden
        <?php echo getEditButton($this->tageler); ?>
    </div>
<?php
}