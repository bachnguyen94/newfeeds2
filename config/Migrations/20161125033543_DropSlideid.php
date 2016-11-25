<?php
use Migrations\AbstractMigration;

class DropSlideid extends AbstractMigration
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
        $table = $this->table('businesses');
        $table->removeColumn('slide_id');
        $table = $this->table('fashions');
        $table->removeColumn('slide_id');
        $table = $this->table('games');
        $table->removeColumn('slide_id');
        $table = $this->table('technologies');
        $table->removeColumn('slide_id');
        $table = $this->table('photographies');
        $table->removeColumn('slide_id');
        $table->drop();
    }
}
