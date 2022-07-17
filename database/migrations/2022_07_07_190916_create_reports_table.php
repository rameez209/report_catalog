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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            // To delete the reports for the deleted users, use the onDelete('cascade') function
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('Department')->nullable();
            $table->string('report_name')->nullable();
            $table->string('requested_by')->nullable();
            $table->string('validated_by')->nullable();
            $table->string('frequency')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('screenshot')->nullable();
            $table->longText('description')->nullable();
            // $table->string('run_report');
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
        Schema::dropIfExists('reports');
    }
};
