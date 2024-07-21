<?php
declare(strict_types=1);

namespace ReportBuilder\Model\Entity;

use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Entity;
use Cake\ORM\Locator\LocatorAwareTrait;

/**
 * Report Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string $starting_table
 * @property array $starting_table_colums
 * @property array $filters
 */
class Report extends Entity
{
    use LocatorAwareTrait;

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'starting_table' => true,
        'starting_table_colums' => true,
        'filters' => true,
    ];

    protected function _getAllColumns(): array
    {
        $allColumns = [
            $this->starting_table => $this->fetchTable($this->starting_table)->getSchema()->columns(),
        ];

        $reportsTable = $this->fetchTable('ReportBuilder.Reports');
        foreach ($this->associations ?? [] as $association) {
            [$associationTable,] = $reportsTable->goToAssociation($this->starting_table, $association->name);
            $allColumns[$association->name] = $associationTable->getSchema()->columns();
        }

        return $allColumns;
    }

    public function getAssociationByName(string $associationName): Association|null
    {
        foreach ($this->associations as $association) {
            if ($association->name === $associationName) {
                return $association;
            }
        }

        return null;
    }

    public function columnForeignKeyAssociationName(string $column): string|null
    {
        $startingTable = $this->fetchTable($this->starting_table);
        foreach ($startingTable->associations() as $name => $association) {
            if ($association instanceof BelongsTo && $association->getForeignKey() === $column) {
                return $association->getName();
            }
        }

        return null;
    }
}
