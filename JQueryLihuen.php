<?php
$wgExtensionCredits['other'][] = array(
	'name' => 'JQueryLihuen',
	'author' =>'Fernando López', 
	'url' => 'http://lihuen.linti.unlp.edu.ar', 
	'description' => 'Agrega funciones útiles de JQuery y JQueryUI'
);
$wgAutoloadClasses['JQueryLihuen'] = dirname( __FILE__ ) . '/JQueryLihuen.body.php';
$wgHooks['ParserFirstCallInit'][] = 'JQueryLihuen::registerHooks';
$wgExtensionMessagesFiles['JQueryLihuen'] = dirname( __FILE__ ) . '/JQueryLihuen.i18n.php';
$wgResourceModules['ext.JQueryLihuen'] = array(
	'scripts' => array('js/ext.JQueryLihuen.js'),
	'dependencies' => array('jquery.ui.tabs'),
	'localBasePath' => dirname(__FILE__),
	'remoteExtPath' => 'JQueryLihuen'
);
?>
