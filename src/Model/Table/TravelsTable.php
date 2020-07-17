<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Travels Model
 *
 * @property \App\Model\Table\OriginLocalitiesTable&\Cake\ORM\Association\BelongsTo $OriginLocalities
 * @property \App\Model\Table\DestinationLocalitiesTable&\Cake\ORM\Association\BelongsTo $DestinationLocalities
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\OperatorsTable&\Cake\ORM\Association\BelongsTo $Operators
 * @property \App\Model\Table\ArchiveDriversTravelsTable&\Cake\ORM\Association\HasMany $ArchiveDriversTravels
 * @property \App\Model\Table\ConversationsTable&\Cake\ORM\Association\HasMany $Conversations
 * @property \App\Model\Table\DriversTravelsByEmailTable&\Cake\ORM\Association\HasMany $DriversTravelsByEmail
 * @property \App\Model\Table\TravelsConversationsMetaTable&\Cake\ORM\Association\BelongsToMany $TravelsConversationsMeta
 * @property \App\Model\Table\TravelsByEmailTable&\Cake\ORM\Association\BelongsToMany $TravelsByEmail
 *
 * @method \App\Model\Entity\Travel newEmptyEntity()
 * @method \App\Model\Entity\Travel newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Travel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Travel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Travel findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Travel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Travel[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Travel|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Travel saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Travel[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Travel[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Travel[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Travel[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\CounterCacheBehavior
 */
class TravelsTable extends Table
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

        $this->setTable('travels');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', [
            'Users' => ['travel_count'],
        ]);

        $this->belongsTo('OriginLocality', [
            'className' => 'Localities',
            'foreignKey' => 'origin_locality_id',
            'propertyName' => 'origin'
        ]);
        $this->belongsTo('DestinationLocality', [
            'className' => 'Localities',
            'foreignKey' => 'destination_locality_id',
            'propertyName' => 'destination'
        ]);
        $this->belongsTo('User', [
            'className' => 'Users',
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Operator', [
            'className' => 'Users',
            'foreignKey' => 'operator_id',
            'propertyName' => 'operator',
        ]);
        $this->hasMany('Conversations', [
            'foreignKey' => 'travel_id',
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
            ->allowEmptyString('id', null, 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('origin')
            ->maxLength('origin', 250)
            ->requirePresence('origin', 'create')
            ->notEmptyString('origin');

        $validator
            ->scalar('destination')
            ->maxLength('destination', 250)
            ->requirePresence('destination', 'create')
            ->notEmptyString('destination');

        $validator
            ->notEmptyString('direction');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->date('original_date')
            ->allowEmptyDate('original_date');

        $validator
            ->integer('people_count')
            ->requirePresence('people_count', 'create')
            ->notEmptyString('people_count');

        $validator
            ->scalar('details')
            ->requirePresence('details', 'create')
            ->notEmptyString('details');

        $validator
            ->scalar('state')
            ->maxLength('state', 1)
            ->requirePresence('state', 'create')
            ->notEmptyString('state');

        $validator
            ->nonNegativeInteger('drivers_sent_count')
            ->requirePresence('drivers_sent_count', 'create')
            ->notEmptyString('drivers_sent_count');

        $validator
            ->integer('drivers_sent_by_admin_count')
            ->notEmptyString('drivers_sent_by_admin_count');

        $validator
            ->integer('drivers_sent_by_user_count')
            ->notEmptyString('drivers_sent_by_user_count');

        $validator
            ->boolean('need_modern_car')
            ->requirePresence('need_modern_car', 'create')
            ->notEmptyString('need_modern_car');

        $validator
            ->integer('need_air_conditioner')
            ->requirePresence('need_air_conditioner', 'create')
            ->notEmptyString('need_air_conditioner');

        $validator
            ->scalar('created_from_ip')
            ->maxLength('created_from_ip', 100)
            ->requirePresence('created_from_ip', 'create')
            ->notEmptyString('created_from_ip');

        $validator
            ->integer('archive_conversations_count')
            ->notEmptyString('archive_conversations_count');

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
        $rules->add($rules->existsIn(['origin_locality_id'], 'OriginLocality'));
        $rules->add($rules->existsIn(['destination_locality_id'], 'DestinationLocality'));
        $rules->add($rules->existsIn(['user_id'], 'User'));
        $rules->add($rules->existsIn(['operator_id'], 'Operator'));

        return $rules;
    }
}
