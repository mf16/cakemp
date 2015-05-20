<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SkillsetsTasksFixture
 *
 */
class SkillsetsTasksFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'task_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'skillset_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_tasks_has_skillsets_skillsets1_idx' => ['type' => 'index', 'columns' => ['skillset_id'], 'length' => []],
            'fk_tasks_has_skillsets_tasks1_idx' => ['type' => 'index', 'columns' => ['task_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['task_id', 'skillset_id'], 'length' => []],
            'fk_tasks_has_skillsets_tasks1' => ['type' => 'foreign', 'columns' => ['task_id'], 'references' => ['tasks', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_tasks_has_skillsets_skillsets1' => ['type' => 'foreign', 'columns' => ['skillset_id'], 'references' => ['skillsets', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'task_id' => 1,
            'skillset_id' => 1
        ],
    ];
}
