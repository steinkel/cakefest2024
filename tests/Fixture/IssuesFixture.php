<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IssuesFixture
 */
class IssuesFixture extends TestFixture
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
                'tracker_id' => 1,
                'project_id' => 1,
                'subject' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'due_date' => '2024-07-04',
                'category_id' => 1,
                'status_id' => 1,
                'assigned_to_id' => 1,
                'priority_id' => 1,
                'fixed_version_id' => 1,
                'author_id' => 1,
                'lock_version' => 1,
                'created_on' => '2024-07-04 19:14:39',
                'updated_on' => '2024-07-04 19:14:39',
                'start_date' => '2024-07-04',
                'done_ratio' => 1,
                'estimated_hours' => 1,
                'parent_id' => 1,
                'root_id' => 1,
                'lft' => 1,
                'rgt' => 1,
                'is_private' => 1,
                'closed_on' => '2024-07-04 19:14:39',
            ],
        ];
        parent::init();
    }
}
