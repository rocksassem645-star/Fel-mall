<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Add unique order number
            $table->string('order_number')->unique()->after('id');
            
            // Add payment status
            $table->string('payment_status')->default('pending')->after('status');
            
            // Add addresses
            $table->text('shipping_address')->nullable()->after('payment_status');
            $table->text('billing_address')->nullable()->after('shipping_address');
            
            // Make product_id nullable (since we'll use order_items table later)
            $table->foreignId('product_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['order_number', 'payment_status', 'shipping_address', 'billing_address']);
            $table->foreignId('product_id')->nullable(false)->change();
        });
    }
};