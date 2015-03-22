{extends file="layout.tpl"}
{block name=navbar}
<div class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="javascript:void(0)">
            <img alt="Brand" src="https://lefthandscientist.co.uk/img/hand.png" style="height: 100%; display: inline;">
            {$title}
        </a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">

        <ul class="nav navbar-nav">
        <li class="dropdown">
            <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Also Here<b class="caret"></b></a>
            <ul class="dropdown-menu">
                {foreach $onthislevel as $other}
                <li class="active"><a href="/{$other}">{$other}</a></li>
                {/foreach}
            </ul>
        </li>
    </ul>

        <ul class="nav navbar-nav navbar-right">
          {foreach $breadcrumb as $crumb}
          {if $crumb@last}
          <li class="active"><a href="/{$crumb}">{$crumb}</a></li>
          {else}
          <li><a href="/{$crumb}">{$crumb}</a></li>
          {/if}
          {/foreach}
        </ul>
    </div>
</div>
{/block}
