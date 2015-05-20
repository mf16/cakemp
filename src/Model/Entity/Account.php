<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Account Entity.
 */
class Account extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'type' => true,
        'name' => true,
        'password' => true,
        'credits' => true,
        'projects' => true,
        'purchases' => true,
    ];
}
