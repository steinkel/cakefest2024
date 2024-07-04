<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TimeEntriesFixture
 */
class TimeEntriesFixture extends TestFixture
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
                'author_id' => 1,
                'user_id' => 1,
                'issue_id' => 1,
                'hours' => 1,
                'comments' => 'Lorem ipsum dolor sit amet',
                'activity_id' => 1,
                'spent_on' => '2024-07-04',
                'tyear' => 1,
                'tmonth' => 1,
                'tweek' => 1,
                'created_on' => '2024-07-04 19:14:40',
                'updated_on' => '2024-07-04 19:14:40',
                'rate_id' => 1,
            ],
        ];
        parent::init();
    }
}
