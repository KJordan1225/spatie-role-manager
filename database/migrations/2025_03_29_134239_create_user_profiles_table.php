<?php

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
        Schema::create('user_profiles', function (Blueprint $table) {
				$table->id();
                $table->unsignedBigInteger('user_id');
				$table->foreign('user_id')
					->references('id')
					->on('users')
					->onDelete('cascade')
					->onUpdate('cascade');
				$table->string('first_name')->nullable();
				$table->string('last_name')->nullable();
				$table->string('address1')->nullable();
				$table->string('address2')->nullable();
				$table->string('city')->nullable();
				$table->string('state')->nullable();
				$table->string('zip_code')->nullable();
				$table->string('phone_number')->nullable();
				$table->enum('phone_type', ['mobile', 'landline'])->default('mobile');
				$table->date('dob')->nullable();				
				$table->date('queversary')->nullable();
				$table->string('profile_image')->nullable();
				$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
