<?php
declare(strict_types=1);

namespace ReportBuilder\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use ReportBuilder\Model\Table\AssociationsTable;

/**
 * ReportBuilder\Model\Table\AssociationsTable Test Case
 */
class AssociationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \ReportBuilder\Model\Table\AssociationsTable
     */
    protected $Associations;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'plugin.ReportBuilder.Associations',
        'plugin.ReportBuilder.RbReports',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Associations') ? [] : ['className' => AssociationsTable::class];
        $this->Associations = $this->getTableLocator()->get('Associations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Associations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \ReportBuilder\Model\Table\AssociationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \ReportBuilder\Model\Table\AssociationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
