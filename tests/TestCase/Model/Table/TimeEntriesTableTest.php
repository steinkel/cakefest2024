<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TimeEntriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TimeEntriesTable Test Case
 */
class TimeEntriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TimeEntriesTable
     */
    protected $TimeEntries;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.TimeEntries',
        'app.Projects',
        'app.Users',
        'app.Issues',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TimeEntries') ? [] : ['className' => TimeEntriesTable::class];
        $this->TimeEntries = $this->getTableLocator()->get('TimeEntries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TimeEntries);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TimeEntriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TimeEntriesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
