<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = config('db.types');
        foreach ($types as $type) {
            $newType = new Type();

            $newType->name = $type['name'];
            $newType->slug = Str::slug($type['name'] . '-');

            $newType->save();
        }
    }
}
