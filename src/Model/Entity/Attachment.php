<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attachment Entity.
 */
class Attachment extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'uri' => true,
        'name' => true,
        'task_timeline' => true,
        'tasks' => true,
    ];
}
