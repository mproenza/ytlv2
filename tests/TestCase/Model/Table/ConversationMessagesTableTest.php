<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConversationMessagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConversationMessagesTable Test Case
 */
class ConversationMessagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConversationMessagesTable
     */
    protected $ConversationMessages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ConversationMessages',
        'app.Conversations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ConversationMessages') ? [] : ['className' => ConversationMessagesTable::class];
        $this->ConversationMessages = TableRegistry::getTableLocator()->get('ConversationMessages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ConversationMessages);

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
