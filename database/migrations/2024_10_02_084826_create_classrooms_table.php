<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id('IdClass'); // Khóa chính
            $table->string('NameClass'); // Tên lớp
            $table->text('Note')->nullable(); // Ghi chú
            $table->boolean('Deleted')->default(false); // Trạng thái xóa
            $table->timestamps(); // Thêm created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
};
