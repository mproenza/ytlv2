<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DriversLocalitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DriversLocalitiesTable Test Case
 */
class DriversLocalitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DriversLocalitiesTable
     */
    protected $DriversLocalities;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DriversLocalities',
        'app.Drivers',
        'app.Localities',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DriversLocalities') ? [] : ['className' => DriversLocalitiesTable::class];
        $this->DriversLocalities = TableRegistry::getTableLocator()->get('DriversLocalities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DriversLocalities);

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
