<?php
namespace App\Model\Table;

use App\Model\Entity\Task;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tasks Model
 */
class TasksTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('tasks');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TaskStatuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('TaskTimeline', [
            'foreignKey' => 'task_id'
        ]);
        $this->belongsToMany('Attachments', [
            'foreignKey' => 'task_id',
            'targetForeignKey' => 'attachment_id',
            'joinTable' => 'attachments_tasks'
        ]);
        $this->belongsToMany('Skillsets', [
            'foreignKey' => 'task_id',
            'targetForeignKey' => 'skillset_id',
            'joinTable' => 'skillsets_tasks'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'assignee'
			,'joinTye' => 'LEFT'
        ]);
		$this->hasMany('Bids',[
			'foreignKey' => 'tasks_id'
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
            ->allowEmpty('description');
            
        $validator
            ->add('assignee', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('assignee');
            
        $validator
            ->add('last_assignee', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('last_assignee');

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->existsIn(['status_id'], 'TaskStatuses'));
        return $rules;
    }
}
