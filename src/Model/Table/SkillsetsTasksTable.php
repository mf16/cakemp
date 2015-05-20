<?php
namespace App\Model\Table;

use App\Model\Entity\SkillsetsTask;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SkillsetsTasks Model
 */
class SkillsetsTasksTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('skillsets_tasks');
        $this->displayField('task_id');
        $this->primaryKey(['task_id', 'skillset_id']);
        $this->belongsTo('Tasks', [
            'foreignKey' => 'task_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Skillsets', [
            'foreignKey' => 'skillset_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['task_id'], 'Tasks'));
        $rules->add($rules->existsIn(['skillset_id'], 'Skillsets'));
        return $rules;
    }
}
