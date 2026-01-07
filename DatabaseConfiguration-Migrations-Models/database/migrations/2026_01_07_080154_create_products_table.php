<?php

/**
 * Migration = طريقة منظمة لإدارة الجداول بالكود
 * up() = تنفيذ وإنشاء
 * down() = تراجع وحذف
 * Laravel يعرف أي migrations اشتغلت من جدول migrations
 * عندما نعمل rollback 
 * يتم عكس التغييرات
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
/**
 * Part 3 :
 * الـ Migration commands تساعدني أدير قاعدة البيانات بشكل منظم.
 * migrate ينشئ الجداول الجديدة فقط.
 * rollback يتراجع عن آخر تعديل.
 * refresh يحذف كل migrations ثم يعيدها من جديد.
 * fresh يحذف كل جداول قاعدة البيانات ثم ينشئها من الصفر.
 * الأكثر خطورة هو fresh لأنه يحذف كل الجداول بدون استثناء.
 */

    /**
     * Part 4 :
     * nullable() تجعل الحقل اختياري، بحيث يمكن أن يكون فارغًا بدون حدوث خطأ.
     * unique() تجعل القيمة في العمود غير قابلة للتكرار، بحيث لا يمكن إدخال نفس القيمة مرتين في الجدول.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();   // لا يسمح بالتكرار

            $table->decimal('price', 8, 2);

            $table->integer('quantity');

            $table->text('description')->nullable();  // يسمح أن تكون فارغة

            $table->timestamps();
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
