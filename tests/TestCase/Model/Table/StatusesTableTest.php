<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatusesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StatusesTable Test Case
 */
class StatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StatusesTable
     */
    protected $Statuses;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Statuses',
        'app.Users',
        'app.Projects',
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
        $config = $this->getTableLocator()->exists('Statuses') ? [] : ['className' => StatusesTable::class];
        $this->Statuses = $this->getTableLocator()->get('Statuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Statuses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StatusesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\StatusesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
