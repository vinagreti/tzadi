<h3><?=lang("error_yourBrowserIsIncompatible")?></h3>
<p><small><a href="<?=site_url(lang("rt_contact"))?>"><?=lang("error_needingHelp?")?></a></small></p>
<h4><?=lang("error_browserDetails")?></h4>
<p><?=lang("error_Browser")?>: <?=$agent = $this->agent->browser()?></p>
<p><?=lang("error_Version")?>: <?=$this->agent->version()?></p>
<p><small><?=$agent = $this->agent->agent_string()?></small></p>
<h4><?=lang("error_compatibleUserAgents")?></h4>
<ul>
	<li><?=lang("error_chrome")?> 28. <a href="http://www.google.com/chrome/" target="_blank"><?=lang("error_download")?></a></li>
	<li><?=lang("error_firefox")?> 22. <a href="http://www.mozilla.org/" target="_blank"><?=lang("error_download")?></a></li>
	<li><?=lang("error_opera")?> 15. <a href="http://www.opera.com/download" target="_blank"><?=lang("error_download")?></a></li>
	<li><?=lang("error_maxthon")?> 4. <a href="http://www.maxthon.com/" target="_blank"><?=lang("error_download")?></a></li>
	<li><?=lang("error_ie10")?> 10. <a href="http://windows.microsoft.com/en-us/internet-explorer/ie-10-worldwide-languages" target="_blank"><?=lang("error_download")?></a></li>
</ul>
<h4><?=lang("error_testingUserAgents")?></h4>
<ul>
	<li><?=lang("error_safari")?></li>
</ul>
<h4><?=lang("error_incompatibleUserAgents")?></h4>
<ul>
	<li><?=lang("error_ie9")?></li>
</ul>