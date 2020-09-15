<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomFieldValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_field_values', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('custom_field_id')->constrained()->onDelete('cascade');
            $table->morphs('customizable');

            // Values == custom_field_types
            $table->string('string', 255)->nullable();
            $table->integer('integer')->nullable();
            $table->float('float', 18,6)->nullable();
            $table->date('date')->nullable();
            $table->text('text')->nullable();
            $table->boolean('boolean')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_field_values');
    }
}