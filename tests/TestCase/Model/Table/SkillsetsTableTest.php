<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SkillsetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SkillsetsTable Test Case
 */
class SkillsetsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.skillsets',
        'app.tasks',
        'app.skillsets_tasks',
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
        $config = TableRegistry::exists('Skillsets') ? [] : ['className' => 'App\Model\Table\SkillsetsTable'];
        $this->Skillsets = TableRegistry::get('Skillsets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Skillsets);

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
}
