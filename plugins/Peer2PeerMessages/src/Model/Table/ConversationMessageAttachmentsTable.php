<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ConversationMessageAttachments Model
 *
 * @property \App\Model\Table\EmailQueuesTable&\Cake\ORM\Association\BelongsTo $EmailQueues
 *
 * @method \App\Model\Entity\ConversationMessageAttachment newEmptyEntity()
 * @method \App\Model\Entity\ConversationMessageAttachment newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ConversationMessageAttachment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ConversationMessageAttachment get($primaryKey, $options = [])
 * @method \App\Model\Entity\ConversationMessageAttachment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ConversationMessageAttachment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ConversationMessageAttachment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ConversationMessageAttachment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConversationMessageAttachment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConversationMessageAttachment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ConversationMessageAttachment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ConversationMessageAttachment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ConversationMessageAttachment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ConversationMessageAttachmentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('conversation_message_attachments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'filename' => [
                'fields' => [
                    'dir' => 'filepath',
                    'size' => 'filesize',
                    'type' => 'mimetype',
                ],
            ]
        ]);
        
        

        $this->belongsTo('EmailQueues', [
            'foreignKey' => 'email_queue_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('filename')
            ->maxLength('filename', 255)
            ->requirePresence('filename', 'create')
            ->notEmptyFile('filename');

        $validator
            ->scalar('filepath')
            ->maxLength('filepath', 255)
            ->requirePresence('filepath', 'create')
            ->notEmptyFile('filepath');

        $validator
            ->scalar('relfilepath')
            ->maxLength('relfilepath', 255)
            ->allowEmptyFile('relfilepath');

        $validator
            ->scalar('mimetype')
            ->maxLength('mimetype', 50)
            ->requirePresence('mimetype', 'create')
            ->notEmptyString('mimetype');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['email_queue_id'], 'EmailQueues'));

        return $rules;
    }
}
