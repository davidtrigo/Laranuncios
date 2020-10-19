<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToAnunciosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // crea el campo user_id se realaciona con users.id
        Schema::table('anuncios', function (Blueprint $table) {
            $table->unsignedInteger('user_id')
                ->nullable()
                ->after('imagen');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anuncios', function (Blueprint $table) {
         $table->dropForeign('anuncios_user_id_foreign');
         $table->dropColumn('user_id');
       
        });
    }
}
