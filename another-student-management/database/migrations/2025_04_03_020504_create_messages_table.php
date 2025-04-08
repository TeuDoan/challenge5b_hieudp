<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Modify existing users table to add uuid, phone, and profile picture columns
        Schema::table('users', function (Blueprint $table) {
            $table->uuid('uuid')->default(DB::raw('UUID()'))->unique();
            $table->string('phonenumber')->after('email');
            $table->string('profile_picture')->after('phonenumber')->nullable();

        });

        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignUuid('sender_uuid')->constrained('users', 'uuid')->onDelete('cascade');
            $table->foreignUuid('recipient_uuid')->constrained('users', 'uuid')->onDelete('cascade');
            $table->text('message');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop messages table
        Schema::dropIfExists('messages');

        // Remove unique constraint from users table
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_uuid_unique');
        });
    }
};
