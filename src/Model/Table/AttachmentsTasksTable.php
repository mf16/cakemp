<?php
namespace App\Model\Table;

use App\Model\Entity\AttachmentsTask;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AttachmentsTasks Model
 */
class AttachmentsTasksTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('attachments_tasks');
        $this->displayField('attachment_id');
        $this->primaryKey(['attachment_id', 'task_id']);
        $this->belongsTo('Attachments', [
            'foreignKey' => 'attachment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tasks', [
            'foreignKey' => 'task_id',
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
        $rules->add($rules->existsIn(['attachment_id'], 'Attachments'));
        $rules->add($rules->existsIn(['task_id'], 'Tasks'));
        return $rules;
    }
}
