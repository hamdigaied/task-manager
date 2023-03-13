<?php

use App\Enums\Priority;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('priority', array_column(Priority::cases(), 'value'));
            $table->unsignedBigInteger('project_id')->nullable();
            $table->timestamps();
 
            // Set foreign key constraint for project_id column
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
