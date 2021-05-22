<?php

// ---------------------------------------------------------------------------------------------------------------------
// Flexform Einstellungen

// Flexform Address Plugin
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['employee_frontend'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('employee_frontend', 'FILE:EXT:employee/Configuration/FlexForms/Frontend.xml');