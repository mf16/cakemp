<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CreditPackage Entity.
 */
class CreditPackage extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'credits' => true,
        'price' => true,
        'recurring' => true,
        'purchases' => true,
    ];
}
