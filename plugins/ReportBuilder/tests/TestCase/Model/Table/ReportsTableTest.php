<?php
declare(strict_types=1);

namespace ReportBuilder\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use ReportBuilder\Model\Table\ReportsTable;

/**
 * ReportBuilder\Model\Table\ReportsTable Test Case
 */
class ReportsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \ReportBuilder\Model\Table\ReportsTable
     */
    protected $Reports;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'plugin.ReportBuilder.Reports',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Reports') ? [] : ['className' => ReportsTable::class];
        $this->Reports = $this->getTableLocator()->get('Reports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Reports);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \ReportBuilder\Model\Table\ReportsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test goToAssociation method
     *
     * @return void
     * @uses \ReportBuilder\Model\Table\ReportsTable::goToAssociation()
     */
    public function testGoToAssociation(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test setTableLocator method
     *
     * @return void
     * @uses \ReportBuilder\Model\Table\ReportsTable::setTableLocator()
     */
    public function testSetTableLocator(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getTableLocator method
     *
     * @return void
     * @uses \ReportBuilder\Model\Table\ReportsTable::getTableLocator()
     */
    public function testGetTableLocator(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test fetchTable method
     *
     * @return void
     * @uses \ReportBuilder\Model\Table\ReportsTable::fetchTable()
     */
    public function testFetchTable(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
