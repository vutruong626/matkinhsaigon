<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Products;
use App\Models\Category;
use App\Models\ProductCategories;

class CreateDBPructCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new DB product category';

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
        $products = Products::get();
        foreach($products as $item) {
            $catId = json_decode($item->cat_id, true);
            $category = Category::whereIn('id',$catId)->where('type', 'product')->get();
            foreach($category as $itemCategory) {
                $data = new ProductCategories();
                $data->ProductID = $item->id;
                $data->CategoryID = $itemCategory->id;
                $data->type = $itemCategory->type;
                $data->save();
            }
        }
        
    }
}
