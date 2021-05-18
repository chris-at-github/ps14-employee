<?php
defined('TYPO3_MODE') || die();

call_user_func(function() {

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Employee',
		'Frontend',
		[
			\Ps14\Employee\Controller\EmployeeController::class => 'listing'
		],
		// non-cacheable actions
		[
			\Ps14\Employee\Controller\EmployeeController::class => ''
		]
	);

	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:employee/Configuration/TSConfig/Page.t3s">'
	);

	$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
	$iconRegistry->registerIcon(
		'employee-plugin-frontend',
		\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
		['source' => 'EXT:employee/Resources/Public/Icons/user_plugin_frontend.svg']
	);
});