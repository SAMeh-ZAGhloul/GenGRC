<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('implementations', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('title');
            $table->text('details')->nullable();
            $table->string('status')->default(\App\Enums\ImplementationStatus::UNKNOWN);
            $table->string('effectiveness')->default(\App\Enums\Effectiveness::UNKNOWN);
            $table->text('notes')->nullable();
            $table->text('test_procedure')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('implementations');
    }
};
