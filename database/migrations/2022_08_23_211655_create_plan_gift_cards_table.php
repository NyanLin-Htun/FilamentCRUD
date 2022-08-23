<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_gift_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //  $table->unsignedBigInteger('plan_id')->nullable();
            //  $table->integer('count');
             $table->integer('month');
            //  $table->boolean('is_active')->default(false);
             $table->softDeletes();
             $table->timestamps();
 
            //  $table->foreign('plan_id')->references('id')->on('plans')
            //  ->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_gift_cards');
    }
};
