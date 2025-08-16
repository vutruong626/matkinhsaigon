<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Color;
use App\Models\Products;
use App\Models\ProductColor;

class CreateDBProductColor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'color:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new DB product color';

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
            $colorId = json_decode($item->color_id, true);
            $color = Color::whereIn('id',$colorId)->get();
            foreach($color as $itemcolor) {
                $data = new ProductColor();
                $data->productID = $item->id;
                $data->colorID = $itemcolor->id;
                $data->save();
            }
        }
    }
}
