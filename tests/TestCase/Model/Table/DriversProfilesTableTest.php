<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DriversProfilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DriversProfilesTable Test Case
 */
class DriversProfilesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DriversProfilesTable
     */
    protected $DriversProfiles;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DriversProfiles',
        'app.Drivers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DriversProfiles') ? [] : ['className' => DriversProfilesTable::class];
        $this->DriversProfiles = TableRegistry::getTableLocator()->get('DriversProfiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DriversProfiles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
