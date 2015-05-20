<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectsPermissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectsPermissionsTable Test Case
 */
class ProjectsPermissionsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.projects_permissions',
        'app.projects',
        'app.accounts',
        'app.credits',
        'app.purchases',
        'app.tasks',
        'app.users',
        'app.user_metas',
        'app.skillsets',
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
        $config = TableRegistry::exists('ProjectsPermissions') ? [] : ['className' => 'App\Model\Table\ProjectsPermissionsTable'];
        $this->ProjectsPermissions = TableRegistry::get('ProjectsPermissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectsPermissions);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
