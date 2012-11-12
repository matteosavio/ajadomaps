<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Mapdisplay',
	'Ajado Maps: Firmenstandorte'
);

//$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . mapdisplay;
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' .mapdisplay. '.xml');






t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Ajado maps');


t3lib_extMgm::addLLrefForTCAdescr('tx_ajadomaps_domain_model_pin', 'EXT:ajadomaps/Resources/Private/Language/locallang_csh_tx_ajadomaps_domain_model_pin.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ajadomaps_domain_model_pin');
$TCA['tx_ajadomaps_domain_model_pin'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ajadomaps/Resources/Private/Language/locallang_db.xml:tx_ajadomaps_domain_model_pin',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'sortby' => 'sorting',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Pin.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ajadomaps_domain_model_pin.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ajadomaps_domain_model_map', 'EXT:ajadomaps/Resources/Private/Language/locallang_csh_tx_ajadomaps_domain_model_map.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ajadomaps_domain_model_map');
$TCA['tx_ajadomaps_domain_model_map'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ajadomaps/Resources/Private/Language/locallang_db.xml:tx_ajadomaps_domain_model_map',
		'label' => 'image',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'sortby' => 'sorting',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Map.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ajadomaps_domain_model_map.gif'
	),
);

t3lib_div::loadTCA('tt_content');

$tempColumns = array (
    "tx_ajadomaps_maps" => Array (
			"exclude" => 1,
			"label" => "Maps",
			"config" => Array (
				"type" => "inline",
				"foreign_table" => "tx_ajadomaps_domain_model_map",
				"foreign_field" => "parentid",
				"foreign_table_field" => "parenttable",
				"maxitems" => 100,
				'appearance' => array(
					'showSynchronizationLink' => 1,
					'showAllLocalizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showRemovedLocalizationRecords' => 1,
					'enabledControls' => array(
						'new' => 1,
						'delete' => 1,
						'sort' => 1,
						'hide' => 1,
						'dragdrop' => 1,
					),
				),
				'behaviour' => array(
					'localizationMode' => 'select',
				),
			)
    ),
	
);


t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content', $tempColumns, 1);

t3lib_div::loadTCA('tt_content');

$TCA['tt_content']['types']['list']['subtypes_excludelist']['ajadomaps_mapdisplay']='layout,select_key,pages,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist']['ajadomaps_mapdisplay']='tx_ajadomaps_maps';
?>