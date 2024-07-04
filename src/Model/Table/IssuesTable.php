<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Issues Model
 *
 * @property \App\Model\Table\TrackersTable&\Cake\ORM\Association\BelongsTo $Trackers
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\IssuesTable&\Cake\ORM\Association\BelongsTo $ParentIssues
 * @property \App\Model\Table\IssuesTable&\Cake\ORM\Association\HasMany $ChildIssues
 * @property \App\Model\Table\TimeEntriesTable&\Cake\ORM\Association\HasMany $TimeEntries
 *
 * @method \App\Model\Entity\Issue newEmptyEntity()
 * @method \App\Model\Entity\Issue newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Issue> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Issue get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Issue findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Issue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Issue> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Issue|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Issue saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Issue>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Issue>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Issue>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Issue> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Issue>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Issue>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Issue>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Issue> deleteManyOrFail(iterable $entities, array $options = [])
 */
class IssuesTable extends Table
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

        $this->setTable('issues');
        $this->setDisplayField('subject');
        $this->setPrimaryKey('id');

        $this->belongsTo('Trackers', [
            'foreignKey' => 'tracker_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ParentIssues', [
            'className' => 'Issues',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('ChildIssues', [
            'className' => 'Issues',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('TimeEntries', [
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
            ->integer('tracker_id')
            ->notEmptyString('tracker_id');

        $validator
            ->integer('project_id')
            ->notEmptyString('project_id');

        $validator
            ->scalar('subject')
            ->maxLength('subject', 255)
            ->notEmptyString('subject');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->allowEmptyString('description');

        $validator
            ->date('due_date')
            ->allowEmptyDate('due_date');

        $validator
            ->integer('category_id')
            ->allowEmptyString('category_id');

        $validator
            ->integer('status_id')
            ->notEmptyString('status_id');

        $validator
            ->integer('assigned_to_id')
            ->allowEmptyString('assigned_to_id');

        $validator
            ->integer('priority_id')
            ->requirePresence('priority_id', 'create')
            ->notEmptyString('priority_id');

        $validator
            ->integer('fixed_version_id')
            ->allowEmptyString('fixed_version_id');

        $validator
            ->integer('author_id')
            ->requirePresence('author_id', 'create')
            ->notEmptyString('author_id');

        $validator
            ->integer('lock_version')
            ->notEmptyString('lock_version');

        $validator
            ->dateTime('created_on')
            ->allowEmptyDateTime('created_on');

        $validator
            ->dateTime('updated_on')
            ->allowEmptyDateTime('updated_on');

        $validator
            ->date('start_date')
            ->allowEmptyDate('start_date');

        $validator
            ->integer('done_ratio')
            ->notEmptyString('done_ratio');

        $validator
            ->numeric('estimated_hours')
            ->allowEmptyString('estimated_hours');

        $validator
            ->integer('parent_id')
            ->allowEmptyString('parent_id');

        $validator
            ->integer('root_id')
            ->allowEmptyString('root_id');

        $validator
            ->integer('rgt')
            ->allowEmptyString('rgt');

        $validator
            ->boolean('is_private')
            ->notEmptyString('is_private');

        $validator
            ->dateTime('closed_on')
            ->allowEmptyDateTime('closed_on');

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
        $rules->add($rules->existsIn(['tracker_id'], 'Trackers'), ['errorField' => 'tracker_id']);
        $rules->add($rules->existsIn(['project_id'], 'Projects'), ['errorField' => 'project_id']);
        $rules->add($rules->existsIn(['status_id'], 'Statuses'), ['errorField' => 'status_id']);
        $rules->add($rules->existsIn(['parent_id'], 'ParentIssues'), ['errorField' => 'parent_id']);

        return $rules;
    }
}
