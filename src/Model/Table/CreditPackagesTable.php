<?php
namespace App\Model\Table;

use App\Model\Entity\CreditPackage;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CreditPackages Model
 */
class CreditPackagesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('credit_packages');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->hasMany('Purchases', [
            'foreignKey' => 'credit_package_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');
            
        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');
            
        $validator
            ->add('credits', 'valid', ['rule' => 'numeric'])
            ->requirePresence('credits', 'create')
            ->notEmpty('credits');
            
        $validator
            ->add('price', 'valid', ['rule' => 'decimal'])
            ->requirePresence('price', 'create')
            ->notEmpty('price');
            
        $validator
            ->add('recurring', 'valid', ['rule' => 'numeric'])
            ->requirePresence('recurring', 'create')
            ->notEmpty('recurring');

        return $validator;
    }
}
