<?php defined('_JEXEC') or die('Restricted access');

function date_mysql2german($date)
{
    $d    =    explode('-',$date);
    return    sprintf('%02d.%02d.%04d', $d[2], $d[1], $d[0]);
}
?>
<form action="index.php" method="post" name="adminForm">
<div id="editcell">
    <table class="adminlist">
    <thead>
        <tr>
            <th><?php echo JHTML::_( 'grid.sort', 'Einheit', 'einheit', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th width="20">
                <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->tageler ); ?>);" />
            </th>
            <th><?php echo JHTML::_( 'grid.sort', 'Name', 'name', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th><?php echo JHTML::_( 'grid.sort', 'Datum', 'datum', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th><?php echo JHTML::_( 'grid.sort', 'Titel', 'titel', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th><?php echo JHTML::_( 'grid.sort', 'Beginn', 'beginn', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th><?php echo JHTML::_( 'grid.sort', 'Schluss', 'schluss', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th><?php echo JHTML::_( 'grid.sort', 'Mitbringen', 'mitbringen', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th><?php echo JHTML::_( 'grid.sort', 'Tenue', 'tenue', $this->lists['order_Dir'], $this->lists['order']); ?></th>
        </tr>
    </thead>
    <?php
    $i = 0;
    foreach($this->tageler as $t)
    {
        $checked    = JHTML::_( 'grid.id', $i, $t->einheit );
    ?>
        <tr>
            <td><?php echo $t->einheit; ?></td>
            <td><?php echo $checked; ?></td>
            <td><?php echo $t->name; ?></td>
            <td><?php echo date_mysql2german($t->datum); ?></td>
            <td><?php echo $t->titel; ?></td>
            <td><?php echo $t->beginn; ?></td>
            <td><?php echo $t->schluss; ?></td>
            <td><?php echo $t->mitbringen; ?></td>
            <td><?php echo $t->tenue; ?></td>
        </tr>
    <?php
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
 
</form>
