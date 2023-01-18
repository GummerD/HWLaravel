<?php
declare(strict_types=1);

namespace App\Http\Controllers;

trait TraitPresetNews
{
    public function storeg_news(): array
    {
        /*$preset_news = [
            '1_category' =>[
                '1_title' => '1_text',
                '2_title' => '2_text',
                '3_title' => '3_text',
                '4_title' => '4_text',
            ],
            '2_category' =>[
                '1_title' => '1_text',
                '2_title' => '2_text',
                '3_title' => '3_text',
                '4_title' => '4_text',
            ],
            '3_category' =>[
                '1_title' => '1_text',
                '2_title' => '2_text',
                '3_title' => '3_text',
                '4_title' => '4_text',
            ],
            '4_category' =>[
                '1_title' => '1_text',
                '2_title' => '2_text',
                '3_title' => '3_text',
                '4_title' => '4_text',
            ],
            '5_category' =>[
                '1_title' => '1_text',
                '2_title' => '2_text',
                '3_title' => '3_text',
                '4_title' => '4_text',
            ],
        ];*/

        $preset_news=[];

        for ($i=1; $i<=5; $i++){
            for ($j=1; $j<=4; $j++){
                $preset_news[$i . '_category'][$j . '_title'] = \fake()->text(rand(20,100));
            }
        }
        //dump($preset_news);
        return $preset_news;
    }

    
}