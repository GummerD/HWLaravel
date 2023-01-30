<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HW_NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('h_w__news')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        for ($i = 0; $i <= 10; $i++) {
            $data[] = [
                'title' => \fake()->jobTitle(),
                'author' => \fake()->userName(),
                'statuse' => NewsStatusEnum::DRAFT->value,
                'description' =>\fake()->text(100),
            ];
        }

        return $data;
    }
}
