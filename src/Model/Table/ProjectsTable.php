<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $ParentProjects
 * @property \App\Model\Table\IssueCategoriesTable&\Cake\ORM\Association\HasMany $IssueCategories
 * @property \App\Model\Table\IssuesTable&\Cake\ORM\Association\HasMany $Issues
 * @property \App\Model\Table\MembersTable&\Cake\ORM\Association\HasMany $Members
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\HasMany $ChildProjects
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\HasMany $Statuses
 * @property \App\Model\Table\TimeEntriesTable&\Cake\ORM\Association\HasMany $TimeEntries
 * @property \App\Model\Table\TrackersTable&\Cake\ORM\Association\BelongsToMany $Trackers
 *
 * @method \App\Model\Entity\Project newEmptyEntity()
 * @method \App\Model\Entity\Project newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Project> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Project findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Project> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Project saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProjectsTable extends Table
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

        $this->setTable('projects');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ParentProjects', [
            'className' => 'Projects',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('IssueCategories', [
            'foreignKey' => 'project_id',
        ]);
        $this->hasMany('Issues', [
            'foreignKey' => 'project_id',
        ]);
        $this->hasMany('Members', [
            'foreignKey' => 'project_id',
        ]);
        $this->hasMany('ChildProjects', [
            'className' => 'Projects',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('Statuses', [
            'foreignKey' => 'project_id',
        ]);
        $this->hasMany('TimeEntries', [
            'foreignKey' => 'project_id',
        ]);
        $this->belongsToMany('Trackers', [
            'foreignKey' => 'project_id',
            'targetForeignKey' => 'tracker_id',
            'joinTable' => 'projects_trackers',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('homepage')
            ->maxLength('homepage', 255)
            ->allowEmptyString('homepage');

        $validator
            ->boolean('is_public')
            ->notEmptyString('is_public');

        $validator
            ->integer('parent_id')
            ->allowEmptyString('parent_id');

        $validator
            ->dateTime('created_on')
            ->allowEmptyDateTime('created_on');

        $validator
            ->dateTime('updated_on')
            ->allowEmptyDateTime('updated_on');

        $validator
            ->scalar('identifier')
            ->maxLength('identifier', 255)
            ->allowEmptyString('identifier');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        $validator
            ->integer('rgt')
            ->allowEmptyString('rgt');

        $validator
            ->boolean('inherit_members')
            ->notEmptyString('inherit_members');

        $validator
            ->integer('default_version_id')
            ->allowEmptyString('default_version_id');

        $validator
            ->integer('default_assigned_to_id')
            ->allowEmptyString('default_assigned_to_id');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentProjects'), ['errorField' => 'parent_id']);

        return $rules;
    }
}
