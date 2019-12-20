<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
           'report-user',
           'setting-user',
           'order-user',
           'dashboard-admin',
           'dashboard-user',
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}