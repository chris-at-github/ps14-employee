<?php
declare(strict_types=1);

namespace Ps14\Employee\Controller;

use Ps14\Employee\Domain\Repository\EmployeeRepository;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 *
 * This file is part of the "Ps14 Employee" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Christian Pschorr <pschorr.christian@gmail.com>
 */

/**
 * EmployeeController
 */
class EmployeeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * employeeRepository
	 *
	 * @var EmployeeRepository
	 */
	protected $employeeRepository = null;

	/**
	 * @param EmployeeRepository $employeeRepository
	 */
	public function __construct(EmployeeRepository $employeeRepository) {
		$this->employeeRepository = $employeeRepository;
	}

	/**
	 * @return void
	 */
	public function listingAction() {
		$this->view->assign('employees', $this->employeeRepository->findAll());
	}
}
