<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teaches', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedBigInteger('post_id')->nullable();
        $table->unsignedBigInteger('user_id')->nullable();
        $table->timestamps();
        
        $table->index('id');
        $table->index('user_id');
        $table->index('post_id');
    
        $table->unique([
            'user_id',
            'post_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teaches');
    }
}
