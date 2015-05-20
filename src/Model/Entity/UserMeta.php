<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserMeta Entity.
 */
class UserMeta extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'address' => true,
        'city' => true,
        'state' => true,
        'zip' => true,
        'github_username' => true,
        'user' => true,
    ];
}
