<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SkillsetsTasksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SkillsetsTasksTable Test Case
 */
class SkillsetsTasksTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.skillsets_tasks',
        'app.tasks',
        'app.skillsets',
        'app.users',
        'app.projects_permissions',
        'app.projects',
        'app.accounts',
        'app.credits',
        'app.purchases',
        'app.credit_packages',
        'app.permission_statuses',
        'app.user_metas',
        'app.skillsets_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SkillsetsTasks') ? [] : ['className' => 'App\Model\Table\SkillsetsTasksTable'];
        $this->SkillsetsTasks = TableRegistry::get('SkillsetsTasks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SkillsetsTasks);

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
