<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nav_links', static function (Blueprint $table): void {
            $table->id();
            $table->string('title', 50);
            $table->string('group', 50)->default('main')->index();
            $table->string('url', 2083)->nullable();
            $table->string('route_name')->nullable();
            $table->json('route_parameters')->nullable();
            $table->boolean('is_guest_link_only')->default(false);
            $table->boolean('is_auth_link_only')->default(false);
            $table->unsignedInteger('order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nav_links');
    }
};
