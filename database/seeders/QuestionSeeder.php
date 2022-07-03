<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Question;
use App\Models\Subscale;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(file_get_contents('database/data/question_data.json', true));

        collect($data)->each(function ($subscale, $key) {
            echo "creating subscale: $subscale->name\n";

            $newSubscale = Subscale::create([
                'number' => $subscale->subscale,
                'name' => $subscale->name,
            ]);
            Log::info(collect($subscale->items));
            collect($subscale->items)->each(function ($item, $key) use ($newSubscale) {
                echo "creating item: $item->name\n";

                $newItem = Item::create([
                    'number' => $item->number,
                    'name' => $item->name,
                    'subscale_id' => $newSubscale->id
                ]);

                collect($item->questions)->each(function ($question, $key) use ($newItem) {
                    echo "creating question number: $question->number\n";

                    Question::create([
                        'number' => $question->number,
                        'description' => $question->description,
                        'item_id' => $newItem->id
                    ]);
                });
            });
        });
    }
}
