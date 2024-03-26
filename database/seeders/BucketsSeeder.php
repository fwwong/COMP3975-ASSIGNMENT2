<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buckets;

class BucketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buckets::insert([
            ['TransactionType' => 'Entertainment', 'Company' => 'ST JAMES RESTAURAT'],
            ['TransactionType' => 'Communication', 'Company' => 'ROGERS MOBILE'],
            ['TransactionType' => 'Groceries', 'Company' => 'SAFEWAY'],
            ['TransactionType' => 'Donations', 'Company' => 'RED CROSS'],
            ['TransactionType' => 'Entertainment', 'Company' => 'PUR & SIMPLE RESTAR'],
            ['TransactionType' => 'Groceries', 'Company' => 'REAL CDN SUPERS'],
            ['TransactionType' => 'Car Insurance', 'Company' => 'ICBC'],
            ['TransactionType' => 'Gas Heating', 'Company' => 'FORTISBC'],
            // Add more sample data as needed
        ]);
    }
}
