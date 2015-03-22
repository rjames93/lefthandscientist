<?php /* Smarty version Smarty-3.1-DEV, created on 2015-03-18 16:01:25
         compiled from "/home/member/rjames93/public_html/lefthandscientist/templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93466335055099dc0bee214-17752025%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0931e9ae3d8126c24a7f465ee4bcbde3280ba0f7' => 
    array (
      0 => '/home/member/rjames93/public_html/lefthandscientist/templates/footer.tpl',
      1 => 1426693997,
      2 => 'file',
    ),
    '1863236713c380f5c21ca95a99b99309531d9805' => 
    array (
      0 => '/home/member/rjames93/public_html/lefthandscientist/templates/content.tpl',
      1 => 1426694482,
      2 => 'file',
    ),
    '0251fbeabf2c5a20d9aad6ceb55632870e74637f' => 
    array (
      0 => '/home/member/rjames93/public_html/lefthandscientist/templates/navbar.tpl',
      1 => 1426691955,
      2 => 'file',
    ),
    '8f514335d7563417413339ad925c9bba9820035a' => 
    array (
      0 => '/home/member/rjames93/public_html/lefthandscientist/templates/layout.tpl',
      1 => 1426694082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93466335055099dc0bee214-17752025',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_55099dc0c5e0a4_29949549',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55099dc0c5e0a4_29949549')) {function content_55099dc0c5e0a4_29949549($_smarty_tpl) {?><html>
<head>
  <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
  <link href="css/roboto.min.css" rel="stylesheet">
  <link href="css/material.min.css" rel="stylesheet">
  <link href="css/ripples.min.css" rel="stylesheet">
  <!-- Custom Style Sheet From Here -->
  <link href="css/custom.css" rel="stylesheet">
</head>
<body>
<div id="wrap">
  
<div class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav">

        </ul>

        <ul class="nav navbar-nav navbar-right">
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
        </ul>
    </div>
</div>


  
<main>

</main>


  
<footer class="footer">
  <div class="container">
    <p class="text-muted">
      <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Creative Commons Licence" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">The Left Hand Scientist</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="lefthandscientist.co.uk" property="cc:attributionName" rel="cc:attributionURL">Robert James</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a>.
    </p>
  </div>
</footer>

</div>
</body>
</html>
<?php }} ?>