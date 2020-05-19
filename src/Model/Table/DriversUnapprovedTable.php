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
class DriversUnapprovedTable extends Table
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
        
        $this->addBehavior('Josegonzalez/Upload.Upload', [
             'avatar' => [
                 'fields' => [
                         'dir' => 'avatar_path_dir'
                     ],
             ],
            'featured_image' => [
                 'fields' => [
                         'dir' => 'featured_image_url_dir'
                     ],
             ],
            'profile_image' => [
                 'fields' => [
                         'dir' => 'profile_image_url_dir'
                     ],
             ]
                ]);

        $this->setTable('drivers_unapproved');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        $this->belongsTo('Provinces', [
            'foreignKey' => 'province_id',
            'joinType' => 'INNER',
        ]);

        
    }
    
    public function beforeSave(EventInterface $event, EntityInterface $entity, ArrayObject $options) {
        if(isset($entity->avatar) && isset($entity->avatar_path_dir)) $entity->avatar_path = $entity->avatar_path_dir.DS.$entity->avatar;
        if(isset($entity->featured_image) && isset($entity->featured_image_url_dir)) $entity->featured_img_url = $entity->featured_image_url_dir.DS.$entity->featured_image;
        if(isset($entity->profile_image) && isset($entity->profile_image_url_dir)) $entity->profile_img_url = $entity->profile_image_url_dir.DS.$entity->profile_image;
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
            //->uuid('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->notEmptyString('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('full_name')
            ->maxLength('full_name', 255)
            ->requirePresence('full_name', 'create')
            ->notEmptyString('full_name');

        $validator
            /*->scalar('avatar_path')
            ->maxLength('avatar_path', 250)
            ->requirePresence('avatar_path', 'create')*/
            ->notEmptyFile('avatar');

        $validator
           /* ->scalar('featured_img_url')
            ->maxLength('featured_img_url', 255)*/
            ->notEmptyFile('featured_img');
        
        $validator
            /*->scalar('profile_img_url')
            ->maxLength('profile_img_url', 255)*/
            ->notEmptyFile('profile_img');

        $validator
            ->scalar('about')
            ->requirePresence('about', 'create')
            ->notEmptyString('about');
        

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

        return $rules;
    }
}