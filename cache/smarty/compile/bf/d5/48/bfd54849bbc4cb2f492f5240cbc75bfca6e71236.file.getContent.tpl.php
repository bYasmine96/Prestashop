<?php /* Smarty version Smarty-3.1.14, created on 2018-08-15 16:59:14
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\modules\prestashop\modules\commentproduct\views\templates\hook\getContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142275b743fc21932e9-20329209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bfd54849bbc4cb2f492f5240cbc75bfca6e71236' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\modules\\prestashop\\modules\\commentproduct\\views\\templates\\hook\\getContent.tpl',
      1 => 1534344987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142275b743fc21932e9-20329209',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'confirmation' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5b743fc21d5a26_25026965',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b743fc21d5a26_25026965')) {function content_5b743fc21d5a26_25026965($_smarty_tpl) {?>
 <?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)){?> 
<div class="alert alert-success">
La configuration a bien ete mise a jour
</div>
<?php }?>

<form method="post" action="" class="defau1tForm form—horizontal">
<div class="pane'|">
<div class="pane'|—head'ing">
<div class="‘icon—cogs"></‘i>
La configuration de mon modu1e
</div>

<div class="form-wrapper">
<div class="form-group">
<label class="control-label c01-1g—3">Activer 1es notes :</label>
<div class="col—lg—9">
<img src="../img/admin/enabled.gif" alt="" />
<input type="radio" id="enable_grades_1" name="enable_grades" value="1" />
<label class="t" for="enable_grades_1">0ui</label>
<img src="../img/admin/disabled.gif" alt="" />
<input type="radio" id="enable_grades_0" name="enable_grades" value="0" checked />
<label class="t" for="enable_grades_0">Non</label>
</div>
</div>
<div class="form-group">
<label class="control—label col—lg—3">Activer 1es commentaires :</label>
<div class="co1—1g—9">
<img src="../img/admin/enabled.gif" alt="" />
<input type="radio" id="enable_comments_l" name="enable_comments" value="1" />
<label class="t" for="enable_comments_1">0ui</label>
<img src="../img/admin/disabled.gif" alt="" />
<input type="radio" id="enable_comments_0" name="enable_comments" value="0"
checked />
<label class="t" for="enable_comments_0">Non</label>
</div>
</div>
</div>
<div class="panel-footer">
<button class="btn btn-default pull-right" name="submit_mymodcomments_form"
value="1" type=”submit">
<i class="process—icon—save"></i> Enregistrer

</button
</div>
</div>
</form>

<?php }} ?>