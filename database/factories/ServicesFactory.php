<?php

namespace Database\Factories;

use App\Models\Services;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ServicesFactory extends Factory
{
    protected $model = Services::class;

    public function definition()
    {
        
        $filename = $this->faker->unique()->lexify('??????') . '.jpg';

        
        $image =  Image ::canvas(800, 600, '#ccc')
                      ->text('Service', 400, 300, function($font) {
                          $font->file(public_path('fonts/arial.ttf'));
                          $font->size(48);
                          $font->color('#000');
                          $font->align('center');
                          $font->valign('middle');
                      });

        
        Storage::put("public/images/{$filename}", (string) $image->encode());

        return [
            'title' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'photo' => "storage/images/{$filename}",
        ];
    }
}
