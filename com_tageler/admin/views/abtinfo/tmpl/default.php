<?php defined('_JEXEC') or die('Restricted access');

JHTML::_('behavior.tooltip');
?>
<script language="javascript" type="text/javascript">

Joomla.submitbutton = function submitbutton(pressbutton){
  var form = document.adminForm;
   if (pressbutton)
   {
     form.task.value=pressbutton;
   }
    if ((pressbutton=='edit')||(pressbutton=='add')||(pressbutton=='remove'))
     {
      form.controller.value="abtinfo_detail";
     }
    try {
        form.onsubmit();
        }
    catch(e){}
    submitform(pressbutton);
}
</script>

<form action="index.php?option=com_tageler" method="post" id="adminForm" name="adminForm">
<div id="editcell">
    <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th width='10'>#</th>
            <th width="20">
                <?php echo JHtml::_('grid.checkall'); ?>
            </th>
            <th>Titel</th>
            <th>Inhalt</th>
            <th>Index</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    $k = 0;
    foreach($this->abtInfos as $a)
    {
    ?>
        <tr class='<?php echo 'row'.$k; ?>'>
            <td><?php echo $a->id; ?></td>
            <td><?php echo JHtml::_('grid.id', $i, $a->id); ?></td>
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
        $k = 1 - $k;
    } ?>
    </tbody>
    </table>
</div>

<input type="hidden" name="option" value="com_tageler" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="abtinfo" />
 
</form>
