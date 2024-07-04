<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Statuses Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\IssuesTable&\Cake\ORM\Association\HasMany $Issues
 *
 * @method \App\Model\Entity\Status newEmptyEntity()
 * @method \App\Model\Entity\Status newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Status> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Status get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Status findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Status patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Status> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Status|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Status saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Status>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Status>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Status>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Status> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Status>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Status>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Status>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Status> deleteManyOrFail(iterable $entities, array $options = [])
 */
class StatusesTable extends Table
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

        $this->setTable('statuses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
        ]);
        $this->hasMany('Issues', [
            'foreignKey' => 'status_id',
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
            ->allowEmptyString('user_id');

        $validator
            ->integer('project_id')
            ->allowEmptyString('project_id');

        $validator
            ->scalar('message')
            ->maxLength('message', 255)
            ->allowEmptyString('message');

        $validator
            ->dateTime('created_at')
            ->allowEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        $validator
            ->date('created_on')
            ->allowEmptyDate('created_on');

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'), ['errorField' => 'project_id']);

        return $rules;
    }
}
