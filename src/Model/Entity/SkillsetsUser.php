<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SkillsetsUser Entity.
 */
class SkillsetsUser extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user' => true,
        'skillset' => true,
    ];
}
