<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ConversationsMeta Model
 *
 * @property \App\Model\Table\TestimonialsTable&\Cake\ORM\Association\BelongsTo $Testimonials
 *
 * @method \App\Model\Entity\ConversationsMetum newEmptyEntity()
 * @method \App\Model\Entity\ConversationsMetum newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ConversationsMetum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ConversationsMetum get($primaryKey, $options = [])
 * @method \App\Model\Entity\ConversationsMetum findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ConversationsMetum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ConversationsMetum[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ConversationsMetum|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConversationsMetum saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConversationsMetum[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ConversationsMetum[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ConversationsMetum[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ConversationsMetum[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ConversationsMetaTable extends Table
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

        $this->setTable('conversations_meta');
        $this->setDisplayField('conversation_id');
        $this->setPrimaryKey('conversation_id');

        $this->belongsTo('Testimonials', [
            'foreignKey' => 'testimonial_id',
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
            ->uuid('conversation_id')
            ->allowEmptyString('conversation_id', null, 'create');

        $validator
            ->boolean('following')
            ->notEmptyString('following');

        $validator
            ->scalar('flag_type')
            ->maxLength('flag_type', 1)
            ->allowEmptyString('flag_type');

        $validator
            ->scalar('flag_comment')
            ->allowEmptyString('flag_comment');

        $validator
            ->scalar('state')
            ->maxLength('state', 1)
            ->notEmptyString('state');

        $validator
            ->integer('read_entry_count')
            ->notEmptyString('read_entry_count');

        $validator
            ->decimal('income')
            ->allowEmptyString('income');

        $validator
            ->decimal('income_saving')
            ->allowEmptyString('income_saving');

        $validator
            ->scalar('comments')
            ->allowEmptyString('comments');

        $validator
            ->scalar('arrangement')
            ->allowEmptyString('arrangement');

        $validator
            ->boolean('asked_confirmation')
            ->notEmptyString('asked_confirmation');

        $validator
            ->scalar('received_confirmation_type')
            ->maxLength('received_confirmation_type', 1)
            ->allowEmptyString('received_confirmation_type');

        $validator
            ->scalar('received_confirmation_details')
            ->allowEmptyString('received_confirmation_details');

        $validator
            ->boolean('archived')
            ->allowEmptyString('archived');

        $validator
            ->boolean('testimonial_requested')
            ->notEmptyString('testimonial_requested');

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
        $rules->add($rules->existsIn(['testimonial_id'], 'Testimonials'));

        return $rules;
    }
}
