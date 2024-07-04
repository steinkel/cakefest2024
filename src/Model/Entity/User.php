<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $login
 * @property string $hashed_password
 * @property string $firstname
 * @property string $lastname
 * @property bool $admin
 * @property int $status
 * @property \Cake\I18n\DateTime|null $last_login_on
 * @property string|null $language
 * @property int|null $auth_source_id
 * @property \Cake\I18n\DateTime|null $created_on
 * @property \Cake\I18n\DateTime|null $updated_on
 * @property string|null $type
 * @property string|null $identity_url
 * @property string $mail_notification
 * @property string|null $salt
 * @property bool $must_change_passwd
 * @property \Cake\I18n\DateTime|null $passwd_changed_on
 * @property string|null $otp_secret_key
 * @property string|null $mobile_phone
 * @property bool $mobile_phone_confirmed
 * @property bool $ignore_2fa
 * @property string|null $two_fa_id
 * @property bool $api_allowed
 * @property string|null $two_fa
 *
 * @property \App\Model\Entity\EmailAddress[] $email_addresses
 * @property \App\Model\Entity\Member[] $members
 * @property \App\Model\Entity\Status[] $statuses
 * @property \App\Model\Entity\TimeEntry[] $time_entries
 */
class User extends Entity
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
        'login' => true,
        'hashed_password' => true,
        'firstname' => true,
        'lastname' => true,
        'admin' => true,
        'status' => true,
        'last_login_on' => true,
        'language' => true,
        'auth_source_id' => true,
        'created_on' => true,
        'updated_on' => true,
        'type' => true,
        'identity_url' => true,
        'mail_notification' => true,
        'salt' => true,
        'must_change_passwd' => true,
        'passwd_changed_on' => true,
        'otp_secret_key' => true,
        'mobile_phone' => true,
        'mobile_phone_confirmed' => true,
        'ignore_2fa' => true,
        'two_fa_id' => true,
        'api_allowed' => true,
        'two_fa' => true,
        'email_addresses' => true,
        'members' => true,
        'statuses' => true,
        'time_entries' => true,
    ];
}
