<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IssueCategories Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\IssueCategory newEmptyEntity()
 * @method \App\Model\Entity\IssueCategory newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\IssueCategory> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IssueCategory get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\IssueCategory findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\IssueCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\IssueCategory> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\IssueCategory|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\IssueCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\IssueCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\IssueCategory>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\IssueCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\IssueCategory> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\IssueCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\IssueCategory>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\IssueCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\IssueCategory> deleteManyOrFail(iterable $entities, array $options = [])
 */
class IssueCategoriesTable extends Table
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

        $this->setTable('issue_categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
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
            ->integer('project_id')
            ->notEmptyString('project_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 60)
            ->notEmptyString('name');

        $validator
            ->integer('assigned_to_id')
            ->allowEmptyString('assigned_to_id');

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

        return $rules;
    }
}
