<?php defined('_JEXEC') or die('Restricted access');

JHTML::_('behavior.tooltip');
?>
<script language="javascript" type="text/javascript">

function submitform(pressbutton){
var form = document.adminForm;
   if (pressbutton)
    {form.task.value=pressbutton;}
    
    if (pressbutton=='edit')
     {
      form.controller.value="abtinfo_detail";
     }
    try {
        form.onsubmit();
        }
    catch(e){}
    
    form.submit();
}
</script>

<form action="index.php?option=com_tageler" method="post" name="adminForm">
<div id="editcell">
    <table class="adminlist">
    <thead>
        <tr>
            <th width='10'>#</th>
            <th width="20">
                <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->abtInfos ); ?>);" />
            </th>
            <!--<th width='20%'><?php echo JHTML::_( 'grid.sort', 'Titel', 'titel', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th><?php echo JHTML::_( 'grid.sort', 'Inhalt', 'inhalt', $this->lists['order_Dir'], $this->lists['order']); ?></th>
            <th width='15'><?php echo JHTML::_( 'grid.sort', 'Index', 'idx', $this->lists['order_Dir'], $this->lists['order']); ?></th>-->
            <th>Titel</th>
            <th>Inhalt</th>
            <th>Index</th>
        </tr>
    </thead>
    <?php
    $i = 0;
    $k = 0;
    foreach($this->abtInfos as $a)
    {
        $checked = JHTML::_( 'grid.id', $i, $a->id );
    ?>
        <tr class='<?php echo 'row'.$k; ?>'>
            <td><?php echo $a->id; ?></td>
            <td><?php echo $checked; ?></td>
            <td>
                <span class='editlinktip hasTip' title='Edit::<?php echo $a->titel; ?>'>
                    <a href='index.php?option=com_tageler&controller=abtinfo_detail&task=edit&cid[]=<?php echo $a->id; ?>'>
                        <?php echo $a->titel; ?>
                    </a>
                </span>
            </td>
            <td><?php echo $a->inhalt; ?></td>
            <td><?php echo $a->idx; ?></td>
        </tr>
    <?php
        $i += 1;
        $k = 1 - k;
    } ?>
    </table>
</div>

<!--<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />-->
<input type="hidden" name="option" value="com_tageler" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="abtinfo" />
 
</form>
