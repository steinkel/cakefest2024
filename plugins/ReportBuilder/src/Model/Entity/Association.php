<?php
declare(strict_types=1);

namespace ReportBuilder\Model\Entity;

use Cake\ORM\Entity;

/**
 * Association Entity
 *
 * @property int $id
 * @property string $name
 * @property int $report_id
 *
 * @property \ReportBuilder\Model\Entity\RbReport $rb_report
 */
class Association extends Entity
{
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
        'report_id' => true,
        'rb_report' => true,
        'table_columns' => true,
    ];
}
