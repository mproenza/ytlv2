<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\DriversController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\DriversController Test Case
 *
 * @uses \App\Controller\DriversController
 */
class DriversControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Drivers',
        'app.Provinces',
        'app.Users',
        'app.ActivityDriverSubscriptions',
        'app.ArchiveDriversTravels',
        'app.Conversations',
        'app.DiscountRides',
        'app.DriversProfiles',
        'app.DriversTransactionalEmails',
        'app.DriversTravelsByEmail',
        'app.Testimonials',
        'app.Localities',
        'app.DriversLocalities',
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
