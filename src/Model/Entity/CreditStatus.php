<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CreditStatus Entity.
 */
class CreditStatus extends Entity
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
