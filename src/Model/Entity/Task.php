<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity.
 */
class Task extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'project_id' => true,
        'name' => true,
        'description' => true,
        'status_id' => true,
        'assignee' => true,
        'last_assignee' => true,
        'project' => true,
        'task_status' => true,
        'task_timeline' => true,
        'attachments' => true,
        'skillsets' => true,
    ];
}
