<?php
namespace App\Model\Table;

use App\Model\Entity\Bid;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bids Model
 */
class BidsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('bids');
        $this->displayField('id');
        $this->primaryKey(['id', 'tasks_id']);
        $this->belongsTo('Tasks', [
            'foreignKey' => 'tasks_id',
            'joinType' => 'INNER'
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
            ->add('work_time', 'valid', ['rule' => 'decimal'])
            ->requirePresence('work_time', 'create')
            ->notEmpty('work_time');
            
        $validator
            ->add('wait_time', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('wait_time');

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
        $rules->add($rules->existsIn(['tasks_id'], 'Tasks'));
        return $rules;
    }
}
