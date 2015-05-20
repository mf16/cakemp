<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Credit Entity.
 */
class Credit extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'status' => true,
        'purchase_id' => true,
        'account_id' => true,
        'type' => true,
        'purchase' => true,
        'account' => true,
    ];
}
