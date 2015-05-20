<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TaskTimeline Entity.
 */
class TaskTimeline extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'author' => true,
        'message' => true,
        'attachment_id' => true,
        'task_id' => true,
        'attachment' => true,
    ];
}
