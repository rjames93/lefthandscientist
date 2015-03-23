{extends file="navbar.tpl"}

{block name="content"}
<div class="container">
<main class="row" id="content">
<div class="col-lg-3"></div>
<div class="col-lg-6">
    {$content}
    <div id="{$fragmentid}" class="edit">
        <a href="edit.php"><i id="{$fragmentid}" class="fa fa-cog">{$modified}</i></a>
    </div>
</div>
<div class="col-lg-3"></div>
</main>
</div>
{/block}
