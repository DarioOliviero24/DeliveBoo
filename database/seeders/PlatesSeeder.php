<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plates;
use App\Models\Restaurant;
use Faker\Generator as Faker;

class PlatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $ingredients = [
            'Zucchero',
            'Farina',
            'Sale',
            'Burro',
            'Latte',
            'Uova',
            'Formaggio',
            'Pomodori',
            'Basilico',
            'Aglio',
            'Cipolla',
            'Pepe',
            'Cioccolato',
            'Vaniglia',
            'Panna'
        ];
        $randomImg = [

            'https://www.fattoincasadabenedetta.it/wp-content/uploads/2024/07/PASTA-ALLA-CARLOFORTINA-1-1.jpg',

            'https://www.cucchiaio.it/content/dam/cucchiaio/it/ricette/2024/07/pasta-carcerata/pasta-carcerata-finale.jpg',



            'https://images.fidhouse.com/fidelitynews/wp-content/uploads/sites/6/2016/02/1454673868_04e764626b60264418fd7fb021d764e0bb29fbed-340872249.jpg?width=1280&height=720&quality=80',



            'https://www.allrecipes.com/thmb/QiGptPjQB5mqSXGVxE4sLPMJs_4=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/AR-269500-creamy-garlic-pasta-Beauties-2x1-bcd9cb83138849e4b17104a1cd51d063.jpg',



            'https://www.cucchiaio.it/content/dam/cucchiaio/it/ricette/2023/07/spaghetti-con-colatura-di-alici-limone-e-nocciole/Pasta_colatura_alici_limone_orizz.jpg',






            'https://staticcookist.akamaized.net/wp-content/uploads/sites/21/2021/09/Pasta-alla-Montecarlo-0D6A1037.jpg',




            'https://static.tecnichenuove.it/cucinanaturale/2024/02/spaghetti-pesto-carciofi-noci.jpg',




            'https://cdn-rdb.arla.com/lurpak-it/pasta-al-burro-di-salvia/4203278446.jpg?w=1920&h=1080&mode=max&ak=64bfe437&hm=a2061b7d',





            'https://blog.giallozafferano.it/valeriaciccotti/wp-content/uploads/2022/08/pasta-s.jpg',




            'https://www.voiello.it/wp-content/uploads/2022/10/7_PASTA-MISTA-E-PATATE_VOIELLO0535_post.png',




            'https://www.casapappagallo.it/storage/18678/pasta-rostida.JPG',




            'https://images.dissapore.com/wp-content/uploads/2023/10/pasta-alla-carcerata-ricetta.jpg?width=1280&height=720&quality=75',





            'https://blog.giallozafferano.it/renatabriano/wp-content/uploads/2024/10/Pasta-alla-carcerata-scaled.jpg',




            'https://www.parmalat.it/origin0/app/uploads/2023/11/28165413/pasta-panna-e-tonno-1.jpg',




            'https://vegecravings.com/wp-content/uploads/2023/01/Pink-Sauce-Pasta-Recipe-Step-By-Step-Instructions-scaled.jpg',



            'https://assets.epicurious.com/photos/66778a0a0e8e2b9ffcac3472/1:1/w_3200,h_3200,c_limit/creamy-two-ingredient-parmesan-pasta_RECIPE_V1_062024_7936_VOG_final.jpg',


            'https://www.chiarapassion.com/wp-content/uploads/2023/11/pasta-al-gratin-ricetta-e1701244077615.jpg',



            'https://www.parmalat.it/origin0/app/uploads/2023/11/29084952/pasta-al-forno-bianca.jpg',


            'https://cdn.loveandlemons.com/wp-content/uploads/2024/07/zucchini-pasta-500x500.jpg',





            'https://www.misya.info/wp-content/uploads/2009/04/pasta-al-forno-fetta-.jpg',




            'https://storage.googleapis.com/sulten-media-storage/JgHVwqKd8BPUfvkvCVfXa5T7LZ92/recipes/26375845-5a13-4547-bbf7-3fbf436194e9/pasta-carbonara-w6bt.jpeg',



            'https://static01.nyt.com/images/2024/04/12/multimedia/sd-mascarpone-miso-pastarex-jqmf/sd-mascarpone-miso-pastarex-jqmf-googleFourByThree.jpg',





            'https://i.ytimg.com/vi/Vt99D4yYpLg/maxresdefault.jpg',



            'https://cdn.cook.stbm.it/thumbnails/ricette/119/119444/hd750x421.jpg',



            'https://www.gimmesomeoven.com/wp-content/uploads/2024/02/Lemon-Broccoli-Pasta-Recipe-9.jpg'
        ];

        $restaurantIds = Restaurant::pluck('id')->toArray();

        for ($i = 0; $i < 30; $i++) {

            $ingredientsArrayRecipe = [];

            foreach($ingredients as $ingredient) {

                $random = $faker->boolean;

                if($random) {
                    $ingredientsArrayRecipe[] = $ingredient;
                }

                if (count($ingredientsArrayRecipe) > 4) {
                    break;
                }
            }

            Plates::create([

                'plate_name' => $faker->word,
                'img' => $faker->randomElement($randomImg),
                'ingredients' => implode(', ', $ingredientsArrayRecipe),
                'price' => $faker->randomFloat(2, 5, 50),
                'restaurants_id' => $faker->randomElement($restaurantIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}



