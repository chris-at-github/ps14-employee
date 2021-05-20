<?php
defined('TYPO3_MODE') || die();

// ---------------------------------------------------------------------------------------------------------------------
// Neuer Extbase-Typ
if(isset($GLOBALS['TCA']['tt_address']['columns']['record_type']) === true) {
	$GLOBALS['TCA']['tt_address']['columns']['record_type']['config']['items'][] = ['LLL:EXT:employee/Resources/Private/Language/locallang_tca.xlf:tx_employee_domain_model_employee.record_type', \Ps14\Employee\Domain\Model\Employee::class];
}

// ---------------------------------------------------------------------------------------------------------------------
// Neue Paletten
$GLOBALS['TCA']['tt_address']['palettes']['employeeName'] = [
	'showitem' => 'gender, --linebreak--, first_name, last_name, --linebreak--, title, position,'
];

$GLOBALS['TCA']['tt_address']['palettes']['employeeImage'] = [
	'showitem' => 'image,'
];

$GLOBALS['TCA']['tt_address']['palettes']['employeeHidden'] = [
	'showitem' => 'record_type',
	'isHiddenPalette' => 0
];

// ---------------------------------------------------------------------------------------------------------------------
// Neue Feldzuordnungen
$GLOBALS['TCA']['tt_address']['types'][\Ps14\Employee\Domain\Model\Employee::class]['showitem'] = '
		--palette--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_palette.name;employeeName,
		--palette--;;employeeImage,
	,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
		--palette--;;language,
	--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
		--palette--;;paletteHidden, 
		--palette--;;paletteAccess,
		--palette--;;employeeHidden,
';

// ---------------------------------------------------------------------------------------------------------------------
// Images
$GLOBALS['TCA']['tt_address']['types'][\Ps14\Employee\Domain\Model\Employee::class]['columnsOverrides']['image']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = [
	'default' => [
		'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.crop_variant.default',
		'allowedAspectRatios' => [
			'3_4' => [
				'title' => 'LLL:EXT:xo/Resources/Private/Language/locallang_tca.xlf:tx_xo_crop_variant.ratio.3_4',
				'value' => 3 / 4
			],
			'1_1' => [
				'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.1_1',
				'value' => 1
			],
		],
		'selectedRatio' => '3_4',
	],
];

// Override in xna/Configuration/TCA/Overrides/tt_address.php -> falls gesonderte Groeßen noetig sind
//$GLOBALS['TCA']['tt_address']['types'][\Ps14\Employee\Domain\Model\Employee::class]['columnsOverrides']['image']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = [
//];