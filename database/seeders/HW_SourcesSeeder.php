<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HW_SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('h_w__sources')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        for ($i = 0; $i <= 10; $i++) {
            $data[] = [
                'source_name' => \fake()->domainName(),
                'source_url' => \fake()->url(),
            ];
        }

        return $data;
    }
}
