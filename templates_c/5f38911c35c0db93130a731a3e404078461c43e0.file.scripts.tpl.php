<?php /* Smarty version Smarty-3.1-DEV, created on 2015-03-23 17:26:19
         compiled from "/home/member/rjames93/public_html/lefthandscientist/templates/scripts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5704396635509a2b29cdb09-88028471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f38911c35c0db93130a731a3e404078461c43e0' => 
    array (
      0 => '/home/member/rjames93/public_html/lefthandscientist/templates/scripts.tpl',
      1 => 1426764537,
      2 => 'file',
    ),
    '0931e9ae3d8126c24a7f465ee4bcbde3280ba0f7' => 
    array (
      0 => '/home/member/rjames93/public_html/lefthandscientist/templates/footer.tpl',
      1 => 1427131577,
      2 => 'file',
    ),
    '1863236713c380f5c21ca95a99b99309531d9805' => 
    array (
      0 => '/home/member/rjames93/public_html/lefthandscientist/templates/content.tpl',
      1 => 1427128469,
      2 => 'file',
    ),
    '0251fbeabf2c5a20d9aad6ceb55632870e74637f' => 
    array (
      0 => '/home/member/rjames93/public_html/lefthandscientist/templates/navbar.tpl',
      1 => 1427131138,
      2 => 'file',
    ),
    '8f514335d7563417413339ad925c9bba9820035a' => 
    array (
      0 => '/home/member/rjames93/public_html/lefthandscientist/templates/layout.tpl',
      1 => 1426764648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5704396635509a2b29cdb09-88028471',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5509a2b2a4ee03_84613880',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5509a2b2a4ee03_84613880')) {function content_5509a2b2a4ee03_84613880($_smarty_tpl) {?><html>
<head>
  <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">  
  <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
  <link href="https://lefthandscientist.co.uk/css/roboto.min.css" rel="stylesheet">
  <link href="https://lefthandscientist.co.uk/css/material.min.css" rel="stylesheet">
  <link href="https://lefthandscientist.co.uk/css/ripples.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!-- Custom Style Sheet From Here -->
  <link href="https://lefthandscientist.co.uk/css/custom.css" rel="stylesheet">
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
        <a class="navbar-brand" href="javascript:void(0)">
            <img alt="Brand" src="https://lefthandscientist.co.uk/img/hand.png" style="height: 25px; display: inline;">
            <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

        </a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">

        <ul class="nav navbar-nav navbar-right">
        <?php if ($_smarty_tpl->tpl_vars['onitsown']->value=='true'){?>

        <?php }else{ ?>
        <li class="dropdown">
            <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Also Here<b class="caret"></b></a>
            <ul class="dropdown-menu">

                <?php  $_smarty_tpl->tpl_vars['other'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['other']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['onthislevel']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['other']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['other']->key => $_smarty_tpl->tpl_vars['other']->value){
$_smarty_tpl->tpl_vars['other']->_loop = true;
 $_smarty_tpl->tpl_vars['other']->index++;
 $_smarty_tpl->tpl_vars['other']->first = $_smarty_tpl->tpl_vars['other']->index === 0;
?>
                    <?php if ($_smarty_tpl->tpl_vars['other']->first){?>
                        <li class="active"><a href="/<?php echo $_smarty_tpl->tpl_vars['other']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['other']->value;?>
</a></li>
                        <li class="divider"></li>
                    <?php }else{ ?>
                        <li><a href="/<?php echo $_smarty_tpl->tpl_vars['other']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['other']->value;?>
</a></li>
                    <?php }?>
                <?php } ?>
            </ul>
        </li>
        <?php }?>
    </ul>


    </div>
</div>


  
<div class="container">
<main class="row" id="content">
<div class="col-lg-3"></div>
<div class="col-lg-6">
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

    <div id="<?php echo $_smarty_tpl->tpl_vars['fragmentid']->value;?>
" class="edit">
        <a href="edit.php"><i id="<?php echo $_smarty_tpl->tpl_vars['fragmentid']->value;?>
" class="fa fa-cog"><?php echo $_smarty_tpl->tpl_vars['modified']->value;?>
</i></a>
    </div>
</div>
<div class="col-lg-3"></div>
</main>
</div>


  
<footer class="footer">
  <br>
  <div id="breadcrumbs">
    <ol class="breadcrumb">
    <?php if ($_smarty_tpl->tpl_vars['is404']->value=='true'){?>
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
                <li class="active"><a href="/"><?php echo $_smarty_tpl->tpl_vars['crumb']->value;?>
</a></li>
                <?php }else{ ?>
                <li><a href="/"><?php echo $_smarty_tpl->tpl_vars['crumb']->value;?>
</a></li>
              <?php }?>
          <?php } ?>
      <?php }else{ ?>
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
      <?php }?>
    </ol>
  </div>


  <div class="social-media">
    <?php  $_smarty_tpl->tpl_vars['site'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['site']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['socialmedia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['site']->key => $_smarty_tpl->tpl_vars['site']->value){
$_smarty_tpl->tpl_vars['site']->_loop = true;
?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['site']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['site']->key;?>
</a></li>
    <?php } ?>
  </div>
  <br>
  <div class="container">
    <p class="text-muted">
      <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Creative Commons Licence" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">The Left Hand Scientist</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://lefthandscientist.co.uk" property="cc:attributionName" rel="cc:attributionURL">Robert James</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a>.
    </p>
  </div>
</footer>

</div>

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script src="https://lefthandscientist.co.uk/js/ripples.min.js"></script>
<script src="https://lefthandscientist.co.uk/js/material.min.js"></script>
<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>

</body>
</html>
<?php }} ?>