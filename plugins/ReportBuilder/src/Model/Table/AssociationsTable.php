<?php
declare(strict_types=1);

namespace ReportBuilder\Model\Table;

use Cake\ORM\Exception\MissingTableClassException;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Associations Model
 *
 * @property \ReportBuilder\Model\Table\RbReportsTable&\Cake\ORM\Association\BelongsTo $RbReports
 * @method \ReportBuilder\Model\Entity\Association newEmptyEntity()
 * @method \ReportBuilder\Model\Entity\Association newEntity(array $data, array $options = [])
 * @method array<\ReportBuilder\Model\Entity\Association> newEntities(array $data, array $options = [])
 * @method \ReportBuilder\Model\Entity\Association get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \ReportBuilder\Model\Entity\Association findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \ReportBuilder\Model\Entity\Association patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\ReportBuilder\Model\Entity\Association> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \ReportBuilder\Model\Entity\Association|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \ReportBuilder\Model\Entity\Association saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\ReportBuilder\Model\Entity\Association>|\Cake\Datasource\ResultSetInterface<\ReportBuilder\Model\Entity\Association>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\ReportBuilder\Model\Entity\Association>|\Cake\Datasource\ResultSetInterface<\ReportBuilder\Model\Entity\Association> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\ReportBuilder\Model\Entity\Association>|\Cake\Datasource\ResultSetInterface<\ReportBuilder\Model\Entity\Association>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\ReportBuilder\Model\Entity\Association>|\Cake\Datasource\ResultSetInterface<\ReportBuilder\Model\Entity\Association> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AssociationsTable extends Table
{
    use LocatorAwareTrait;

    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('rb_associations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Reports', [
            'foreignKey' => 'report_id',
            'joinType' => 'INNER',
            'className' => 'ReportBuilder.Reports',
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
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name', 'validAssociation', [
                'rule' => function ($value, $context) {
                    $reportId = $context['data']['report_id'] ?? null;
                    if (!$reportId) {
                        return false;
                    }
                    $reportsTable = $this->fetchTable('ReportBuilder.Reports');
                    $report = $reportsTable->get($reportId);

                    try {
                        $reportsTable->goToAssociation($report->starting_table, $value);
                    } catch (\InvalidArgumentException) {
                        return false;
                    }

                    return true;
                },
                'message' => __('Invalid association'),
            ]);


        $validator
            ->nonNegativeInteger('report_id')
            ->notEmptyString('report_id');

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
        $rules->add($rules->existsIn(['report_id'], 'Reports'), ['errorField' => 'report_id']);

        return $rules;
    }
}
