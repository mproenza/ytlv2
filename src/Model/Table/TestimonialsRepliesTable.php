<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TestimonialsReplies Model
 *
 * @property \App\Model\Table\TestimonialsTable&\Cake\ORM\Association\BelongsTo $Testimonials
 *
 * @method \App\Model\Entity\TestimonialsReply newEmptyEntity()
 * @method \App\Model\Entity\TestimonialsReply newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TestimonialsReply[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TestimonialsReply get($primaryKey, $options = [])
 * @method \App\Model\Entity\TestimonialsReply findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TestimonialsReply patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TestimonialsReply[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TestimonialsReply|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TestimonialsReply saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TestimonialsReply[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TestimonialsReply[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TestimonialsReply[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TestimonialsReply[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TestimonialsRepliesTable extends Table
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

        $this->setTable('testimonials_replies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Testimonials', [
            'foreignKey' => 'testimonial_id',
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
            ->scalar('reply_text')
            ->requirePresence('reply_text', 'create')
            ->notEmptyString('reply_text');

        $validator
            ->scalar('reply_by')
            ->requirePresence('reply_by', 'create')
            ->notEmptyString('reply_by');

        $validator
            ->scalar('state')
            ->notEmptyString('state');

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
        $rules->add($rules->existsIn(['testimonial_id'], 'Testimonials'));

        return $rules;
    }
}
