<?php
declare(strict_types=1);

namespace ReportBuilder\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AssociationsFixture
 */
class AssociationsFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'rb_associations';
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
                'report_id' => 1,
            ],
        ];
        parent::init();
    }
}
