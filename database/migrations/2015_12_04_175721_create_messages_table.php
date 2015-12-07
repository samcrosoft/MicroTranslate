<?php

use App\Models\Key\Key;
use App\Models\Locale\Locale;
use App\Models\Messages\Message;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $this->down();

        Schema::create(Message::getTableName(), function (Blueprint $table) {
            $table->increments(Message::getTablePrimaryKeyName());
            $table->unsignedInteger(Message::COLUMN_KEY_ID)->nullable()->index();
            $table->unsignedInteger(Message::COLUMN_LOCALE_ID)->nullable()->index();
            $table->mediumText(Message::COLUMN_TEXT)->nullable();

            if (Message::IsTimeStampAllowed()) {
                $table->timestamps();
            }

            // make the key id and locale code unique
            $table->unique([Message::COLUMN_KEY_ID, Message::COLUMN_LOCALE_ID]);


            /*
             * Foreign Keys
             */
            $table->foreign(Message::COLUMN_KEY_ID)
                ->references(Key::getTablePrimaryKeyName())
                ->on(Key::getTableName())
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->foreign(Message::COLUMN_LOCALE_ID)
                ->references(Locale::getTablePrimaryKeyName())
                ->on(Locale::getTableName())
                ->onDelete("cascade")
                ->onUpdate("cascade");
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
        Schema::dropIfExists(Message::getTableName());
        BaseSeeder::enableForeignKeyGuard();
    }
}
