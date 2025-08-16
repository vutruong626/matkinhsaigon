<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\News;
use App\Models\NewsCategories;
use App\Models\Category;

class CreateDBNewsCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new DB news category';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $news = News::get();
        foreach($news as $item) {
            $catId = json_decode($item->cat_id, true);
            $category = Category::whereIn('id',$catId)->where('type', 'new')->get();
            foreach($category as $itemCategory) {
                $data = new NewsCategories();
                $data->newsID = $item->id;
                $data->categoryID = $itemCategory->id;
                $data->type = $itemCategory->type;
                $data->save();
            }
        }
    }
}
