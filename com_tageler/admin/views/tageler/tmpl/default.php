<?php defined('_JEXEC') or die('Restricted access');

JHTML::_('behavior.tooltip');
require_once(JPATH_COMPONENT_ADMINISTRATOR.'/helpers/helpers.php');

?>
<script language="javascript" type="text/javascript">

function submitform(pressbutton){
var form = document.adminForm;
   if (pressbutton)
    {form.task.value=pressbutton;}
    
    if (pressbutton=='edit')
     {
      form.controller.value="tageler_detail";
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
            <th width='15'>Einh.</th>
            <th width='10'></th>
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
                    <a href='index.php?option=com_tageler&controller=tageler_detail&task=edit&cid[]=<?php echo $t->einheit; ?>'>
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

<input type="hidden" name="option" value="com_tageler" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="tageler" />
</form>
