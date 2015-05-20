<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttachmentsTasksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttachmentsTasksTable Test Case
 */
class AttachmentsTasksTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attachments_tasks',
        'app.attachments',
        'app.task_timeline',
        'app.tasks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AttachmentsTasks') ? [] : ['className' => 'App\Model\Table\AttachmentsTasksTable'];
        $this->AttachmentsTasks = TableRegistry::get('AttachmentsTasks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AttachmentsTasks);

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
