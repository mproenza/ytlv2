<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConversationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConversationsTable Test Case
 */
class ConversationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConversationsTable
     */
    protected $Conversations;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Conversations',
        'app.Drivers',
        'app.Travels',
        'app.Users',
        'app.ChildConversations',
        'app.DiscountRides',
        'app.ApiSyncQueue2driverConversations',
        'app.ArchiveDriverTravelerConversations',
        'app.ArchiveTravelsConversationsMeta',
        'app.ConversationMessages',
        'app.Testimonials',
        'app.TravelsConversationsMeta',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Conversations') ? [] : ['className' => ConversationsTable::class];
        $this->Conversations = TableRegistry::getTableLocator()->get('Conversations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Conversations);

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
