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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            //$table->unsignedBigInteger('categories_id');
            // Grub adı
            $table->string('name');

            // Grub slug
            $table->string('slug');

            // Grub açıklaması
            $table->string('description');

            // Grub görseli
            $table->string('image')->nullable();

            // Grub herkese açık mı?
            $table->enum('public', [PublishedStatus::PUBLISHED->value, PublishedStatus::HIDDEN->value])->default(PublishedStatus::HIDDEN->value);

            // Grub yayında mı
            $table->enum('status', [PublishedStatus::PUBLISHED->value, PublishedStatus::REJECTED->value])->default(PublishedStatus::REJECTED->value);

            //$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('categories_id')->references('id')->on('categories');
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
