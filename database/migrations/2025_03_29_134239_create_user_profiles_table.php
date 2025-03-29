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
				$table->string('first_name');
				$table->string('last_name');
				$table->string('address1');
				$table->string('address2')->nullable();
				$table->string('city');
				$table->string('state');
				$table->string('zip_code');
				$table->string('phone_number');
				$table->enum('phone_type', ['mobile', 'landline'])->default('mobile');
				$table->date('dob');
				$table->date('queversary');
				$table->text('detail');
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
