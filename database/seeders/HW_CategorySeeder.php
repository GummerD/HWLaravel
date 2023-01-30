<?php

namespace Database\Seeders;

use App\Enumus\NewsStatusEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HW_CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('h_w__categories')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        for ($i = 0; $i <= 5; $i++) {
            $data[] = [
                'title' => \fake()->jobTitle(),
                'description' =>\fake()->text(100),
            ];
        }

        return $data;
    }

}
