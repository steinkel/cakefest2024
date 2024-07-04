<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectsTrackersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectsTrackersTable Test Case
 */
class ProjectsTrackersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectsTrackersTable
     */
    protected $ProjectsTrackers;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ProjectsTrackers',
        'app.Projects',
        'app.Trackers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProjectsTrackers') ? [] : ['className' => ProjectsTrackersTable::class];
        $this->ProjectsTrackers = $this->getTableLocator()->get('ProjectsTrackers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ProjectsTrackers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProjectsTrackersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProjectsTrackersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
