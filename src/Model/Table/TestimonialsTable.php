<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Testimonials Model
 *
 * @property \App\Model\Table\ConversationsTable&\Cake\ORM\Association\BelongsTo $Conversations
 * @property \App\Model\Table\DriversTable&\Cake\ORM\Association\BelongsTo $Drivers
 * @property \App\Model\Table\TestimonialsRepliesTable&\Cake\ORM\Association\HasMany $TestimonialsReplies
 *
 * @method \App\Model\Entity\Testimonial newEmptyEntity()
 * @method \App\Model\Entity\Testimonial newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Testimonial[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Testimonial get($primaryKey, $options = [])
 * @method \App\Model\Entity\Testimonial findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Testimonial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Testimonial[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Testimonial|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Testimonial saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Testimonial[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Testimonial[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Testimonial[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Testimonial[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TestimonialsTable extends Table
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

        $this->setTable('testimonials');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Conversations', [
            'foreignKey' => 'conversation_id',
        ]);
        $this->belongsTo('Drivers', [
            'foreignKey' => 'driver_id',
            'joinType' => 'INNER',
            'propertyName' =>'driver'
        ]);
        $this->hasMany('TestimonialsReplies', [
            'foreignKey' => 'testimonial_id',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('author')
            ->maxLength('author', 1000)
            ->requirePresence('author', 'create')
            ->notEmptyString('author');

        $validator
            ->scalar('country')
            ->maxLength('country', 100)
            ->allowEmptyString('country');

        $validator
            ->scalar('text')
            ->requirePresence('text', 'create')
            ->notEmptyString('text');

        $validator
            ->scalar('state')
            ->notEmptyString('state');

        $validator
            ->scalar('lang')
            ->maxLength('lang', 2)
            ->notEmptyString('lang');

        $validator
            ->scalar('image_filepath')
            ->maxLength('image_filepath', 250)
            ->requirePresence('image_filepath', 'create')
            ->notEmptyFile('image_filepath');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('validation_token')
            ->maxLength('validation_token', 32)
            ->requirePresence('validation_token', 'create')
            ->notEmptyString('validation_token');

        $validator
            ->scalar('driver_reply_token')
            ->maxLength('driver_reply_token', 32)
            ->allowEmptyString('driver_reply_token');

        $validator
            ->boolean('validated')
            ->notEmptyString('validated');

        $validator
            ->boolean('featured')
            ->notEmptyString('featured');

        $validator
            ->boolean('use_as_sample')
            ->notEmptyString('use_as_sample');

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
        $rules->add($rules->existsIn(['conversation_id'], 'Conversations'));
        $rules->add($rules->existsIn(['driver_id'], 'Drivers'));

        return $rules;
    }
}
