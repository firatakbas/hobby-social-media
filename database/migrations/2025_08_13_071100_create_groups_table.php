<?php

use App\Enums\PublishedStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();

            // Grubu kim kurdu
            $table->unsignedBigInteger('user_id');

            $table->unsignedBigInteger('categories_id');
            // Grub adı
            $table->string('title');

            // Grub slug
            $table->string('slug');

            // Grub açıklaması
            $table->string('description');

            // Grub görseli
            $table->string('image')->nullable();

            // Grub herkese açık mı?
            $table->boolean('public')->default(PublishedStatus::HIDDEN);

            // Grub yayında mı
            $table->boolean('status')->default(PublishedStatus::REJECTED);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
