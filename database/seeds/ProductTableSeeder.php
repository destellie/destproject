<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([ 
            'imagePath' =>"images/1.jpg",
            'title'=>'Nova Parfum',
            'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!',
            'price'=>20
            ]);
            $product->save();

            $product = new \App\Product([ 
                'imagePath' =>"images/2.jpg",
                'title'=>'Nova Parfum',
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!',
                'price'=>20
                ]);
                $product->save();

                $product = new \App\Product([ 
                    'imagePath' =>"images/3.jpg",
                    'title'=>'Nova Parfum',
                    'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!',
                    'price'=>20
                    ]);
                    $product->save();

                    $product = new \App\Product([ 
                        'imagePath' =>"images/4.jpg",
                        'title'=>'Nova Parfum',
                        'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!',
                        'price'=>20
                        ]);
                        $product->save();

                        $product = new \App\Product([ 
                            'imagePath' =>"images/5.jpg",
                            'title'=>'Nova Parfum',
                            'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!',
                            'price'=>20
                            ]);
                            $product->save();

                            $product = new \App\Product([ 
                                'imagePath' =>"images/6.jpg",
                                'title'=>'Nova Parfum',
                                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!',
                                'price'=>20
                                ]);
                                $product->save();
    }
}
