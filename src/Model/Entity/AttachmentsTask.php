<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AttachmentsTask Entity.
 */
class AttachmentsTask extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'attachment' => true,
        'task' => true,
    ];
}
