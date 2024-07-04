<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trackers Model
 *
 * @property \App\Model\Table\IssuesTable&\Cake\ORM\Association\HasMany $Issues
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsToMany $Projects
 * @method \App\Model\Entity\Tracker newEmptyEntity()
 * @method \App\Model\Entity\Tracker newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Tracker> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tracker get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Tracker findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Tracker patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Tracker> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tracker|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Tracker saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Tracker>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tracker>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tracker>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tracker> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tracker>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tracker>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tracker>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tracker> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TrackersTable extends Table
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

        $this->setTable('trackers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Issues', [
            'foreignKey' => 'tracker_id',
        ]);
        $this->belongsToMany('Projects', [
            'foreignKey' => 'tracker_id',
            'targetForeignKey' => 'project_id',
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
            ->maxLength('name', 30)
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

        $validator
            ->boolean('is_in_chlog')
            ->notEmptyString('is_in_chlog');

        $validator
            ->integer('position')
            ->allowEmptyString('position');

        $validator
            ->boolean('is_in_roadmap')
            ->notEmptyString('is_in_roadmap');

        $validator
            ->integer('fields_bits')
            ->allowEmptyString('fields_bits');

        $validator
            ->integer('default_status_id')
            ->allowEmptyString('default_status_id');

        return $validator;
    }
}
