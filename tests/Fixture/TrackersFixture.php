<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TrackersFixture
 */
class TrackersFixture extends TestFixture
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
                'description' => 'Lorem ipsum dolor sit amet',
                'is_in_chlog' => 1,
                'position' => 1,
                'is_in_roadmap' => 1,
                'fields_bits' => 1,
                'default_status_id' => 1,
            ],
        ];
        parent::init();
    }
}
