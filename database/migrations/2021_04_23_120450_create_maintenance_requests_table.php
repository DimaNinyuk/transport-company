<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_requests', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('comment')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable()->onDelete('cascade')->onUpdate('cascde');
            $table->unsignedBigInteger('user_id')->nullable()->onDelete('cascade')->onUpdate('cascde');
            $table->unsignedBigInteger('product_id')->nullable()->onDelete('cascade')->onUpdate('cascde');
            $table->unsignedBigInteger('status_id')->nullable()->onDelete('cascade')->onUpdate('cascde');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('status_id')->references('id')->on('statuses');
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
        Schema::dropIfExists('maintenance_requests');
    }
}
