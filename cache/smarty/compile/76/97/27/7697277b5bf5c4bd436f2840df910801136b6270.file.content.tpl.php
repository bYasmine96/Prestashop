<?php /* Smarty version Smarty-3.1.14, created on 2018-08-15 14:21:27
         compiled from "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\modules\prestashop\adminps\themes\default\template\controllers\addons_catalog\content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100055b741ac7cec258-61339956%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7697277b5bf5c4bd436f2840df910801136b6270' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-DevServer-14.1VC9\\modules\\prestashop\\adminps\\themes\\default\\template\\controllers\\addons_catalog\\content.tpl',
      1 => 1395073064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100055b741ac7cec258-61339956',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'display_addons_content' => 0,
    'addons_content' => 0,
    'iso_lang' => 0,
    'iso_currency' => 0,
    'iso_country' => 0,
    'parent_domain' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5b741ac7de9126_16403455',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b741ac7de9126_16403455')) {function content_5b741ac7de9126_16403455($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['display_addons_content']->value){?>
	<?php echo $_smarty_tpl->tpl_vars['addons_content']->value;?>

<?php }else{ ?>
	<iframe frameborder="no" class="clearfix" style="margin:0px;padding:0px;width:100%;height:920px" src="//addons.prestashop.com/iframe/search.php?isoLang=<?php echo $_smarty_tpl->tpl_vars['iso_lang']->value;?>
&isoCurrency=<?php echo $_smarty_tpl->tpl_vars['iso_currency']->value;?>
&isoCountry=<?php echo $_smarty_tpl->tpl_vars['iso_country']->value;?>
&parentUrl=<?php echo $_smarty_tpl->tpl_vars['parent_domain']->value;?>
"></iframe>
<?php }?>
<?php }} ?>