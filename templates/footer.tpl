{extends file="content.tpl"}

{block name=footer}
<footer class="footer">
  <div class="social-media">
    {foreach $socialmedia as $site}
    <li><a href="/{$site}">{$site@key}</a></li>
    {/foreach}
  </div>
  <br>
  <div class="container">
    <p class="text-muted">
      <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Creative Commons Licence" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">The Left Hand Scientist</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://lefthandscientist.co.uk" property="cc:attributionName" rel="cc:attributionURL">Robert James</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a>.
    </p>
  </div>
</footer>
{/block}
