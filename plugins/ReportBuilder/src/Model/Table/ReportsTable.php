<?php
declare(strict_types=1);

namespace ReportBuilder\Model\Table;

use Cake\Database\Schema\TableSchemaInterface;
use Cake\ORM\Exception\MissingTableClassException;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;
use ReportBuilder\Model\Entity\Report;

/**
 * Reports Model
 *
 * @method \ReportBuilder\Model\Entity\Report newEmptyEntity()
 * @method \ReportBuilder\Model\Entity\Report newEntity(array $data, array $options = [])
 * @method array<\ReportBuilder\Model\Entity\Report> newEntities(array $data, array $options = [])
 * @method \ReportBuilder\Model\Entity\Report get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \ReportBuilder\Model\Entity\Report findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \ReportBuilder\Model\Entity\Report patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\ReportBuilder\Model\Entity\Report> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \ReportBuilder\Model\Entity\Report|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \ReportBuilder\Model\Entity\Report saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\ReportBuilder\Model\Entity\Report>|\Cake\Datasource\ResultSetInterface<\ReportBuilder\Model\Entity\Report>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\ReportBuilder\Model\Entity\Report>|\Cake\Datasource\ResultSetInterface<\ReportBuilder\Model\Entity\Report> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\ReportBuilder\Model\Entity\Report>|\Cake\Datasource\ResultSetInterface<\ReportBuilder\Model\Entity\Report>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\ReportBuilder\Model\Entity\Report>|\Cake\Datasource\ResultSetInterface<\ReportBuilder\Model\Entity\Report> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ReportsTable extends Table
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

        $this->setTable('rb_reports');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->hasMany('Associations')
            ->setClassName(AssociationsTable::class)
            ->setForeignKey('report_id')
            ->setDependent(true);
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
            ->allowEmptyString('name');

        $validator
            ->scalar('starting_table')
            ->maxLength('starting_table', 255)
            ->requirePresence('starting_table', 'create')
            ->notEmptyString('starting_table')
            ->add('starting_table', 'tableExists', [
                'rule' => function ($value, $context) {
                    try {
                        $this->fetchTable($value);
                    } catch (MissingTableClassException) {
                        return false;
                    }

                    return true;
                },
                'message' => __('Table not found'),
            ]);

        return $validator;
    }

    public function getSchema(): TableSchemaInterface
    {
        return parent::getSchema()
            ->setColumnType('starting_table_columns', 'commaSeparated');
    }

    public function goToAssociation(string $initialTable, ?string $association = null): array
    {
        $currentTable = $this->fetchTable($initialTable);
        $associationsArray = Text::tokenize($association ?? '', '.');
        foreach ($associationsArray as $associationItem) {
            $currentTable = $currentTable->getAssociation($associationItem);
        }

        return [$currentTable, $currentTable->associations()];
    }

    public function saveAssociationColumns(Report $report, array $data)
    {
        // columns for the starting table
        $columnsForStartingTable = $data[$report->starting_table] ?? [];
        $report->starting_table_columns = $this->checkedColumns($columnsForStartingTable);
        unset($data[$report->starting_table]);

        foreach ($data as $associationName => $columns) {
            $association = $report->getAssociationByName(str_replace(':', '.', $associationName));
            if ($association) {
                $association->table_columns = $this->checkedColumns($columns);
                $report->setDirty('associations');
            }
        }

        return $this->save($report);
    }

    protected function checkedColumns(array $columns): array
    {
        return array_keys(
            collection($columns)
                ->filter(function ($value) {
                    return $value === '1';
                })
                ->toArray()
        );
    }
}
