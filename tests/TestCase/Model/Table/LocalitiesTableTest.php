<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LocalitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LocalitiesTable Test Case
 */
class LocalitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LocalitiesTable
     */
    protected $Localities;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Localities',
        'app.Provinces',
        'app.LocalitiesThesaurus',
        'app.TravelsByEmail',
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
        $config = TableRegistry::getTableLocator()->exists('Localities') ? [] : ['className' => LocalitiesTable::class];
        $this->Localities = TableRegistry::getTableLocator()->get('Localities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Localities);

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
