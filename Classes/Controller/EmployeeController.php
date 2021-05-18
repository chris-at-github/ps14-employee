<?php
declare(strict_types=1);

namespace Ps14\Employee\Controller;


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
class EmployeeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * employeeRepository
     * 
     * @var \Ps14\Employee\Domain\Repository\EmployeeRepository
     */
    protected $employeeRepository = null;

    /**
     * @param \Ps14\Employee\Domain\Repository\EmployeeRepository $employeeRepository
     */
    public function injectEmployeeRepository(\Ps14\Employee\Domain\Repository\EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $employees = $this->employeeRepository->findAll();
        $this->view->assign('employees', $employees);
    }
}
