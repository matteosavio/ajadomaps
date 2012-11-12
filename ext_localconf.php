<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Mapdisplay',
	array(
		'Map' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Map' => 'create, update, delete',
		
	)
);

?>