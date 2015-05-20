<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Purchase Entity.
 */
class Purchase extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'account_id' => true,
        'quantity' => true,
        'total' => true,
        'token' => true,
        'credit_package_id' => true,
        'account' => true,
        'credit_package' => true,
        'credits' => true,
    ];
}
