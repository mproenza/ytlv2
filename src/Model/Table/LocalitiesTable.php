<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Localities Model
 *
 * @property \App\Model\Table\ProvincesTable&\Cake\ORM\Association\BelongsTo $Provinces
 * @property \App\Model\Table\LocalitiesThesaurusTable&\Cake\ORM\Association\HasMany $LocalitiesThesaurus
 * @property \App\Model\Table\TravelsByEmailTable&\Cake\ORM\Association\HasMany $TravelsByEmail
 * @property \App\Model\Table\DriversTable&\Cake\ORM\Association\BelongsToMany $Drivers
 *
 * @method \App\Model\Entity\Locality newEmptyEntity()
 * @method \App\Model\Entity\Locality newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Locality[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Locality get($primaryKey, $options = [])
 * @method \App\Model\Entity\Locality findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Locality patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Locality[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Locality|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Locality saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Locality[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Locality[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Locality[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Locality[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LocalitiesTable extends Table
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

        $this->setTable('localities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Provinces', [
            'foreignKey' => 'province_id',
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
        $rules->add($rules->existsIn(['province_id'], 'Provinces'));

        return $rules;
    }



    public static function getAsSuggestions() {
        $LocalitiesTable = new LocalitiesTable();
        $localities = $LocalitiesTable->find('list')->cache('localities')->toArray();

        $ThesaurusTable = new LocalitiesThesaurusTable();
        $thesaurusEntries = $ThesaurusTable->find('list', ['conditions'=>['use_as_hint'=>true]])->cache('localities-thesaurus')->toArray();

        $list = array_merge($localities, $thesaurusEntries);

        return $list;
    }
    
    public static function getAsList() {
        $LocalitiesTable = new LocalitiesTable();
        $localities = $LocalitiesTable->find('list')
                ->select(["Localities.id", "Localities.name", "Provinces.name"])
                ->contain(['Provinces'])
                ->where(["Provinces.id = Localities.province_id"]);

        return $localities;
    }
}
