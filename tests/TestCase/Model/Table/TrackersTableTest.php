<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrackersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrackersTable Test Case
 */
class TrackersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TrackersTable
     */
    protected $Trackers;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Trackers',
        'app.Issues',
        'app.Projects',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Trackers') ? [] : ['className' => TrackersTable::class];
        $this->Trackers = $this->getTableLocator()->get('Trackers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Trackers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TrackersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
