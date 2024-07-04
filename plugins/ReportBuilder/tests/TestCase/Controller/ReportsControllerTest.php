<?php
declare(strict_types=1);

namespace ReportBuilder\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use ReportBuilder\Controller\ReportsController;

/**
 * ReportBuilder\Controller\ReportsController Test Case
 *
 * @uses \ReportBuilder\Controller\ReportsController
 */
class ReportsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'plugin.ReportBuilder.Reports',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \ReportBuilder\Controller\ReportsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \ReportBuilder\Controller\ReportsController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \ReportBuilder\Controller\ReportsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \ReportBuilder\Controller\ReportsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \ReportBuilder\Controller\ReportsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
