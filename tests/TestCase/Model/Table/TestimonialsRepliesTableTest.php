<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestimonialsRepliesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestimonialsRepliesTable Test Case
 */
class TestimonialsRepliesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TestimonialsRepliesTable
     */
    protected $TestimonialsReplies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TestimonialsReplies',
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
        $config = TableRegistry::getTableLocator()->exists('TestimonialsReplies') ? [] : ['className' => TestimonialsRepliesTable::class];
        $this->TestimonialsReplies = TableRegistry::getTableLocator()->get('TestimonialsReplies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TestimonialsReplies);

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
