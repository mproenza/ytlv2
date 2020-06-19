<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Entity\ConversationsMeta;

/**
 * Drivers Model
 *
 * @property \App\Model\Table\ProvincesTable&\Cake\ORM\Association\BelongsTo $Provinces
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ActivityDriverSubscriptionsTable&\Cake\ORM\Association\HasMany $ActivityDriverSubscriptions
 * @property \App\Model\Table\ArchiveDriversTravelsTable&\Cake\ORM\Association\HasMany $ArchiveDriversTravels
 * @property \App\Model\Table\ConversationsTable&\Cake\ORM\Association\HasMany $Conversations
 * @property \App\Model\Table\DiscountRidesTable&\Cake\ORM\Association\HasMany $DiscountRides
 * @property \App\Model\Table\DriversProfilesTable&\Cake\ORM\Association\HasMany $DriversProfiles
 * @property \App\Model\Table\DriversTransactionalEmailsTable&\Cake\ORM\Association\HasMany $DriversTransactionalEmails
 * @property \App\Model\Table\DriversTravelsByEmailTable&\Cake\ORM\Association\HasMany $DriversTravelsByEmail
 * @property \App\Model\Table\TestimonialsTable&\Cake\ORM\Association\HasMany $Testimonials
 * @property \App\Model\Table\LocalitiesTable&\Cake\ORM\Association\BelongsToMany $Localities
 *
 * @method \App\Model\Entity\Driver newEmptyEntity()
 * @method \App\Model\Entity\Driver newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Driver[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Driver get($primaryKey, $options = [])
 * @method \App\Model\Entity\Driver findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Driver patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Driver[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Driver|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Driver saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Driver[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Driver[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Driver[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Driver[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DriversTable extends Table
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

        $this->setTable('drivers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('DriversProfiles', [
            'foreignKey' => 'driver_id',
            'propertyName' => 'profile'
        ]);

        $this->belongsTo('Provinces', [
            'foreignKey' => 'province_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'operator_id',
        ]);
        $this->hasMany('ActivityDriverSubscriptions', [
            'foreignKey' => 'driver_id',
        ]);
        $this->hasMany('ArchiveDriversTravels', [
            'foreignKey' => 'driver_id',
        ]);
        $this->hasMany('Conversations', [
            'foreignKey' => 'driver_id',
        ]);
        $this->hasMany('DiscountRides', [
            'foreignKey' => 'driver_id',
        ]);

        $this->hasMany('DriversTransactionalEmails', [
            'foreignKey' => 'driver_id',
        ]);
        $this->hasMany('Testimonials', [
            'foreignKey' => 'driver_id',
        ]);
        $this->belongsToMany('Localities', [
            'foreignKey' => 'driver_id',
            'targetForeignKey' => 'locality_id',
            'joinTable' => 'drivers_localities',
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
            ->maxLength('username', 250)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 250)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('web_auth_token')
            ->maxLength('web_auth_token', 250)
            ->allowEmptyString('web_auth_token');

        $validator
            ->scalar('role')
            ->maxLength('role', 100)
            ->notEmptyString('role');

        $validator
            ->integer('min_people_count')
            ->notEmptyString('min_people_count');

        $validator
            ->integer('max_people_count')
            ->requirePresence('max_people_count', 'create')
            ->notEmptyString('max_people_count');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmptyString('active');

        $validator
            ->boolean('receive_requests')
            ->notEmptyString('receive_requests');

        $validator
            ->boolean('has_modern_car')
            //->requirePresence('has_modern_car', 'create')
            ->notEmptyString('has_modern_car');

        $validator
            ->boolean('has_classic_car')
            ->notEmptyString('has_classic_car');

        $validator
            ->boolean('has_air_conditioner')
            ->requirePresence('has_air_conditioner', 'create')
            ->notEmptyString('has_air_conditioner');

        $validator
            ->scalar('description')
            ->maxLength('description', 250)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->requirePresence('travel_count', 'create')
            ->notEmptyString('travel_count');

       /* $validator
            ->dateTime('last_notification_date')
            ->requirePresence('last_notification_date', 'create')
            ->notEmptyDateTime('last_notification_date'); COMENTADO PARA REGISTRO INICIAL*/

        $validator
            ->boolean('speaks_english')
            ->notEmptyString('speaks_english');

        $validator
            ->boolean('mobile_app_active')
            ->notEmptyString('mobile_app_active');

        $validator
            ->boolean('email_active')
            ->notEmptyString('email_active');

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
        $rules->add($rules->existsIn(['province_id'], 'Provinces'));
        $rules->add($rules->existsIn(['operator_id'], 'Users'));

        return $rules;
    }

    public static function getAsSuggestions() {

        $DriversTable = new DriversTable();
        $drivers = $DriversTable->find('all')
                ->contain(['DriversProfiles', 'Provinces'])
                ->where(['active'=>true, 'receive_requests'=>true, 'role'=>'driver'])
                ->cache('drivers_all_active');

        $list = [];
        foreach ($drivers as $d) {
            $list[] = [
                'driver_id'=>$d->id,
                'driver_username'=>$d->username,
                'driver_name'=>$d->name,
                'driver_pax'=>$d->min_people_count.'-'.$d->max_people_count,
                'province_id'=>$d->province->id,
                'province_name'=>$d->province->name
            ];
        }

        return $list;

        /**
         * Aqui asumo que cuando se llama a esta funcion, es porque en la vista se va a permitir notificar a mas choferes. Entonces, lo mejor es
         * que siempre que se llame restringir la notificacion de choferes si está logueado un operador.
         */
        /*if(AuthComponent::user('role') == 'operator')
            $this->Behaviors->load('Operations.OperatorScope', array('match'=>'Driver.operator_id', 'action'=>'N'));

        $drivers = $this->find('all', array('conditions'=>array('active'=>true, 'receive_requests'=>true, 'role'=>'driver')));
        $list = array();
        foreach ($drivers as $d) {
            $list[] = array(
                'driver_id'=>$d->id'],
                'driver_username'=>$d->username'],
                'driver_name'=>$d['DriverProfile']['driver_name'],
                'driver_pax'=>$d->min_people_count'].'-'.$d->max_people_count'],
                'province_id'=>$d['Province']['id'],
                'province_name'=>$d['Province']['name']);
        }
        return $list;*/
    }


    // CUSTOM FINDERS
    public function findWithFullProfile(Query $query, array $options) {
        return $query->contain(['DriversProfiles', 'Provinces'])
                ->where([ 'DriversProfiles.slug'=>$options['nick'] ]);
    }

    public function findRecommendedInProvince(Query $query, array $options) {
        $provinceID = $options['province_id'];
        $count = isset($options['count'])? $options['count']:6;
        $notThisDriverIds = isset($options['exclude_drivers'])? $options['exclude_drivers']:null;

        $conditions = [
            'Drivers.id NOT IN' => $notThisDriverIds,
            'Drivers.active' => true,
            'drivers.receive_requests' => true,
            'drivers.max_people_count <=' => 10,
            'drivers.province_id' => $provinceID,
            'ConversationsMeta.state IN' =>[ConversationsMeta::$SERVICE_STATE_DONE, ConversationsMeta::$SERVICE_STATE_PAID],
        ];
        $order = ['Drivers.last_notification_date'=>'ASC'];

        $query = $this->_getDriversInProvince($query, $provinceID, $count, ['conditions'=>$conditions, 'order'=>$order]);

        return $query;
    }
    /**
     * @param $options: 'order', 'conditions'
     */
    private function _getDriversInProvince(Query $query, $provinceID, $count, $options) {

        $query->contain(
                    [
                        'DriversProfiles'
                    ]
                )
                ->select($this)->select($this->DriversProfiles)
                ->select(
                    [
                        'travel_count' =>$query->func()->count('Travels.id'),
                        'total_travelers' =>$query->func()->sum('Travels.people_count')
                    ]
                )
                ->join([
                    'table' => 'conversations',
                    'alias' => 'Conversations',
                    'type' => 'INNER',
                    'conditions' => 'Drivers.id = Conversations.driver_id',
                ])
                ->join([
                    'table' => 'conversations_meta',
                    'alias' => 'ConversationsMeta',
                    'type' => 'INNER',
                    'conditions' => 'Conversations.id = ConversationsMeta.conversation_id',
                ])
                ->join([
                    'table' => 'travels',
                    'alias' => 'Travels',
                    'type' => 'LEFT',
                    'conditions' => 'Travels.id = Conversations.travel_id',
                ]);
                if( isset($options['conditions']) ) $query->where($options['conditions']);
                $query->group('Drivers.id');
                if( isset($options['order']) ) $query->order($options['order'])
                ->limit($count);

        //debug($query);

        return $query->cache(function ($q) {
            return 'drivers-' . md5(serialize($q->clause('where')));
        });
    }
}
