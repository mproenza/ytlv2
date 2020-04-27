<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\CasasFindRequestsTable&\Cake\ORM\Association\HasMany $CasasFindRequests
 * @property \App\Model\Table\ConversationsTable&\Cake\ORM\Association\HasMany $Conversations
 * @property \App\Model\Table\TravelsTable&\Cake\ORM\Association\HasMany $Travels
 * @property \App\Model\Table\UserInteractionsTable&\Cake\ORM\Association\HasMany $UserInteractions
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CasasFindRequests', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Conversations', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Travels', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserInteractions', [
            'foreignKey' => 'user_id',
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
            ->scalar('username')
            ->maxLength('username', 200)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 200)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('role')
            ->maxLength('role', 200)
            ->requirePresence('role', 'create')
            ->notEmptyString('role');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmptyString('active');

        $validator
            ->scalar('display_name')
            ->maxLength('display_name', 200)
            ->requirePresence('display_name', 'create')
            ->notEmptyString('display_name');

        $validator
            ->boolean('email_confirmed')
            ->notEmptyString('email_confirmed');

        $validator
            ->integer('travel_count')
            ->requirePresence('travel_count', 'create')
            ->notEmptyString('travel_count');

        $validator
            ->integer('conversations_count')
            ->allowEmptyString('conversations_count');

        $validator
            ->requirePresence('travel_by_email_count', 'create')
            ->notEmptyString('travel_by_email_count');

        $validator
            ->scalar('registered_from_ip')
            ->maxLength('registered_from_ip', 100)
            ->allowEmptyString('registered_from_ip');

        $validator
            ->scalar('register_type')
            ->maxLength('register_type', 100)
            ->allowEmptyString('register_type');

        $validator
            ->date('unsubscribe_date')
            ->allowEmptyDate('unsubscribe_date');

        $validator
            ->scalar('lang')
            ->maxLength('lang', 2)
            ->notEmptyString('lang');

        $validator
            ->dateTime('last_notification_date')
            ->allowEmptyDateTime('last_notification_date');

        $validator
            ->scalar('email_config')
            ->maxLength('email_config', 50)
            ->allowEmptyString('email_config');

        $validator
            ->boolean('shared_ride_offered')
            ->notEmptyString('shared_ride_offered');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['id']));

        return $rules;
    }
}
