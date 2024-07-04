<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmailAddressesFixture
 */
class EmailAddressesFixture extends TestFixture
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
                'user_id' => 1,
                'address' => 'Lorem ipsum dolor sit amet',
                'is_default' => 1,
                'notify' => 1,
                'created_on' => '2024-07-04 19:14:39',
                'updated_on' => '2024-07-04 19:14:39',
            ],
        ];
        parent::init();
    }
}
