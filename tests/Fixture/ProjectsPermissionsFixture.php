<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectsPermissionsFixture
 *
 */
class ProjectsPermissionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'project_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_projects_has_users_users1_idx' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'fk_projects_has_users_projects1_idx' => ['type' => 'index', 'columns' => ['project_id'], 'length' => []],
            'fk_project_permissions_permissions_statuses1_idx' => ['type' => 'index', 'columns' => ['status_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['project_id', 'user_id'], 'length' => []],
            'fk_projects_has_users_projects1' => ['type' => 'foreign', 'columns' => ['project_id'], 'references' => ['projects', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_projects_has_users_users1' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_project_permissions_permissions_statuses1' => ['type' => 'foreign', 'columns' => ['status_id'], 'references' => ['permission_statuses', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'project_id' => 1,
            'user_id' => 1,
            'status_id' => 1
        ],
    ];
}
