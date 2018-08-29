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
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 500; $i++) {
            DB::table('products')->insert([
                'name' => implode($faker->words(),' '),
                'description' => $faker->paragraph(),
                'price' => $this->mt_rand_float(0, 100),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }

    private function mt_rand_float($min, $max, $countZero = '0')
    {
        $countZero = +('1' . $countZero);
        $min = floor($min * $countZero);
        $max = floor($max * $countZero);
        $rand = mt_rand($min, $max) / $countZero;
        return $rand;
    }
}
