<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StatusesFixture
 */
class StatusesFixture extends TestFixture
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
                'project_id' => 1,
                'message' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2024-07-04 19:14:40',
                'updated_at' => '2024-07-04 19:14:40',
                'created_on' => '2024-07-04',
            ],
        ];
        parent::init();
    }
}
