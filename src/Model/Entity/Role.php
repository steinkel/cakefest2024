<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Role Entity
 *
 * @property int $id
 * @property string $name
 * @property int|null $position
 * @property bool|null $assignable
 * @property int $builtin
 * @property string|null $permissions
 * @property string $issues_visibility
 * @property string $users_visibility
 * @property string $time_entries_visibility
 * @property bool $all_roles_managed
 * @property string|null $settings
 *
 * @property \App\Model\Entity\MemberRole[] $member_roles
 */
class Role extends Entity
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
        'position' => true,
        'assignable' => true,
        'builtin' => true,
        'permissions' => true,
        'issues_visibility' => true,
        'users_visibility' => true,
        'time_entries_visibility' => true,
        'all_roles_managed' => true,
        'settings' => true,
        'member_roles' => true,
    ];
}
