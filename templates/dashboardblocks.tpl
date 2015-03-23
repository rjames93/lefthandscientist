{extends file="dashboard.tpl"}

{block name="navbar"}
<div class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="javascript:void(0)">
      <img alt="Brand" src="https://lefthandscientist.co.uk/img/hand.png" style="height: 100%; display: inline;">
      The Left Hand Scientist - Dashboard
    </a>
  </div>
</div>
{/block}

{block name="content"}
<div class="container">
<main class="row" id="content">
<div class="col-lg-3"></div>
<div class="col-lg-6">
  <h3> Active Pages </h3>
  {foreach $tree as $branch}
    <a href="#">{$branch}</a><br>
  {/foreach}

  <hr>
</div>
<div class="col-lg-3"></div>
</main>
</div>
{/block}

{block name="footer"}
<footer>
  <div class="container footer">
    <p class="text-muted">
      <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Creative Commons Licence" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">The Left Hand Scientist</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://lefthandscientist.co.uk" property="cc:attributionName" rel="cc:attributionURL">Robert James</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a>.
    </p>
  </div>
</footer>
{/block}

{block name="scripts"}
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
{/block}
