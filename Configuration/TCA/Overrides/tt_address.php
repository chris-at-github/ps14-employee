<?php
defined('TYPO3_MODE') || die();


if (!isset($GLOBALS['TCA']['tt_address']['ctrl']['type'])) {
    // no type field defined, so we define it here. This will only happen the first time the extension is installed!!
    $GLOBALS['TCA']['tt_address']['ctrl']['type'] = 'tx_extbase_type';
    $tempColumnstx_employee_tt_address = [];
    $tempColumnstx_employee_tt_address[$GLOBALS['TCA']['tt_address']['ctrl']['type']] = [
        'exclude' => true,
        'label'   => 'LLL:EXT:employee/Resources/Private/Language/locallang_db.xlf:tx_employee.tx_extbase_type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['',''],
                ['Employee','Tx_Employee_Employee']
            ],
            'default' => 'Tx_Employee_Employee',
            'size' => 1,
            'maxitems' => 1,
        ]
    ];
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_address', $tempColumnstx_employee_tt_address);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tt_address',
    $GLOBALS['TCA']['tt_address']['ctrl']['type'],
    '',
    'after:' . $GLOBALS['TCA']['tt_address']['ctrl']['label']
);





/* inherit and extend the show items from the parent class */

if (isset($GLOBALS['TCA']['tt_address']['types']['0']['showitem'])) {
    $GLOBALS['TCA']['tt_address']['types']['Tx_Employee_Employee']['showitem'] = $GLOBALS['TCA']['tt_address']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['tt_address']['types'])) {
    // use first entry in types array
    $tt_address_type_definition = reset($GLOBALS['TCA']['tt_address']['types']);
    $GLOBALS['TCA']['tt_address']['types']['Tx_Employee_Employee']['showitem'] = $tt_address_type_definition['showitem'];
} else {
    $GLOBALS['TCA']['tt_address']['types']['Tx_Employee_Employee']['showitem'] = '';
}
$GLOBALS['TCA']['tt_address']['types']['Tx_Employee_Employee']['showitem'] .= ',--div--;LLL:EXT:employee/Resources/Private/Language/locallang_db.xlf:tx_employee_domain_model_employee,';
$GLOBALS['TCA']['tt_address']['types']['Tx_Employee_Employee']['showitem'] .= '';


$GLOBALS['TCA']['tt_address']['columns'][$GLOBALS['TCA']['tt_address']['ctrl']['type']]['config']['items'][] = ['LLL:EXT:employee/Resources/Private/Language/locallang_db.xlf:tt_address.tx_extbase_type.Tx_Employee_Employee','Tx_Employee_Employee'];
