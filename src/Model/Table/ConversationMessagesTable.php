<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ConversationMessages Model
 *
 * @property \App\Model\Table\ConversationsTable&\Cake\ORM\Association\BelongsTo $Conversations
 *
 * @method \App\Model\Entity\ConversationMessage newEmptyEntity()
 * @method \App\Model\Entity\ConversationMessage newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ConversationMessage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ConversationMessage get($primaryKey, $options = [])
 * @method \App\Model\Entity\ConversationMessage findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ConversationMessage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ConversationMessage[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ConversationMessage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConversationMessage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConversationMessage[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ConversationMessage[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ConversationMessage[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ConversationMessage[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ConversationMessagesTable extends Table
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

        $this->setTable('conversation_messages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Conversations', [
            'foreignKey' => 'conversation_id',
            'joinType' => 'INNER',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('response_by')
            ->maxLength('response_by', 20)
            ->requirePresence('response_by', 'create')
            ->notEmptyString('response_by');

        $validator
            ->scalar('response_text')
            ->requirePresence('response_text', 'create')
            ->notEmptyString('response_text');

        $validator
            ->scalar('attachments_ids')
            ->allowEmptyString('attachments_ids');

        $validator
            ->scalar('msg_source')
            ->maxLength('msg_source', 3)
            ->allowEmptyString('msg_source');

        $validator
            ->scalar('read_by')
            ->maxLength('read_by', 250)
            ->allowEmptyString('read_by');

        $validator
            ->dateTime('date_read')
            ->allowEmptyDateTime('date_read');

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
        $rules->add($rules->existsIn(['conversation_id'], 'Conversations'));

        return $rules;
    }
}
