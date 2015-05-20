<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserMetasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserMetasTable Test Case
 */
class UserMetasTableTest extends TestCase
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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserMetas') ? [] : ['className' => 'App\Model\Table\UserMetasTable'];
        $this->UserMetas = TableRegistry::get('UserMetas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserMetas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
