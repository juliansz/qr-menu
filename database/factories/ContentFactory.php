<?php

namespace Database\Factories;

use App\Models\Content;
use App\Models\Landing;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Content::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'type' => Content::PDF_TYPE,
            'description' => $this->faker->text,
            'options' => null
        ];
    }

    public function forLanding(Landing $landing)
    {
        return $this->afterMaking(function (Content $content) use ($landing) {
            $content->setRelation('landing', $landing);
        })->afterCreating(function (Content $content) use ($landing) {
            $content->landing()->associate($landing->id);
        });
    }

    public function pdf()
    {
        return $this->afterCreating(function (content $content) {
            $content->type = Content::PDF_TYPE;
        });
    }

    public function file()
    {
        return $this->afterCreating(function (content $content) {
            $content->type = Content::FILE_TYPE;
        });
    }
    public function image()
    {
        return $this->afterCreating(function (content $content) {
            $content->type = Content::IMAGE_TYPE;
        });
    }
    public function embed()
    {
        return $this->afterCreating(function (content $content) {
            $content->type = Content::EMBED_TYPE;
        });
    }
    public function link()
    {
        return $this->afterCreating(function (content $content) {
            $content->type = Content::LINK_TYPE;
        });
    }
    public function html()
    {
        return $this->afterCreating(function (content $content) {
            $content->type = Content::HTML_TYPE;
        });
    }
}
