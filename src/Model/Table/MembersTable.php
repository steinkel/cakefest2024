<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Members Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\MemberRolesTable&\Cake\ORM\Association\HasMany $MemberRoles
 *
 * @method \App\Model\Entity\Member newEmptyEntity()
 * @method \App\Model\Entity\Member newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Member> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Member get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Member findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Member patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Member> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Member|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Member saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Member>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Member>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Member>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Member> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Member>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Member>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Member>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Member> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MembersTable extends Table
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

        $this->setTable('members');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('MemberRoles', [
            'foreignKey' => 'member_id',
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
            ->integer('project_id')
            ->notEmptyString('project_id');

        $validator
            ->dateTime('created_on')
            ->allowEmptyDateTime('created_on');

        $validator
            ->boolean('mail_notification')
            ->notEmptyString('mail_notification');

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
        $rules->add($rules->isUnique(['user_id', 'project_id']), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['project_id'], 'Projects'), ['errorField' => 'project_id']);

        return $rules;
    }
}
