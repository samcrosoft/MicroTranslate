<?php

use App\Models\Locale\Locale;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateLocaleTable
 */
class CreateLocaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create(Locale::getTableName(), function(Blueprint $oTable){
            $oTable->increments(Locale::getTablePrimaryKeyName());
            $oTable->string(Locale::COLUMN_CODE, 10)->index();
            $oTable->string(Locale::COLUMN_NAME);
            $oTable->string(Locale::COLUMN_DESCRIPTION);

            // make it unique
            $oTable->unique(Locale::COLUMN_CODE);

            if(Locale::IsTimeStampAllowed()){
                $oTable->timestamps();
            }
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
        Schema::dropIfExists(Locale::getTableName());
        BaseSeeder::enableForeignKeyGuard();
    }
}
