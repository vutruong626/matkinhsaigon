<?php

namespace App\Console\Commands;

use App\Models\ProductImage;
use App\Models\Products;
use Illuminate\Console\Command;

class CreateDBProductImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:image';

    /**
     * The console command image.
     *
     * @var string
     */
    protected $description = 'Command image';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $product = Products::get();
        foreach($product as $itemProduct) {
            $images = json_decode($itemProduct->url_imgs, true);
            foreach($images as $key => $item) {
                if((is_array($item))) {
                    $productImage = new ProductImage();
                    $productImage->product_id = $itemProduct['id'];
                    $productImage->image = $item["name"];
                    $productImage->color_id = $item["color"];
                    $productImage->weight = $item["weight"];
                    $productImage->save();
                }
            }
        }
        return Command::SUCCESS;
    }
}
