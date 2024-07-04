<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectsTrackers Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\TrackersTable&\Cake\ORM\Association\BelongsTo $Trackers
 * @method \App\Model\Entity\ProjectsTracker newEmptyEntity()
 * @method \App\Model\Entity\ProjectsTracker newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ProjectsTracker> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectsTracker get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ProjectsTracker findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ProjectsTracker patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ProjectsTracker> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectsTracker|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ProjectsTracker saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectsTracker>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectsTracker>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectsTracker>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectsTracker> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectsTracker>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectsTracker>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProjectsTracker>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProjectsTracker> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProjectsTrackersTable extends Table
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

        $this->setTable('projects_trackers');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Trackers', [
            'foreignKey' => 'tracker_id',
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
            ->integer('tracker_id')
            ->notEmptyString('tracker_id');

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
        $rules->add($rules->isUnique(['project_id', 'tracker_id']), ['errorField' => 'project_id']);
        $rules->add($rules->existsIn(['project_id'], 'Projects'), ['errorField' => 'project_id']);
        $rules->add($rules->existsIn(['tracker_id'], 'Trackers'), ['errorField' => 'tracker_id']);

        return $rules;
    }
}
