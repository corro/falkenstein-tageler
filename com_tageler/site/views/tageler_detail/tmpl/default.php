<?php
// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

require_once(JPATH_COMPONENT.DS.'textile'.DS.'textile.php');
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'helpers.php');

$textile = new Textile();

if ($this->tageler->datum >= date('Y-m-d'))
{
?>
    <div class='componentheading' style='border-bottom:1px solid black'>
        <div style='float:right;margin-right:23px'>
            <div style='font-size:10px'>Aktivität vom:</div>
            <?php echo date_mysql2german($this->tageler->datum); ?>
        </div>
        Tageler für <?php echo $this->tageler->name; ?>
         <?php echo getEditButton('com_tageler', 'Tageler editieren', 'tageler_detail', $this->tageler->einheit); ?><br />
        <?php echo $this->tageler->titel; ?>
    </div>
    <div class='imagecontainer' style='background-image: url(<?php echo $this->tageler->image_path; ?>);'></div>
    <table class='contentpaneopen' style='width:400px'>
        <tr>
            <td class='label'>Beginn:</td><td><?php echo $this->tageler->beginn; ?></td>
        </tr>
        <tr>
            <td class='label'>Schluss:</td><td><?php echo $this->tageler->schluss; ?></td>
        </tr>
        <tr>
            <td class='label'>Mitbringen:</td><td><?php echo $textile->TextileRestricted($this->tageler->mitbringen); ?></td>
        </tr>
        <tr>
            <td class='label'>Tenü:</td><td><?php echo $textile->TextileRestricted($this->tageler->tenue); ?></td>
        </tr>
        <?php
            foreach($this->felder as $feld)
            {
                echo "<tr>";
                if ($feld->titel) {
                    echo "<td style='vertical-align:top'>".$feld->titel.":</td><td>".$textile->TextileRestricted($feld->inhalt)."</td>";
                }
                else {
                    echo "<td></td><td>".$textile->TextileRestricted($feld->inhalt)."</td>";
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
                        echo "<td style='vertical-align:top'>".$info->titel.":</td><td>".$textile->TextileRestricted($info->inhalt)."</td>";
                    }
                    else {
                        echo "<td></td><td>".$textile->TextileRestricted($info->inhalt)."</td>";
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
        <?php echo getEditButton('com_tageler', 'Tageler editieren', 'tageler_detail', $this->tageler->einheit); ?>
    </div>
<?php
}