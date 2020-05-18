<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\TravelsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\TravelsController Test Case
 *
 * @uses \App\Controller\TravelsController
 */
class TravelsControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
        'app.ArchiveTravelsConversationsMeta',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
