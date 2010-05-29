<?php defined('_JEXEC') or die('Restricted access');

function date_mysql2german($date)
{
    $d    =    explode('-',$date);
    return    sprintf('%02d.%02d.%04d', $d[2], $d[1], $d[0]);
}
JHTML::_('behavior.tooltip');
?>
<form action="index.php?option=com_tageler" method="post" name="adminForm">
<div id="editcell">
    <table class="adminlist">
    <thead>
        <tr>
            <th width='15'>Einh.</th>
            <th width='10'></th>
            <!--<th><?php echo JHTML::_( 'grid.sort', 'Name', 'name', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th><?php echo JHTML::_( 'grid.sort', 'Datum', 'datum', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th><?php echo JHTML::_( 'grid.sort', 'Titel', 'titel', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th><?php echo JHTML::_( 'grid.sort', 'Beginn', 'beginn', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th><?php echo JHTML::_( 'grid.sort', 'Schluss', 'schluss', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th><?php echo JHTML::_( 'grid.sort', 'Mitbringen', 'mitbringen', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th><?php echo JHTML::_( 'grid.sort', 'Tenue', 'tenue', $this->lists['order_Dir'], $this->lists['order']); ?></th>-->
            <th>Name</th>
            <th>Datum</th>
            <th>Titel</th>
            <th>Beginn</th>
            <th>Schluss</th>
            <th>Mitbringen</th>
            <th>Tenue</th>
        </tr>
    </thead>
    <?php
    $i = 0;
    $k = 0;
    foreach($this->tageler as $t)
    {
        $checked    = JHTML::_( 'grid.id', $i, $t->einheit );
    ?>
        <tr class='<?php echo 'row'.$k; ?>'>
            <td><?php echo $t->einheit; ?></td>
            <td><input type="radio" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $t->einheit; ?>" onclick="isChecked(this.checked);" /></td>
            <td>
                <span class='editlinktip hasTip' title='<?php echo JText::_( 'Edit' );?>::<?php echo $t->name; ?>'>
                    <a href='index.php?option=com_tageler&task=edit&cid[]=<?php echo $t->einheit; ?>'>
                        <?php echo $t->name; ?>
                    </a>
                </span>
            </td>
            <td><?php echo date_mysql2german($t->datum); ?></td>
            <td><?php echo $t->titel; ?></td>
            <td><?php echo $t->beginn; ?></td>
            <td><?php echo $t->schluss; ?></td>
            <td><?php echo $t->mitbringen; ?></td>
            <td><?php echo $t->tenue; ?></td>
        </tr>
    <?php
        $k = 1 - $k;
        $i += 1;
    } ?>
    </table>
</div>

<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
<input type="hidden" name="option" value="com_tageler" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="tageler" />
<input type='hidden' name='view' value='tagelers' />
 
</form>
