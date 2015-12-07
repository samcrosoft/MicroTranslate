<?php

use App\Models\Key\Key;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Custom\Names\TableNames;

/**
 * Class CreateKeysTable
 */
class CreateKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create(Key::getTableName(), function (Blueprint $table) {
            $table->increments(Key::getTablePrimaryKeyName());
            $table->string(Key::COLUMN_NAME)->index();
            $table->mediumText(Key::COLUMN_DESCRIPTION);

            if (Key::IsTimeStampAllowed()) {
                $table->timestamps();
            }

            $table->unique(Key::COLUMN_NAME);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        BaseSeeder::disableForeignKeyGuard();
        Schema::dropIfExists(Key::getTableName());
        BaseSeeder::enableForeignKeyGuard();
    }
}
