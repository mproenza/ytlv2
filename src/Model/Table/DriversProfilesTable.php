<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\EventInterface;
use Cake\Datasource\EntityInterface;
use ArrayObject;

/**
 * DriversProfiles Model
 *
 * @property \App\Model\Table\DriversTable&\Cake\ORM\Association\BelongsTo $Drivers
 *
 * @method \App\Model\Entity\DriversProfile newEmptyEntity()
 * @method \App\Model\Entity\DriversProfile newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DriversProfile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DriversProfile get($primaryKey, $options = [])
 * @method \App\Model\Entity\DriversProfile findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DriversProfile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DriversProfile[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DriversProfile|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DriversProfile saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DriversProfile[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DriversProfile[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DriversProfile[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DriversProfile[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DriversProfilesTable extends Table
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

        $this->setTable('drivers_profiles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'avatar_filename' => [
                'fields' => [
                        'dir' => 'avatar_filedir'
                    ],
            ]
        ]);

        $this->belongsTo('Drivers', [
            'foreignKey' => 'driver_id',
            'joinType' => 'INNER',
        ]);
    }
    
    public function beforeSave(EventInterface $event, EntityInterface $entity, ArrayObject $options) {
        if(isset($entity->avatar) && isset($entity->avatar_dir)) $entity->avatar_path = $entity->avatar_dir.$entity->avatar;
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug')
            ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('driver_name')
            ->maxLength('driver_name', 255)
            ->requirePresence('driver_name', 'create')
            ->notEmptyString('driver_name');

        $validator
            //->scalar('avatar_filepath')
            //->maxLength('avatar_filepath', 250)
            //->requirePresence('avatar_filepath', 'create')
            ->notEmptyFile('avatar');

        $validator
            ->scalar('featured_img_url')
            ->maxLength('featured_img_url', 255)
            ->allowEmptyString('featured_img_url');

        $validator
            ->scalar('description_es')
            ->requirePresence('description_es', 'create')
            ->notEmptyString('description_es');

        $validator
            ->scalar('description_en')
            ->requirePresence('description_en', 'create')
            ->notEmptyString('description_en');

        $validator
            ->boolean('show_profile')
            ->notEmptyFile('show_profile');

        $validator
            ->scalar('driver_code')
            ->maxLength('driver_code', 10)
            ->requirePresence('driver_code', 'create')
            ->notEmptyString('driver_code');

        $validator
            ->integer('testimonial_attempts')
            ->notEmptyString('testimonial_attempts');

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
        $rules->add($rules->existsIn(['driver_id'], 'Drivers'));
        $rules->add($rules->isUnique(['slug']));

        return $rules;
    }
}
