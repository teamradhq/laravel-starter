<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', static function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(User::class)->default(1);
            $table->string('title');
            $table->text('content');
            $table->string('slug')->unique()->nullable()->index();
            $table->boolean('published')->default(false);
            $table->dateTime('publish_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('posts', static function (Blueprint $table): void {
            $table->dropForeignIdFor(User::class);
        });

        Schema::dropIfExists('posts');
    }
};
