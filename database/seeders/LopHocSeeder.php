<?php

namespace Database\Seeders;

use App\Models\LopHoc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class LopHocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
      
    public function run(): void
    {
        //
        
        LopHoc::factory()->count(20)->create();
    }
    
}
