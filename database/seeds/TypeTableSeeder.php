<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = collect(
            [
                [
                    'name' => 'Home loan',
                    'rate' => 20,
                ],
                [
                    'name' => 'Education loan',
                    'rate' => 12,
                ],
            ]
        );
       // dd($types);
        $types->each(
            function ($type) {
                \App\Type::create($type);
            }
        );
    }

}
