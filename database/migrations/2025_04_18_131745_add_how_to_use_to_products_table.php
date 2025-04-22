<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('how_to_use')->nullable();  // يمكنك إضافة خاصية nullable إذا أردت أن يكون العمود قابلًا للاحتواء على قيم فارغة
        });
    }
    
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('how_to_use');
        });
    }
    

    /**
     * Reverse the migrations.
     */
   
};