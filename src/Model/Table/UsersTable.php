<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
		$this->belongsTo('Accounts',[
			'foreignKey' => 'account_id',
			'joinType' => 'INNER'
		]);
        $this->hasMany('ProjectsPermissions', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserMetas', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Skillsets', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'skillset_id',
            'joinTable' => 'skillsets_users'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->add('account_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('account_id');
            
        $validator
            ->requirePresence('role', 'create')
            ->notEmpty('role');
            
        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email');
            
        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');
            
        $validator
            ->allowEmpty('first_name')
			->notEmpty('first_name');
            
        $validator
            ->allowEmpty('last_name')
			->notEmpty('last_name');
            
        $validator
            ->add('manager', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('manager');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
