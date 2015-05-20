<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectsPermission Entity.
 */
class ProjectsPermission extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'status_id' => true,
        'project' => true,
        'user' => true,
        'permission_status' => true,
    ];
}
