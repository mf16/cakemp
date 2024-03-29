<?php
namespace App\Model\Table;

use App\Model\Entity\Attachment;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Attachments Model
 */
class AttachmentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('attachments');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->hasMany('TaskTimeline', [
            'foreignKey' => 'attachment_id'
        ]);
        $this->belongsToMany('Tasks', [
            'foreignKey' => 'attachment_id',
            'targetForeignKey' => 'task_id',
            'joinTable' => 'attachments_tasks'
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
            ->requirePresence('uri', 'create')
            ->notEmpty('uri');
            
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
