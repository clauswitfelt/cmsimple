<?php

$mcf['security']['password']="hidden";
$mcf['password']['min_length']="hidden";
$mcf['password']['max_remaining_time']="hidden";
$mcf['security']['secret']="random";
$mcf['security']['frame_options']="enum:DENY,SAMEORIGIN,";
$mcf['site']['template']="function:XH_templates";
$mcf['site']['compat']="hidden";
$mcf['language']['default']="function:XH_availableLocalizations";
$mcf['language']['2nd_lang_names']="hidden";
$mcf['languagemenu']['external']="xfunction:XH_registeredLanguagemenuPlugins";
$mcf['mailform']['captcha']="bool";
$mcf['mailform']['lf_only']="+bool";
$mcf['head']['links']="+bool";
$mcf['locator']['show_homepage']="bool";
$mcf['folders']['content']="hidden";
$mcf['folders']['userfiles']="hidden";
$mcf['folders']['downloads']="hidden";
$mcf['folders']['images']="hidden";
$mcf['folders']['media']="hidden";
$mcf['show_hidden']['pages_toc']="bool";
$mcf['show_hidden']['pages_search']="bool";
$mcf['show_hidden']['pages_sitemap']="bool";
$mcf['show_hidden']['path_locator']="bool";
$mcf['editor']['external']="xfunction:XH_registeredEditorPlugins";
$mcf['filebrowser']['external']="xfunction:XH_registeredFilebrowserPlugins";
$mcf['pagemanager']['external']="xfunction:XH_registeredPagemanagerPlugins";
$mcf['menu']['color']="hidden";
$mcf['menu']['highlightcolor']="hidden";
$mcf['menu']['levels']="hidden";
$mcf['menu']['levelcatch']="hidden";
$mcf['menu']['sdoc']="enum:,parent";
$mcf['uri']['length']="hidden";
$mcf['uri']['transliteration']="bool";
$mcf['uri']['lowercase']="bool";
$mcf['canonical']['link']="bool";
$mcf['editmenu']['scroll']="bool";
$mcf['editmenu']['external']="xfunction:XH_registeredEditmenuPlugins";
$mcf['seo']['external']="xfunction:XH_registeredExtendedSEOPlugins";
$mcf['mode']['advanced']="hidden";
$mcf['format']['date']="enum:none,short,medium,long,full";
$mcf['format']['time']="enum:none,short,medium,long,full";
$mcf['validate']['mailto']="+bool";
$mcf['validate']['tel']="+bool";
$mcf['validate']['redir']="+enum:0,1,2,3";
$mcf['debug']['log']="+bool";
/* Hide due to renaming of variables after update from 1.7.x */
$mcf['link']['mailto']="hidden";
$mcf['link']['tel']="hidden";
$mcf['link']['redir']="hidden";
