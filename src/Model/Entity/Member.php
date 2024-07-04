<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Member Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 * @property \Cake\I18n\DateTime|null $created_on
 * @property bool $mail_notification
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\MemberRole[] $member_roles
 */
class Member extends Entity
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
        'created_on' => true,
        'mail_notification' => true,
        'user' => true,
        'project' => true,
        'member_roles' => true,
    ];
}
