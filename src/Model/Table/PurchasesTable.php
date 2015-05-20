<?php
namespace App\Model\Table;

use App\Model\Entity\Purchase;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Purchases Model
 */
class PurchasesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('purchases');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Accounts', [
            'foreignKey' => 'account_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CreditPackages', [
            'foreignKey' => 'credit_package_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Credits', [
            'foreignKey' => 'purchase_id'
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
            ->add('quantity', 'valid', ['rule' => 'numeric'])
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');
            
        $validator
            ->add('total', 'valid', ['rule' => 'decimal'])
            ->requirePresence('total', 'create')
            ->notEmpty('total');
            
        $validator
            ->allowEmpty('token');

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
        $rules->add($rules->existsIn(['account_id'], 'Accounts'));
        $rules->add($rules->existsIn(['credit_package_id'], 'CreditPackages'));
        return $rules;
    }
}
