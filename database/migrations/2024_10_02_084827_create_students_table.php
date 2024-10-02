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
        Schema::create('students', function (Blueprint $table) {
            $table->id('MSSV'); // Khóa chính
            $table->string('LastName'); // Họ
            $table->string('FirstName'); // Tên
            $table->date('BirthDay'); // Ngày sinh
            $table->enum('Gender', ['Male', 'Female']); // Giới tính
            $table->string('Avatar')->nullable(); // Đường dẫn ảnh đại diện
            $table->unsignedBigInteger('IdClass'); // Khóa ngoại liên kết với bảng classrooms
            $table->foreign('IdClass')->references('IdClass')->on('classrooms')->onDelete('cascade'); // Khóa ngoại
            
            $table->timestamps(); // Thêm created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
