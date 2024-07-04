<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MemberRolesFixture
 */
class MemberRolesFixture extends TestFixture
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
                'member_id' => 1,
                'role_id' => 1,
                'inherited_from' => 1,
            ],
        ];
        parent::init();
    }
}
