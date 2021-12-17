<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->float('total_price', 6, 2)->nullable()->unsigned();
            $table->string('customer_firstname', 50);
            $table->string('customer_lastname', 50);
            $table->string('customer_email', 50);
            $table->string('customer_address', 50);
            $table->string('customer_street_number', 50);
            $table->text('notes')->nullable();
            $table->boolean('deliver')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
