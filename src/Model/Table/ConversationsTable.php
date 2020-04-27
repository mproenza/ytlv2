<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Conversations Model
 *
 * @property \App\Model\Table\DriversTable&\Cake\ORM\Association\BelongsTo $Drivers
 * @property \App\Model\Table\TravelsTable&\Cake\ORM\Association\BelongsTo $Travels
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ChildConversationsTable&\Cake\ORM\Association\BelongsTo $ChildConversations
 * @property \App\Model\Table\DiscountRidesTable&\Cake\ORM\Association\BelongsTo $DiscountRides
 * @property \App\Model\Table\ApiSyncQueue2driverConversationsTable&\Cake\ORM\Association\HasMany $ApiSyncQueue2driverConversations
 * @property \App\Model\Table\ArchiveDriverTravelerConversationsTable&\Cake\ORM\Association\HasMany $ArchiveDriverTravelerConversations
 * @property \App\Model\Table\ArchiveTravelsConversationsMetaTable&\Cake\ORM\Association\HasMany $ArchiveTravelsConversationsMeta
 * @property \App\Model\Table\ConversationMessagesTable&\Cake\ORM\Association\HasMany $ConversationMessages
 * @property \App\Model\Table\TestimonialsTable&\Cake\ORM\Association\HasMany $Testimonials
 * @property \App\Model\Table\TravelsConversationsMetaTable&\Cake\ORM\Association\HasMany $TravelsConversationsMeta
 *
 * @method \App\Model\Entity\Conversation newEmptyEntity()
 * @method \App\Model\Entity\Conversation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Conversation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Conversation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Conversation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Conversation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Conversation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Conversation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Conversation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Conversation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Conversation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Conversation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Conversation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ConversationsTable extends Table
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

        $this->setTable('conversations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Drivers', [
            'foreignKey' => 'driver_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Travels', [
            'foreignKey' => 'travel_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('ChildConversations', [
            'foreignKey' => 'child_conversation_id',
        ]);
        $this->belongsTo('DiscountRides', [
            'foreignKey' => 'discount_id',
        ]);
        $this->hasMany('ApiSyncQueue2driverConversations', [
            'foreignKey' => 'conversation_id',
        ]);
        $this->hasMany('ArchiveDriverTravelerConversations', [
            'foreignKey' => 'conversation_id',
        ]);
        $this->hasMany('ArchiveTravelsConversationsMeta', [
            'foreignKey' => 'conversation_id',
        ]);
        $this->hasMany('ConversationMessages', [
            'foreignKey' => 'conversation_id',
        ]);
        $this->hasMany('Testimonials', [
            'foreignKey' => 'conversation_id',
        ]);
        $this->hasOne('ConversationsMeta', [
            'foreignKey' => 'conversation_id',
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
            ->uuid('id')
            ->allowEmptyString('id', null, 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('notification_type')
            ->maxLength('notification_type', 1)
            ->notEmptyString('notification_type');

        $validator
            ->scalar('last_driver_email')
            ->maxLength('last_driver_email', 250)
            ->requirePresence('last_driver_email', 'create')
            ->notEmptyString('last_driver_email');

        $validator
            ->integer('message_count')
            ->notEmptyString('message_count');

        $validator
            ->scalar('notified_by')
            ->maxLength('notified_by', 250)
            ->allowEmptyString('notified_by');

        $validator
            ->allowEmptyString('identifier');

        $validator
            ->date('travel_date')
            ->allowEmptyDate('travel_date');

        $validator
            ->date('original_date')
            ->allowEmptyDate('original_date');

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
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->existsIn(['driver_id'], 'Drivers'));
        $rules->add($rules->existsIn(['travel_id'], 'Travels'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['child_conversation_id'], 'ChildConversations'));
        $rules->add($rules->existsIn(['discount_id'], 'DiscountRides'));

        return $rules;
    }
}
