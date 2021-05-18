<?php
defined('TYPO3_MODE') || die();

// ---------------------------------------------------------------------------------------------------------------------
// Neuer Extbase-Typ
if(isset($GLOBALS['TCA']['tt_address']['columns']['record_type']) === true) {
	$GLOBALS['TCA']['tt_address']['columns']['record_type']['config']['items'][] = ['LLL:EXT:employee/Resources/Private/Language/locallang_db.xlf:tx_contact_domain_model_contact.record_type', \Ps14\Employee\Domain\Model\Employee::class];
}

// ---------------------------------------------------------------------------------------------------------------------
// Neue Paletten
$GLOBALS['TCA']['tt_address']['palettes']['contactName'] = [
	'showitem' => 'gender, --linebreak--, first_name, last_name,'
];

$GLOBALS['TCA']['tt_address']['palettes']['contactContact'] = [
	'showitem' => 'phone, email,'
];

$GLOBALS['TCA']['tt_address']['palettes']['contactHidden'] = [
	'showitem' => 'record_type',
	'isHiddenPalette' => 0
];

// ---------------------------------------------------------------------------------------------------------------------
// Neue Feldzuordnungen
$GLOBALS['TCA']['tt_address']['types'][\Ps14\Employee\Domain\Model\Employee::class]['showitem'] = '
		--palette--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_palette.name;contactName,
		--palette--;LLL:EXT:tt_address/Resources/Private/Language/locallang_db.xlf:tt_address_palette.contact;contactContact,
	,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
		--palette--;;language,
	--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
		--palette--;;paletteHidden, 
		--palette--;;paletteAccess,
		--palette--;;contactHidden,
';