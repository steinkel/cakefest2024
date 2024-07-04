<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MemberRoles Model
 *
 * @property \App\Model\Table\MembersTable&\Cake\ORM\Association\BelongsTo $Members
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 * @method \App\Model\Entity\MemberRole newEmptyEntity()
 * @method \App\Model\Entity\MemberRole newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\MemberRole> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MemberRole get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\MemberRole findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\MemberRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\MemberRole> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MemberRole|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\MemberRole saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\MemberRole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MemberRole>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MemberRole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MemberRole> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MemberRole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MemberRole>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MemberRole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MemberRole> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MemberRolesTable extends Table
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

        $this->setTable('member_roles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Members', [
            'foreignKey' => 'member_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
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
            ->integer('member_id')
            ->notEmptyString('member_id');

        $validator
            ->integer('role_id')
            ->notEmptyString('role_id');

        $validator
            ->integer('inherited_from')
            ->allowEmptyString('inherited_from');

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
        $rules->add($rules->existsIn(['member_id'], 'Members'), ['errorField' => 'member_id']);
        $rules->add($rules->existsIn(['role_id'], 'Roles'), ['errorField' => 'role_id']);

        return $rules;
    }
}
