<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Status Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $project_id
 * @property string|null $message
 * @property \Cake\I18n\DateTime|null $created_at
 * @property \Cake\I18n\DateTime|null $updated_at
 * @property \Cake\I18n\Date|null $created_on
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Issue[] $issues
 */
class Status extends Entity
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
        'user_id' => true,
        'project_id' => true,
        'message' => true,
        'created_at' => true,
        'updated_at' => true,
        'created_on' => true,
        'user' => true,
        'project' => true,
        'issues' => true,
    ];
}
