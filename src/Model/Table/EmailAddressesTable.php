<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmailAddresses Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @method \App\Model\Entity\EmailAddress newEmptyEntity()
 * @method \App\Model\Entity\EmailAddress newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\EmailAddress> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmailAddress get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\EmailAddress findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\EmailAddress patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\EmailAddress> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmailAddress|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\EmailAddress saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\EmailAddress>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EmailAddress>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EmailAddress>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EmailAddress> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EmailAddress>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EmailAddress>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EmailAddress>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EmailAddress> deleteManyOrFail(iterable $entities, array $options = [])
 */
class EmailAddressesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('email_addresses');
        $this->setDisplayField('address');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->boolean('is_default')
            ->notEmptyString('is_default');

        $validator
            ->boolean('notify')
            ->notEmptyString('notify');

        $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmptyDateTime('created_on');

        $validator
            ->dateTime('updated_on')
            ->requirePresence('updated_on', 'create')
            ->notEmptyDateTime('updated_on');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
