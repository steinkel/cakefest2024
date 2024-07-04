<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MemberRole Entity
 *
 * @property int $id
 * @property int $member_id
 * @property int $role_id
 * @property int|null $inherited_from
 *
 * @property \App\Model\Entity\Member $member
 * @property \App\Model\Entity\Role $role
 */
class MemberRole extends Entity
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
        'member_id' => true,
        'role_id' => true,
        'inherited_from' => true,
        'member' => true,
        'role' => true,
    ];
}
