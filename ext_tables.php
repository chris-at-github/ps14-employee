<?php
defined('TYPO3_MODE') || die();

call_user_func(static function() {

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		'Employee',
		'Frontend',
		'LLL:EXT:employee/Resources/Private/Language/locallang_tca.xlf:plugin_frontend.name'
	);
});