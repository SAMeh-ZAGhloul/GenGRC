<?php

use App\Enums\Applicability;
use App\Enums\ControlCategory;
use App\Enums\ControlEnforcementCategory;
use App\Enums\ControlType;
use App\Enums\Effectiveness;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('standard_id'); // Foreign key to the Standard model
            $table->string('title', 1024);
            $table->string('code');
            $table->longText('description');
            $table->longText('discussion')->nullable();
            $table->longText('test')->nullable();
            $table->string('type')->default(ControlType::OTHER);
            $table->string('category')->default(ControlCategory::OTHER);
            $table->string('enforcement')->default(ControlEnforcementCategory::MANDATORY);
            $table->string('effectiveness')->default(Effectiveness::UNKNOWN);
            $table->string('applicability')->default(Applicability::UNKNOWN);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controls');
    }
};
