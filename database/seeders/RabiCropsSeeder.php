<?php

namespace Database\Seeders;

use App\Models\RabiCrops;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RabiCropsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        RabiCrops::truncate();
        $rabiCrops=[
            [

                'rabi_crops_name'=>'Banana',
            ],
            [

                'rabi_crops_name'=>'Barley',
            ],
            [

                'rabi_crops_name'=>'Black Pepper',
            ],
            [

                'rabi_crops_name'=>'Brinjal',
            ],
            [

                'rabi_crops_name'=>'Broccoli',
            ],
            [

                'rabi_crops_name'=>'Cabbage',
            ],
            [

                'rabi_crops_name'=>'Capsicum',
            ],
            [

                'rabi_crops_name'=>'Carrot',
            ]
            ,[

                'rabi_crops_name'=>'Coriander',
            ]
            ,[

                'rabi_crops_name'=>'Dates',
            ]
            ,[

                'rabi_crops_name'=>'Garlic',
            ]
            ,
            [

                'rabi_crops_name'=>'Gram',
            ],
            [

                'rabi_crops_name'=>'Grape',
            ],
            [

                'rabi_crops_name'=>'Guava',
            ],
            [

                'rabi_crops_name'=>'Kinnow',
            ],
            [

                'rabi_crops_name'=>'Ladies Finger',
            ],
            [

                'rabi_crops_name'=>'Lemon',
            ],
            [

                'rabi_crops_name'=>'Lettuce',
            ],
            [

                'rabi_crops_name'=>'Lime',
            ],
            [

                'rabi_crops_name'=>'Linseed',
            ]
            ,[

                'rabi_crops_name'=>'Mango',
            ]
            ,[

                'rabi_crops_name'=>'Masoor',
            ]
            ,[

                'rabi_crops_name'=>'Mulberries',
            ]
            ,[

                'rabi_crops_name'=>'Mung Bean',
            ]
            ,[

                'rabi_crops_name'=>'Mustard',
            ]
            ,[

                'rabi_crops_name'=>'Onion',
            ]
            ,[

                'rabi_crops_name'=>'Orange',
            ],
            [

                'rabi_crops_name'=>'Pea',
            ],
            [

                'rabi_crops_name'=>'Pigeon Pea',
            ],
            [

                'rabi_crops_name'=>'Potato',
            ],
            [

                'rabi_crops_name'=>'Radish',
            ]
            ,
            [

                'rabi_crops_name'=>'Rapeseed',
            ]
            ,
            [

                'rabi_crops_name'=>'Spinach',
            ]
            ,
            [

                'rabi_crops_name'=>'Sunflower',
            ]
            ,
            [
                'rabi_crops_name'=>'Sweet Potato',
            ]
            ,
            [

                'rabi_crops_name'=>'Tobacco',
            ]
            ,
            [

                'rabi_crops_name'=>'Tomato',
            ],
            [

                'rabi_crops_name'=>'Turnip',
            ]
            ,
            [

                'rabi_crops_name'=>'Wheat',
            ]
        ];
        foreach ($rabiCrops as $crops){
            RabiCrops::query()->create($crops);
        }
    }
}
