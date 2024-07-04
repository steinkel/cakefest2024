<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tracker Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property bool $is_in_chlog
 * @property int|null $position
 * @property bool $is_in_roadmap
 * @property int|null $fields_bits
 * @property int|null $default_status_id
 *
 * @property \App\Model\Entity\Issue[] $issues
 * @property \App\Model\Entity\Project[] $projects
 */
class Tracker extends Entity
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
        'description' => true,
        'is_in_chlog' => true,
        'position' => true,
        'is_in_roadmap' => true,
        'fields_bits' => true,
        'default_status_id' => true,
        'issues' => true,
        'projects' => true,
    ];
}
