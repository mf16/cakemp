<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'account_id' => true,
        'role' => true,
        'email' => true,
        'password' => true,
        'first_name' => true,
        'last_name' => true,
        'manager' => true,
        'projects_permissions' => true,
        'user_metas' => true,
        'skillsets' => true,
    ];

	protected function _setPassword($value)
	{
		$hasher= new DefaultPasswordHasher();
		return $hasher->hash($value);
	}
	
}
