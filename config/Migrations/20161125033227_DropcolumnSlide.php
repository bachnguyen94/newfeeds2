<?php
use Migrations\AbstractMigration;

class DropcolumnSlide extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('slides');
        $table->removeColumn('imageUrl');
        $table->removeColumn('description');
        $table->removeColumn('title');
    }
}
