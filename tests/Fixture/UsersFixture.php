<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'login' => 'Lorem ipsum dolor sit amet',
                'hashed_password' => 'Lorem ipsum dolor sit amet',
                'firstname' => 'Lorem ipsum dolor sit amet',
                'lastname' => 'Lorem ipsum dolor sit amet',
                'admin' => 1,
                'status' => 1,
                'last_login_on' => '2024-07-04 19:14:40',
                'language' => 'Lor',
                'auth_source_id' => 1,
                'created_on' => '2024-07-04 19:14:40',
                'updated_on' => '2024-07-04 19:14:40',
                'type' => 'Lorem ipsum dolor sit amet',
                'identity_url' => 'Lorem ipsum dolor sit amet',
                'mail_notification' => 'Lorem ipsum dolor sit amet',
                'salt' => 'Lorem ipsum dolor sit amet',
                'must_change_passwd' => 1,
                'passwd_changed_on' => '2024-07-04 19:14:40',
                'otp_secret_key' => 'Lorem ipsum dolor sit amet',
                'mobile_phone' => 'Lorem ipsum dolor sit amet',
                'mobile_phone_confirmed' => 1,
                'ignore_2fa' => 1,
                'two_fa_id' => 1.5,
                'api_allowed' => 1,
                'two_fa' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
