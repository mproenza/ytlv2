<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LocalitiesThesaurusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LocalitiesThesaurusTable Test Case
 */
class LocalitiesThesaurusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LocalitiesThesaurusTable
     */
    protected $LocalitiesThesaurus;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.LocalitiesThesaurus',
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
        $config = TableRegistry::getTableLocator()->exists('LocalitiesThesaurus') ? [] : ['className' => LocalitiesThesaurusTable::class];
        $this->LocalitiesThesaurus = TableRegistry::getTableLocator()->get('LocalitiesThesaurus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->LocalitiesThesaurus);

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
