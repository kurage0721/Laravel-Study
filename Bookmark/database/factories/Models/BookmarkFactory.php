<?php

namespace Database\Factories\Models;

use App\Models\Models\Bookmark;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookmarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bookmark::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //以下のように記述することでDBにデータを登録することが出来る
            //numberBetween(10,25) 第1引数〜第２引数(10~25)のレンジの文字数でランダムな文字列を生成する
            'title' => $faker->realText($faker->numberBetween(10,25)),
            'url' => $faker->url(),
            'description' $faker->realText($faker->numberBetween(50,200))
        ];
    }
}
