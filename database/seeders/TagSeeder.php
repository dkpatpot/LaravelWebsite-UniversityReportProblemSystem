<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = Tag::first();
        if (!$tag) {
            $this->command->line("Generating Tags");
            $tags = ['กองกลาง', 'กองการเจ้าหน้าที่', 'กองกิจการนิสิต', 'กองคลัง', 'กองแผนงาน', 'กองยานพาหนะ อาคารและสถานที่',
                    'กองวิเทศสัมพันธ์'];
            collect($tags)->each(function ($tag_name, $key) {
                $tag = new Tag();
                $tag->name = $tag_name;
                $tag->save();
            });
        }

        // $this->command->line("Generating tags for all posts");
        // $posts = Post::get();
        // $posts->each(function($post, $key) {
        //     $n = fake()->numberBetween(1, 5);
        //     $tag_ids = Tag::inRandomOrder()->limit($n)->get()->pluck(['id'])->all();
        //     $post->tags()->sync($tag_ids);
        // });
    }
}
