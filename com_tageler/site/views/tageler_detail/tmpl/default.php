<?php
// Sicherheitscheck
defined('_JEXEC') or die('Restricted access');

JHTML::_('behavior.tooltip');
require_once(JPATH_COMPONENT.'/vendor/autoload.php');
require_once(JPATH_COMPONENT_ADMINISTRATOR.'/helpers/helpers.php');

$parser = new \Netcarver\Textile\Parser();
?>

<h2 class="article-title">
    Tageler <?php echo $this->tageler->name; ?>
    <?php echo getEditButton('com_tageler', 'Tageler editieren', 'tageler_detail', $this->tageler->einheit); ?>
</h2>

<?php
if ($this->tageler->datum >= date('Y-m-d'))
{
?>
    <h3><?php echo $this->tageler->titel; ?></h3>
    <?php if ($this->tageler->image_path): ?>
    <div class="imagecontainer" style="background-image: url(<?php echo $this->tageler->image_path; ?>);"></div>
    <?php endif; ?>
    <table class="contentpaneopen" style="width:400px">
        <tr>
            <td>Datum:</td><td><?php echo date_mysql2german($this->tageler->datum); ?></td>
        </td>
        <tr>
            <td>Beginn:</td><td><?php echo $this->tageler->beginn; ?></td>
        </tr>
        <tr>
            <td>Schluss:</td><td><?php echo $this->tageler->schluss; ?></td>
        </tr>
        <tr>
            <td>Mitbringen:</td>
            <td><?php echo JHtml::_('content.prepare', $parser->parse($this->tageler->mitbringen, false)); ?></td>
        </tr>
        <tr>
            <td>Tenü:</td>
            <td><?php echo JHtml::_('content.prepare', $parser->parse($this->tageler->tenue, false)); ?></td>
        </tr>
        <?php
            foreach($this->felder as $feld)
            {
                echo '<tr>';
                if ($feld->titel) {
                    echo '<td style="vertical-align:top">'.$feld->titel.':</td><td>'.JHtml::_('content.prepare', $parser->parse($feld->inhalt, false)).'</td>';
                }
                else {
                    echo '<td></td><td>'.JHtml::_('content.prepare', $parser->parse($feld->inhalt, false)).'</td>';
                }
                echo '</tr>';
            }
        ?>
        <?php
            if ($this->abtInfos)
            {
                echo '<tr style="height:20px"></tr>';
                foreach($this->abtInfos as $info)
                {
                    echo '<tr style="background:#fff99d">';
                    if ($info->titel) {
                        echo '<td style="vertical-align:top">'.$info->titel.':</td>
                              <td>'.JHtml::_('content.prepare', $parser->parse($info->inhalt, false)).'</td>';
                    }
                    else {
                        echo '<td></td><td>'.JHtml::_('content.prepare', $parser->parse($info->inhalt, false)).'</td>';
                    }
                    echo '</tr>';
                }
            }
        ?>
    </table>
<?php
}
else
{
?>
    <div>
        Kein aktueller Tageler für <?php echo $this->tageler->name; ?> vorhanden
    </div>
<?php
}
