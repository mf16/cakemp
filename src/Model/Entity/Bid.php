<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bid Entity.
 */
class Bid extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'bidder_id' => true,
        'work_time' => true,
        'wait_time' => true,
        'task' => true,
        'bidder' => true,
    ];
}
