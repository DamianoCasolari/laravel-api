<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['FrontEnd', 'BackEnd', 'fullStack'];

        foreach ($types as $type) {
            $newtype = new Type();
            $newtype->name = $type;
            $newtype->slug = Str::slug($newtype->name);
            $newtype->save();
        }
    }
}
