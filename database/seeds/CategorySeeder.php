<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder{
  public function run(){
    Category::create([
      'name' => 'Pensamiento matematico'
    ]);

    Category::create([
      'name' => 'Pensamiento analitico'
    ]);

    Category::create([
      'name' => 'Estructura de la lengua'
    ]);

    Category::create([
      'name' => 'Comprension lectora'
    ]);
  }
}
