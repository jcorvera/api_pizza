<?php

use App\Models\Order\BranchOffice;
use Illuminate\Database\Seeder;

class BranchOfficeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BranchOffice::class, 4)->create();
    }
}
