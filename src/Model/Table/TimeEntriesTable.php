<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TimeEntries Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\IssuesTable&\Cake\ORM\Association\BelongsTo $Issues
 *
 * @method \App\Model\Entity\TimeEntry newEmptyEntity()
 * @method \App\Model\Entity\TimeEntry newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\TimeEntry> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TimeEntry get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\TimeEntry findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\TimeEntry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\TimeEntry> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TimeEntry|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\TimeEntry saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\TimeEntry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TimeEntry>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TimeEntry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TimeEntry> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TimeEntry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TimeEntry>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TimeEntry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TimeEntry> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TimeEntriesTable extends Table
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

        $this->setTable('time_entries');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Issues', [
            'foreignKey' => 'issue_id',
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
            ->integer('project_id')
            ->notEmptyString('project_id');

        $validator
            ->integer('author_id')
            ->allowEmptyString('author_id');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('issue_id')
            ->allowEmptyString('issue_id');

        $validator
            ->numeric('hours')
            ->requirePresence('hours', 'create')
            ->notEmptyString('hours');

        $validator
            ->scalar('comments')
            ->maxLength('comments', 1024)
            ->allowEmptyString('comments');

        $validator
            ->integer('activity_id')
            ->requirePresence('activity_id', 'create')
            ->notEmptyString('activity_id');

        $validator
            ->date('spent_on')
            ->requirePresence('spent_on', 'create')
            ->notEmptyDate('spent_on');

        $validator
            ->integer('tyear')
            ->requirePresence('tyear', 'create')
            ->notEmptyString('tyear');

        $validator
            ->integer('tmonth')
            ->requirePresence('tmonth', 'create')
            ->notEmptyString('tmonth');

        $validator
            ->integer('tweek')
            ->requirePresence('tweek', 'create')
            ->notEmptyString('tweek');

        $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmptyDateTime('created_on');

        $validator
            ->dateTime('updated_on')
            ->requirePresence('updated_on', 'create')
            ->notEmptyDateTime('updated_on');

        $validator
            ->integer('rate_id')
            ->allowEmptyString('rate_id');

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'), ['errorField' => 'project_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['issue_id'], 'Issues'), ['errorField' => 'issue_id']);

        return $rules;
    }
}
