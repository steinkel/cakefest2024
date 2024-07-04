<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IssueCategoriesFixture
 */
class IssueCategoriesFixture extends TestFixture
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
                'project_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'assigned_to_id' => 1,
            ],
        ];
        parent::init();
    }
}
