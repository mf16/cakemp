<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TaskStatus Entity.
 */
class TaskStatus extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'status' => true,
    ];
}
