<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Skillset Entity.
 */
class Skillset extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'skill' => true,
        'tasks' => true,
        'users' => true,
    ];
}
