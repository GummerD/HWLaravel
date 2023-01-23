<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use function PHPUnit\Framework\isNull;

trait TraitPresetNews
{
    public function storeg_news($category = NULL): array
    {
        //dump($param);
        $preset_news = [];

        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j <= 4; $j++) {
                $preset_news[$i . '_category'][$j . '_title'] = \fake()->text(rand(100,250 ));
            }   
        }
        //dd($preset_news);
        if (!empty($category)) {
            return $preset_news[$category];
        }

        //dump($preset_news);
        return $preset_news;


        /*if (!empty($param)) {
            return $preset_news = [
                '1_category' => [
                    '1_title' => '1_text',
                    '2_title' => '2_text',
                    '3_title' => '3_text',
                    '4_title' => '4_text',
                ],
                '2_category' => [
                    '1_title' => '1_text',
                    '2_title' => '2_text',
                    '3_title' => '3_text',
                    '4_title' => '4_text',
                ],
                '3_category' => [
                    '1_title' => '1_text',
                    '2_title' => '2_text',
                    '3_title' => '3_text',
                    '4_title' => '4_text',
                ],
                '4_category' => [
                    '1_title' => '1_text',
                    '2_title' => '2_text',
                    '3_title' => '3_text',
                    '4_title' => '4_text',
                ],
                '5_category' => [
                    '1_title' => '1_text',
                    '2_title' => '2_text',
                    '3_title' => '3_text',
                    '4_title' => '4_text',
                ],
            ];
        }*/
    }

    public function title_search($category = NULL, $title = null): string
    {
        $preset_news = $this->storeg_news();
        $preset_news = $preset_news[$category];
        $text =  $preset_news[$title];
        return $text;
    }

    public function storeg_news_counter($counter = NULL): array
    {
        //dump($param);
        $preset_news = [];

        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j <= $counter; $j++) {
                $preset_news[$i . '_category'][$j . '_title'] = \fake()->text(rand(100,200 ));
            }   
        }
        //dd($preset_news);

        //dump($preset_news);
        return $preset_news;


      
    }
}
