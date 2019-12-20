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
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email_verified_at' => now(),
            'status' => 'Valid',
            'level' => 'admin',
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
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
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'product_name' => 'Pro 2',
            'product_desc' => 'Lorem ipsum',
            'product_max_db' => '5000',
            'product_status' => 'Valid',
            'product_price' => '150000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'product_name' => 'Pro 3',
            'product_desc' => 'Lorem ipsum',
            'product_max_db' => '10000',
            'product_status' => 'Valid',
            'product_price' => '250000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'users-list',
            'users-create',
            'users-edit',
            'users-delete',
            'banks-list',
            'banks-create',
            'banks-edit',
            'banks-delete',
            'orders-list',
            'orders-create',
            'orders-edit',
            'orders-delete',
            'promos-list',
            'promos-create',
            'promos-edit',
            'promos-delete',
            'payments-list',
            'payments-create',
            'payments-edit',
            'payments-delete',
            'statistics-list',
            'statistics-create',
            'statistics-edit',
            'statistics-delete',
            'reports-list',
            'reports-create',
            'reports-edit',
            'reports-delete',
            'settings-list',
            'settings-create',
            'settings-edit',
            'settings-delete',
            'products-list',
            'products-create',
            'products-edit',
            'products-delete',
            'grafik-pengunjung',
            'grafik-penjualan',
            'grafik-promo',
            'grafik-user',
            'form-list',
            'form-create',
            'form-edit',
            'form-delete',
            'landingpage-list',
            'landingpage-create',
            'landingpage-edit',
            'landingpage-delete',
            'autoresponder-list',
            'autoresponder-create',
            'autoresponder-edit',
            'autoresponder-delete',
            'list-subscriber-list',
            'list-subscriber-create',
            'list-subscriber-edit',
            'list-subscriber-delete',
            'mysubscriber-list',
            'mysubscriber-create',
            'mysubscriber-edit',
            'mysubscriber-delete',
            'testimonial-list',
            'testimonial-create',
            'testimonial-edit',
            'testimonial-delete',
            'report-user',
            'setting-user',
            'order-user',
            'dashboard-admin',
            'dashboard-user',
         ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        factory(User::class, 20)->create();
        factory(Subscribers::class, 20)->create();
    }
}
