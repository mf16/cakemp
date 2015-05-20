<?php
namespace App\Model\Table;

use App\Model\Entity\Account;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accounts Model
 */
class AccountsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('accounts');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->hasMany('Credits', [
            'foreignKey' => 'account_id'
        ]);
        $this->hasMany('Projects', [
            'foreignKey' => 'account_id'
        ]);
        $this->hasMany('Purchases', [
            'foreignKey' => 'account_id'
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
            ->requirePresence('type', 'create')
            ->notEmpty('type');
            
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');
            
        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        return $validator;
    }
}
