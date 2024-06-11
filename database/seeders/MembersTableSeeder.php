<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->truncate();
        $members = [
              ['name' => 'taro',
               'age' => 10,
               'zipcode' => '0000000',
               'address' => 'tokyo'],
              ['name' => 'jiro',
               'age' => 20,
               'zipcode' => '0000001',
               'address' => 'tokyo'],
              ['name' => 'saburo',
               'age' => 30,
               'zipcode' => '0000002',
               'address' => 'tokyo'],
             ];
        foreach($members as $member) {
            \App\Models\Member::create($member);
        }
    }
}
