<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmailAddress Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $address
 * @property bool $is_default
 * @property bool $notify
 * @property \Cake\I18n\DateTime $created_on
 * @property \Cake\I18n\DateTime $updated_on
 *
 * @property \App\Model\Entity\User $user
 */
class EmailAddress extends Entity
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
        'address' => true,
        'is_default' => true,
        'notify' => true,
        'created_on' => true,
        'updated_on' => true,
        'user' => true,
    ];
}
