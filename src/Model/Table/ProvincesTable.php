<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Provinces Model
 *
 * @property \App\Model\Table\DriversTable&\Cake\ORM\Association\HasMany $Drivers
 * @property \App\Model\Table\LocalitiesTable&\Cake\ORM\Association\HasMany $Localities
 *
 * @method \App\Model\Entity\Province newEmptyEntity()
 * @method \App\Model\Entity\Province newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Province[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Province get($primaryKey, $options = [])
 * @method \App\Model\Entity\Province findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Province patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Province[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Province|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Province saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Province[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Province[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Province[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Province[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProvincesTable extends Table
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

        $this->setTable('provinces');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Drivers', [
            'foreignKey' => 'province_id',
        ]);
        $this->hasMany('Localities', [
            'foreignKey' => 'province_id',
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
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

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

        return $rules;
    }
    
    public static function getAsList() {
        $ProvincesTable = new ProvincesTable();
        $provinces = $ProvincesTable->find('list')
                ->select(['Provinces.id', 'Provinces.name']);

        return $provinces;
    }
}
