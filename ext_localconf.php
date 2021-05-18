<?php
defined('TYPO3_MODE') || die();

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Employee',
            'Frontend',
            [
                \Ps14\Employee\Controller\EmployeeController::class => 'list'
            ],
            // non-cacheable actions
            [
                \Ps14\Employee\Controller\EmployeeController::class => ''
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        frontend {
                            iconIdentifier = employee-plugin-frontend
                            title = LLL:EXT:employee/Resources/Private/Language/locallang_db.xlf:tx_employee_frontend.name
                            description = LLL:EXT:employee/Resources/Private/Language/locallang_db.xlf:tx_employee_frontend.description
                            tt_content_defValues {
                                CType = list
                                list_type = employee_frontend
                            }
                        }
                    }
                    show = *
                }
           }'
        );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'employee-plugin-frontend',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:employee/Resources/Public/Icons/user_plugin_frontend.svg']
			);
		
    }
);
