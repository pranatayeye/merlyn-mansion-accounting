<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'transaction_date' => '2022-01-01 00:00:00',
                'description' => 'Saldo Awal',
                'status' => 'Masuk',
                'quantity' => 9000000,
            ],
            [
                'transaction_date' => '2022-02-01 00:00:00',
                'description' => 'Saldo Awal',
                'status' => 'Masuk',
                'quantity' => 9000000,
            ],
            [
                'transaction_date' => '2022-02-11 00:00:00',
                'description' => 'Tambah Dana',
                'status' => 'Masuk',
                'quantity' => 1000000,
            ],
            [
                'transaction_date' => '2023-01-01 00:00:00',
                'description' => 'Saldo Awal',
                'status' => 'Masuk',
                'quantity' => 10000000,
            ],
            [
                'transaction_date' => '2023-01-03 00:00:00',
                'description' => 'Uang Sewa Mr Smith',
                'status' => 'Masuk',
                'quantity' => 3000000,
            ],
            [
                'transaction_date' => '2023-01-03 00:00:00',
                'description' => 'Uang Sewa Pak Anwar',
                'status' => 'Masuk',
                'quantity' => 2000000,
            ],
            [
                'transaction_date' => '2023-01-04 00:00:00',
                'description' => 'Minum & Makan Mr Smith',
                'status' => 'Masuk',
                'quantity' => 300000,
            ],
            [
                'transaction_date' => '2023-01-05 00:00:00',
                'description' => 'Beli Meja Kantor',
                'status' => 'Keluar',
                'quantity' => 600000,
            ],
            [
                'transaction_date' => '2023-01-06 00:00:00',
                'description' => 'Beli Gas Elpiji',
                'status' => 'Keluar',
                'quantity' => 250000,
            ],
            [
                'transaction_date' => '2023-01-27 00:00:00',
                'description' => 'Bayar Gaji Karyawan',
                'status' => 'Keluar',
                'quantity' => 2000000,
            ],
            [
                'transaction_date' => '2023-01-28 00:00:00',
                'description' => 'Bayar Listrik dan Air',
                'status' => 'Keluar',
                'quantity' => 1250000,
            ],
        ];

        foreach ($data as $item) {
            Transaction::insert([
                'transaction_date' => $item['transaction_date'],
                'description' => $item['description'],
                'status' => $item['status'],
                'quantity' => $item['quantity'],
                'user_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        };
    }
}
