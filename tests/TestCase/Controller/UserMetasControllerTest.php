<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UserMetasController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UserMetasController Test Case
 */
class UserMetasControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_metas',
        'app.users',
        'app.projects_permissions',
        'app.projects',
        'app.accounts',
        'app.credits',
        'app.purchases',
        'app.credit_packages',
        'app.tasks',
        'app.task_statuses',
        'app.task_timeline',
        'app.attachments',
        'app.attachments_tasks',
        'app.skillsets',
        'app.skillsets_tasks',
        'app.skillsets_users',
        'app.permission_statuses'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
