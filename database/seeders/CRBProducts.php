<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CrbProduct;

class CRBProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CrbProduct::create([
            'name' => 'Product101',
            'description' => '',
            'code' => '101',
            'tag' => 'crb'
        ]);
        CrbProduct::create([
            'name' => 'Product102',
            'description' => '',
            'code' => '102',
            'tag' => 'crb'
        ]);
        CrbProduct::create([
            'name' => 'Product103',
            'description' => '',
            'code' => '103',
            'tag' => 'crb'
        ]);
        CrbProduct::create([
            'name' => 'Product104',
            'description' => '',
            'code' => '104',
            'tag' => 'crb'
        ]);
        CrbProduct::create([
            'name' => 'Product105',
            'description' => '',
            'code' => '105',
            'tag' => 'crb'
        ]);
        CrbProduct::create([
            'name' => 'Product106',
            'description' => '',
            'code' => '106',
            'tag' => 'crb'
        ]);
    }
}
