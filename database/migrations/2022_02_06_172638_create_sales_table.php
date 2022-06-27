<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->foreign('manager_id')->references('id')->on('managers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('customer')->nullable();
            $table->string('phone')->nullable();
            $table->decimal('sub_total', 15, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('amount', 15, 2);
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
        Schema::dropIfExists('sales');
        $table->dropForeign('manager_id');
         $table->dropForeign('table_id');
    }
}
