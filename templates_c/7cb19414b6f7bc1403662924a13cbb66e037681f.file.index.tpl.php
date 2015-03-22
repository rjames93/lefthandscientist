<?php /* Smarty version Smarty-3.1-DEV, created on 2015-03-18 14:47:25
         compiled from "/home/member/rjames93/public_html/lefthandscientist/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3731025675506ee6090f754-83466959%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cb19414b6f7bc1403662924a13cbb66e037681f' => 
    array (
      0 => '/home/member/rjames93/public_html/lefthandscientist/templates/index.tpl',
      1 => 1426690043,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3731025675506ee6090f754-83466959',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5506ee6099ebb6_07069068',
  'variables' => 
  array (
    'breadcrumb' => 0,
    'crumb' => 0,
    'socialmedia' => 0,
    'link' => 0,
    'service' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5506ee6099ebb6_07069068')) {function content_5506ee6099ebb6_07069068($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
      <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
      <link href="dist/css/roboto.min.css" rel="stylesheet">
      <link href="dist/css/material.min.css" rel="stylesheet">
      <link href="dist/css/ripples.min.css" rel="stylesheet">
</head>
<body>
  

  <ol class="breadcrumb">
  <?php  $_smarty_tpl->tpl_vars['crumb'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['crumb']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumb']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['crumb']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['crumb']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['crumb']->key => $_smarty_tpl->tpl_vars['crumb']->value){
$_smarty_tpl->tpl_vars['crumb']->_loop = true;
 $_smarty_tpl->tpl_vars['crumb']->iteration++;
 $_smarty_tpl->tpl_vars['crumb']->last = $_smarty_tpl->tpl_vars['crumb']->iteration === $_smarty_tpl->tpl_vars['crumb']->total;
?>
  <?php if ($_smarty_tpl->tpl_vars['crumb']->last){?>
  <li class="active"><a href="/<?php echo $_smarty_tpl->tpl_vars['crumb']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['crumb']->value;?>
</a></li>
  <?php }else{ ?>
  <li><a href="/<?php echo $_smarty_tpl->tpl_vars['crumb']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['crumb']->value;?>
</a></li>
  <?php }?>
  <?php } ?>
  </ol>

  <ul>
  <?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_smarty_tpl->tpl_vars['service'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['socialmedia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
$_smarty_tpl->tpl_vars['link']->_loop = true;
 $_smarty_tpl->tpl_vars['service']->value = $_smarty_tpl->tpl_vars['link']->key;
?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['service']->value;?>
</a></li>
  <?php } ?>
  </ul>

</body>

</html>
<?php }} ?>