<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TravelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TravelsTable Test Case
 */
class TravelsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TravelsTable
     */
    protected $Travels;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Travels',
        'app.OriginLocalities',
        'app.DestinationLocalities',
        'app.Users',
        'app.Operators',
        'app.ArchiveDriversTravels',
        'app.Conversations',
        'app.DriversTravelsByEmail',
        'app.TravelsConversationsMeta',
        'app.TravelsByEmail',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Travels') ? [] : ['className' => TravelsTable::class];
        $this->Travels = TableRegistry::getTableLocator()->get('Travels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Travels);

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
