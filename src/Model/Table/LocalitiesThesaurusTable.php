<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LocalitiesThesaurus Model
 *
 * @property \App\Model\Table\LocalitiesTable&\Cake\ORM\Association\BelongsTo $Localities
 *
 * @method \App\Model\Entity\LocalitiesThesaurus newEmptyEntity()
 * @method \App\Model\Entity\LocalitiesThesaurus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\LocalitiesThesaurus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LocalitiesThesaurus get($primaryKey, $options = [])
 * @method \App\Model\Entity\LocalitiesThesaurus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\LocalitiesThesaurus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LocalitiesThesaurus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LocalitiesThesaurus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LocalitiesThesaurus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LocalitiesThesaurus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LocalitiesThesaurus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\LocalitiesThesaurus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LocalitiesThesaurus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LocalitiesThesaurusTable extends Table
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

        $this->setTable('localities_thesaurus');
        $this->setDisplayField('fake_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Localities', [
            'foreignKey' => 'locality_id',
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
            ->scalar('fake_name')
            ->maxLength('fake_name', 250)
            ->requirePresence('fake_name', 'create')
            ->notEmptyString('fake_name');

        $validator
            ->scalar('real_name')
            ->maxLength('real_name', 250)
            ->requirePresence('real_name', 'create')
            ->notEmptyString('real_name');

        $validator
            ->boolean('use_as_hint')
            ->requirePresence('use_as_hint', 'create')
            ->notEmptyString('use_as_hint');

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
        $rules->add($rules->existsIn(['locality_id'], 'Localities'));

        return $rules;
    }
}
