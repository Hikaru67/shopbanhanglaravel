<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messengers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->foreign('sender_id')->references('customer_id')->on('tbl_customers');
            $table->foreignId('conversation_id')->constrained('conversations');
            /*$table->unsignedBigInteger('receiver_id');
            $table->foreign('receiver_id')->references('customer_id')->on('tbl_customers');*/
            $table->text('content');
            $table->tinyInteger('type_message')->default(TYPE_MESSAGE['TEXT']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messengers');
    }
}
