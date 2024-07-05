<?php
declare(strict_types=1);

namespace ReportBuilder\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReportsFixture
 */
class ReportsFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'rb_reports';
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
                'starting_table' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
