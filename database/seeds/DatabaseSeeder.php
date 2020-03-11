<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Products;
use App\Banks;
use App\User;
use App\Subscribers;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            'bank_name' => 'BCA',
            'bank_code' => '014',
            'bank_nasabah' => 'Wildan Fuady',
            'bank_number' => '089545334',
            'bank_status' => 'Valid',
            'bank_image' => 'banks/bca.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('banks')->insert([
            'bank_name' => 'BNI',
            'bank_code' => '009',
            'bank_nasabah' => 'Wildan Fuady',
            'bank_number' => '0353884883',
            'bank_status' => 'Valid',
            'bank_image' => 'banks/bni.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('banks')->insert([
            'bank_name' => 'BRI',
            'bank_code' => '012',
            'bank_nasabah' => 'Wildan Fuady',
            'bank_number' => '908765434343',
            'bank_status' => 'Valid',
            'bank_image' => 'banks/bri.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('banks')->insert([
            'bank_name' => 'Mandiri',
            'bank_code' => '008',
            'bank_nasabah' => 'Wildan Fuady',
            'bank_number' => '543434343',
            'bank_status' => 'Valid',
            'bank_image' => 'banks/mandiri.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'product_name' => 'Pro 1',
            'product_desc' => 'Lorem ipsum',
            'product_max_db' => '3000',
            'product_status' => 'Valid',
            'product_price' => '100000',
            'product_type' => 'bulanan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'product_name' => 'Pro 2',
            'product_desc' => 'Lorem ipsum',
            'product_max_db' => '5000',
            'product_status' => 'Valid',
            'product_price' => '150000',
            'product_type' => 'bulanan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'product_name' => 'Pro 3',
            'product_desc' => 'Lorem ipsum',
            'product_max_db' => '10000',
            'product_status' => 'Valid',
            'product_price' => '250000',
            'product_type' => 'bulanan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'User Aktif',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'User Expired',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'User Baru',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('roles')->insert([
            'id' => 4,
            'name' => 'Developer',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $permissions = [
            // ADMIN
            'dashboard-admin',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'bank-list',
            'bank-create',
            'bank-edit',
            'bank-delete',
            'order-list',
            'order-create',
            'order-edit',
            'order-delete',
            'promo-list',
            'promo-create',
            'promo-edit',
            'promo-delete',
            'payment-list',
            'payment-create',
            'payment-edit',
            'payment-delete',
            'report-list',
            'report-create',
            'report-edit',
            'report-delete',
            'setting-list',
            'setting-create',
            'setting-edit',
            'setting-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'grafik-pengunjung',
            'grafik-penjualan',
            'grafik-promo',
            'grafik-user',
            'article-list',
            'article-create',
            'article-edit',
            'article-delete',
            'notify-list',
            'notify-create',
            'notify-edit',
            'notify-delete',
            // USER
            'dashboard-user',
            'campaign-list',
            'campaign-create',
            'campaign-edit',
            'campaign-delete',
            'list-subscriber-list',
            'list-subscriber-create',
            'list-subscriber-edit',
            'list-subscriber-delete',
            'mysubscriber-list',
            'mysubscriber-create',
            'mysubscriber-edit',
            'mysubscriber-delete',
            'mysubscriber-detail',
            'mysubscriber-detail-create',
            'mysubscriber-detail-delete',
            'mysubscriber-detail-export',
            'profile-list',
            'profile-edit',
            'profile-edit-password',
            'report-user',
            'report-user-detail',
            'new_user-payment-confirmation',
            'new_user-payment-detail',
         ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
