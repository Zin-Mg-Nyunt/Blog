<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->unique()->word(),
            //category table ထဲက column တွေကိုရေးပေးရတာ
            //$this->faker ဆိုတာက ဒီ class ထဲက faker property ကိုပြန်ခေါ်တာ။ဒါပေမဲ့ ဒီ class မှာ faker property မရှိဘူး။ But ဒီ class က Factory class ကို extends လုပ်ထားတော့ Factory class ထဲမှာတော့ faker property ရှိတယ်။
            'slug'=>$this->faker->unique()->slug()
        ];
    }
}
