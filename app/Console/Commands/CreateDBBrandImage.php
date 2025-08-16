<?php

namespace App\Console\Commands;

use App\Models\Brand;
use App\Models\BrandImage;
use Illuminate\Console\Command;

class CreateDBBrandImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'brand:images';

    /**
     * The console Create new DB news Brand Images.
     *
     * @var string
     */
    protected $description = 'Create new DB news Brand Images';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $brands = Brand::get();
        foreach($brands as $itemBrand) {
            $images = json_decode($itemBrand->url_imgs, true);
            foreach($images as $item) {
                $brandImage = new BrandImage();
                $brandImage->brand_id = $itemBrand->id;
                $brandImage->images = $item;
                $brandImage->save();
            }
            

        }
    }
}
