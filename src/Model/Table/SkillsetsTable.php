<?php
namespace App\Model\Table;

use App\Model\Entity\Skillset;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Skillsets Model
 */
class SkillsetsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('skillsets');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsToMany('Tasks', [
            'foreignKey' => 'skillset_id',
            'targetForeignKey' => 'task_id',
            'joinTable' => 'skillsets_tasks'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'skillset_id',
            'targetForeignKey' => 'user_id',
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
            ->requirePresence('skill', 'create')
            ->notEmpty('skill');

        return $validator;
    }
}
