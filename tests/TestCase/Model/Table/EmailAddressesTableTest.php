<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmailAddressesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmailAddressesTable Test Case
 */
class EmailAddressesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmailAddressesTable
     */
    protected $EmailAddresses;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.EmailAddresses',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EmailAddresses') ? [] : ['className' => EmailAddressesTable::class];
        $this->EmailAddresses = $this->getTableLocator()->get('EmailAddresses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EmailAddresses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EmailAddressesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EmailAddressesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
