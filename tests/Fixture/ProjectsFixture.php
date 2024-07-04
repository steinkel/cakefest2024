<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectsFixture
 */
class ProjectsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'homepage' => 'Lorem ipsum dolor sit amet',
                'is_public' => 1,
                'parent_id' => 1,
                'created_on' => '2024-07-04 19:14:39',
                'updated_on' => '2024-07-04 19:14:39',
                'identifier' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'lft' => 1,
                'rgt' => 1,
                'inherit_members' => 1,
                'default_version_id' => 1,
                'default_assigned_to_id' => 1,
            ],
        ];
        parent::init();
    }
}
