<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConversationsMetaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConversationsMetaTable Test Case
 */
class ConversationsMetaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConversationsMetaTable
     */
    protected $ConversationsMeta;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ConversationsMeta',
        'app.Testimonials',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ConversationsMeta') ? [] : ['className' => ConversationsMetaTable::class];
        $this->ConversationsMeta = TableRegistry::getTableLocator()->get('ConversationsMeta', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ConversationsMeta);

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
