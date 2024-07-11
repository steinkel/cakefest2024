<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddColumns extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $this->table('rb_reports')
            ->addColumn('starting_table_columns', 'text', [
                'null' => true,
            ])
            ->save();
        $this->table('rb_associations')
            ->addColumn('table_columns', 'text', [
                'null' => true,
            ])
            ->save();
    }
}
