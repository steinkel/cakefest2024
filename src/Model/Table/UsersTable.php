<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\EmailAddressesTable&\Cake\ORM\Association\HasMany $EmailAddresses
 * @property \App\Model\Table\MembersTable&\Cake\ORM\Association\HasMany $Members
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\HasMany $Statuses
 * @property \App\Model\Table\TimeEntriesTable&\Cake\ORM\Association\HasMany $TimeEntries
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\User> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\User> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('login');
        $this->setPrimaryKey('id');

        $this->hasMany('EmailAddresses', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Members', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Statuses', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('TimeEntries', [
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
            ->scalar('login')
            ->maxLength('login', 255)
            ->notEmptyString('login');

        $validator
            ->scalar('hashed_password')
            ->maxLength('hashed_password', 40)
            ->notEmptyString('hashed_password');

        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 30)
            ->notEmptyString('firstname');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 255)
            ->notEmptyString('lastname');

        $validator
            ->boolean('admin')
            ->notEmptyString('admin');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        $validator
            ->dateTime('last_login_on')
            ->allowEmptyDateTime('last_login_on');

        $validator
            ->scalar('language')
            ->maxLength('language', 5)
            ->allowEmptyString('language');

        $validator
            ->integer('auth_source_id')
            ->allowEmptyString('auth_source_id');

        $validator
            ->dateTime('created_on')
            ->allowEmptyDateTime('created_on');

        $validator
            ->dateTime('updated_on')
            ->allowEmptyDateTime('updated_on');

        $validator
            ->scalar('type')
            ->maxLength('type', 255)
            ->allowEmptyString('type');

        $validator
            ->scalar('identity_url')
            ->maxLength('identity_url', 255)
            ->allowEmptyString('identity_url');

        $validator
            ->scalar('mail_notification')
            ->maxLength('mail_notification', 255)
            ->notEmptyString('mail_notification');

        $validator
            ->scalar('salt')
            ->maxLength('salt', 64)
            ->allowEmptyString('salt');

        $validator
            ->boolean('must_change_passwd')
            ->notEmptyString('must_change_passwd');

        $validator
            ->dateTime('passwd_changed_on')
            ->allowEmptyDateTime('passwd_changed_on');

        $validator
            ->scalar('otp_secret_key')
            ->maxLength('otp_secret_key', 255)
            ->allowEmptyString('otp_secret_key');

        $validator
            ->scalar('mobile_phone')
            ->maxLength('mobile_phone', 255)
            ->allowEmptyString('mobile_phone');

        $validator
            ->boolean('mobile_phone_confirmed')
            ->notEmptyString('mobile_phone_confirmed');

        $validator
            ->boolean('ignore_2fa')
            ->notEmptyString('ignore_2fa');

        $validator
            ->decimal('two_fa_id')
            ->allowEmptyString('two_fa_id');

        $validator
            ->boolean('api_allowed')
            ->notEmptyString('api_allowed');

        $validator
            ->scalar('two_fa')
            ->maxLength('two_fa', 255)
            ->allowEmptyString('two_fa');

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
        $rules->add($rules->isUnique(['login']), ['errorField' => 'login']);

        return $rules;
    }
}
