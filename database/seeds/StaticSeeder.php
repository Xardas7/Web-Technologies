<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StaticSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $faker = Faker::create();
        $codes = array();
        for($i=0; $i<49; $i++){
            do{
                $code = $faker->isbn13;
            }while(in_array($code, $codes));
            $codes[] = $code;
        }
        $products = [
            ['category_id' => 1, 'producer_id' => 1, 'code' => $codes[0], 'name' => 'Summer jacket', 'price' => 59.99, 'description' => '<b>Details</b><br>Collar: High collar<br>Fastening: Zip<br>Details: Inseam pockets'],
            ['category_id' => 1, 'producer_id' => 1, 'code' => $codes[1], 'name' => 'Leather jacket', 'price' => 114.99, 'description' => '<b>Details</b><br>Collar: Hood<br>Fastening: Zip<br>Pockets: Zip pockets<br>Pockets: Zip pockets<br>Hood detail: Removable<br>Pattern: Plain'],
            ['category_id' => 1, 'producer_id' => 2, 'code' => $codes[2], 'name' => 'RAINFOREST - Windbreaker', 'price' => 159.99, 'description' => '<b>Details</b><br>Collar: Hood<br>Fastening: Zip<br>Pockets: Flap pockets<br>Hood detail: Drawstring'],
            ['category_id' => 1, 'producer_id' => 2, 'code' => $codes[3], 'name' => 'Classic coat', 'price' => 54.99, 'description' => '<b>Details</b><br>Collar: Lapel collar<br>Fastening: Button<br>Pockets: Flap pockets<br>Pattern: Plain'],
            ['category_id' => 2, 'producer_id' => 3, 'code' => $codes[4], 'name' => 'Red A-line skirt', 'price' => 32.99, 'description' => '<b>Details</b><br>Pattern: Plain<br>Details: Elasticated waist'],
            ['category_id' => 2, 'producer_id' => 3, 'code' => $codes[5], 'name' => 'Light blue A-line skirt', 'price' => 24.00, 'description' => '<b>Details</b><br><br>Details: Elasticated waist'],
            ['category_id' => 2, 'producer_id' => 4, 'code' => $codes[6], 'name' => 'Mini A-line skirt', 'price' => 20.99, 'description' => '<b>Details</b><br>Fastening: Button<br>Pattern: Plain<br>Details: Inseam pockets'],
            ['category_id' => 2, 'producer_id' => 4, 'code' => $codes[7], 'name' => 'Plissé A-line skirt', 'price' => 30.99, 'description' => '<b>Details</b><br>Pattern: Plain<br>Details: Elasticated waist'],
            ['category_id' => 3, 'producer_id' => 5, 'code' => $codes[8], 'name' => 'HIGH WAISTED TAPER - Straight leg jeans', 'price' => 59.99, 'description' => '<b>Details</b><br>Rise: High<br>Fastening: Concealed fly<br>Pockets: Back pocket, side pockets'],
            ['category_id' => 3, 'producer_id' => 5, 'code' => $codes[9], 'name' => 'MOM - Relaxed fit jeans', 'price' => 94.99, 'description' => '<b>Details</b><br>Rise: High<br>Fastening: Concealed fly<br>Pockets: Back pocket, side pockets<br>Details: Embroidery'],
            ['category_id' => 3, 'producer_id' => 6, 'code' => $codes[10], 'name' => 'Relaxed fit jeans', 'price' => 35.99, 'description' => '<b>Details</b><br>Rise: High<br>Fastening: Concealed fly<br>Pockets: Back pocket, side pockets'],
            ['category_id' => 3, 'producer_id' => 6, 'code' => $codes[11], 'name' => 'Black relaxed fit jeans', 'price' => 30.99, 'description' => '<b>Details</b><br>Rise: High<br>Pockets: Back pocket, side pockets'],
            ['category_id' => 3, 'producer_id' => 7, 'code' => $codes[12], 'name' => 'HAILEY - Jeans Skinny Fit', 'price' => 54.99, 'description' => '<b>Details</b><br>Rise: High<br>Fastening: Concealed fly<br>Pockets: Back pocket'],
            ['category_id' => 3, 'producer_id' => 7, 'code' => $codes[13], 'name' => 'Straight leg jeans', 'price' => 38.99, 'description' => '<b>Details</b><br>Rise: Low<br>Fastening: Concealed fly<br>Pockets: Back pocket, side pockets'],
            ['category_id' => 3, 'producer_id' => 8, 'code' => $codes[14], 'name' => 'BALLOON LEG - Relaxed fit jeans', 'price' => 94.99, 'description' => '<b>Details</b><br>Rise: High<br>Fastening: Concealed fly<br>Pockets: Back pocket, side pockets'],
            ['category_id' => 3, 'producer_id' => 8, 'code' => $codes[15], 'name' => 'Jeans Skinny Fit', 'price' => 33.99, 'description' => '<b>Details</b><br>Rise: Normal<br>Fastening: Concealed fly<br>Pockets: Back pocket, side pockets'],
            ['category_id' => 4, 'producer_id' => 9, 'code' => $codes[16], 'name' => 'WEEKEND TAI 3 PACK - Briefs', 'price' => 15.99, 'description' => '<b>Details</b><br>Rise: Normal<br>Pattern: Marl'],
            ['category_id' => 4, 'producer_id' => 9, 'code' => $codes[17], 'name' => 'FEEL BRALETTE - Bustier', 'price' => 30.99, 'description' => '<b>Details</b><br>Detail: Padded bra, push-up bra, removable padding, non-wired bra<br>Fastening: No closure<br>Pattern: Plain'],
            ['category_id' => 4, 'producer_id' => 10, 'code' => $codes[18], 'name' => 'ROSANNE BRIEF 5 PACK - Briefs', 'price' => 16.99, 'description' => '<b>Details</b><br>Rise: Normal<br>Pattern: Plain'],
            ['category_id' => 4, 'producer_id' => 10, 'code' => $codes[19], 'name' => 'MODERN BRALETTE LIFT - Bustier', 'price' => 38.99, 'description' => '<b>Details</b><br>Detail: Padded bra, push-up bra, non-wired bra<br>Fastening: No closure<br>Pattern: Marl'],
            ['category_id' => 4, 'producer_id' => 11, 'code' => $codes[20], 'name' => 'AMOURETTE - Underwired bra', 'price' => 47.99, 'description' => '<b>Details</b><br>Detail: Padded bra, underwire bra<br>Fastening: Back closure<br>Pattern: Plain'],
            ['category_id' => 4, 'producer_id' => 11, 'code' => $codes[21], 'name' => 'HADDESSA SUSPENDER - Suspenders', 'price' => 23.99, 'description' => '<b>Details</b><br>Detail: Sheer<br>Pattern: Plain'],
            ['category_id' => 4, 'producer_id' => 12, 'code' => $codes[22], 'name' => 'REFINED GLAMOUR - Push-up bra', 'price' => 43.99, 'description' => '<b>Details</b><br>Detail: Sheer, padded bra, push-up bra, underwire bra<br>Fastening: Back closure<br>Pattern: Plain'],
            ['category_id' => 4, 'producer_id' => 12, 'code' => $codes[23], 'name' => 'COMFORT DEVOTION - T-shirt bra', 'price' => 35.99, 'description' => '<b>Details</b><br>Detail: Underwire bra<br>Fastening: Back closure<br>Pattern: Plain'],
            ['category_id' => 31, 'producer_id' => 13, 'code' => $codes[24], 'name' => 'Black Hoodie', 'price' => 30.99, 'description' => '<b>Details</b><br>Collar: Hood<br>Hood detail: Drawstring<br>Pattern: Print<br>Details: Elasticated waist'],
            ['category_id' => 31, 'producer_id' => 13, 'code' => $codes[25], 'name' => 'White Hoodie', 'price' => 25.99, 'description' => '<b>Details</b><br>Collar: Hood<br>Hood detail: Drawstring<br>Pattern: Print<br>Details: Elasticated waist'],
            ['category_id' => 31, 'producer_id' => 14, 'code' => $codes[26], 'name' => 'CLUB - Sweatshirt', 'price' => 37.99, 'description' => '<b>Details</b><br>Neckline: Crew neck<br>Pattern: Marl<br>Details: Elasticated waist'],
            ['category_id' => 31, 'producer_id' => 14, 'code' => $codes[27], 'name' => 'REALITY - Sweatshirt', 'price' => 43.99, 'description' => '<b>Details</b><br>Neckline: Crew neck<br>Pattern: Print'],
            ['category_id' => 31, 'producer_id' => 15, 'code' => $codes[28], 'name' => 'UNISEX - Hoodie', 'price' => 25.99, 'description' => '<b>Details</b><br>Collar: Hood<br>Hood detail: Drawstring<br>Pattern: Print<br>Details: Elasticated waist'],
            ['category_id' => 31, 'producer_id' => 15, 'code' => $codes[29], 'name' => 'LOGO HOODIE - Hoodie', 'price' => 89.99, 'description' => '<b>Details</b><br>Collar: Hood<br>Hood detail: Drawstring<br>Pattern: Print<br>Details: Elasticated waist'],
            ['category_id' => 31, 'producer_id' => 16, 'code' => $codes[30], 'name' => 'Club Hoodie - Hoodie', 'price' => 42.99, 'description' => '<b>Details</b><br>Collar: Hood<br>Hood detail: Drawstring<br>Pattern: Plain<br>Details: Elasticated waist'],
            ['category_id' => 31, 'producer_id' => 16, 'code' => $codes[31], 'name' => 'Blue Sweatshirt', 'price' => 129.99, 'description' => '<b>Details</b><br>Neckline: Crew neck<br>Pattern: Plain<br>Details: Elasticated waist'],
            ['category_id' => 32, 'producer_id' => 17, 'code' => $codes[32], 'name' => 'TAILORED-MANTEL AUS WOLL-MIX - Short coat', 'price' => 119.99, 'description' => '<b>Details</b><br>Fastening: Button<br>Pockets: Flap pockets<br>Pattern: Plain'],
            ['category_id' => 32, 'producer_id' => 17, 'code' => $codes[33], 'name' => 'JCOJAKE LONG PUFFER - Parka', 'price' => 114.99, 'description' => '<b>Details</b><br>Collar: Hood<br>Fastening: Zip<br>Pockets: Flap pockets, inside pocket<br>Hood detail: Drawstring, lined<br>Pattern: Plain<br>Details: Inseam pockets, button row'],
            ['category_id' => 32, 'producer_id' => 18, 'code' => $codes[34], 'name' => 'PEACOAT - Short coat', 'price' => 219.99, 'description' => '<b>Details</b><br>Collar: Lapel collar<br>Fastening: Button<br>Pockets: Inside pocket<br>Pattern: Plain<br>Details: Inseam pockets'],
            ['category_id' => 32, 'producer_id' => 18, 'code' => $codes[35], 'name' => 'JPRCOLLUM - Short coat', 'price' => 140, 'description' => '<b>Details</b><br>Collar: Standing collar<br>Fastening: Button<br>Pockets: Inside pocket<br>Pattern: Marl<br>Details: Inseam pockets'],
            ['category_id' => 32, 'producer_id' => 19, 'code' => $codes[36], 'name' => 'CLASSIC JACKET - Leather jacket', 'price' => 219.99, 'description' => '<b>Details</b><br>Collar: Mandarin collar<br>Fastening: Zip<br>Pockets: Zip pockets, inside pocket<br>Pattern: Plain<br>Details: Zip fastening'],
            ['category_id' => 32, 'producer_id' => 19, 'code' => $codes[37], 'name' => 'CLAUDE 3.0 UNISEX - Summer jacket', 'price' => 84.99, 'description' => '<b>Details</b><br>Collar: Hood<br>Fastening: Zip<br>Hood detail: Drawstring<br>Details: Zip fastening'],
            ['category_id' => 32, 'producer_id' => 20, 'code' => $codes[38], 'name' => 'BAYPORT - Summer jacket', 'price' => 154.99, 'description' => '<b>Details</b><br>Collar: Turn-down collar<br>Fastening: Zip<br>Pockets: Inside pocket<br>Pattern: Plain<br>Details: Inseam pockets, elasticated waist'],
            ['category_id' => 32, 'producer_id' => 20, 'code' => $codes[39], 'name' => 'JCOMULTI QUILTED JACKET - Outdoor jacket', 'price' => 43.99, 'description' => '<b>Details</b><br>Sport: Training<br>Collar: Hood<br>Collar: Chin guard<br>Extras: Water resistant zips<br>Fastening: Zip<br>Pockets: Zip pockets, inside pocket<br>Fastening: Continuous front zip<br>Pockets: Inside pocket, zip pockets<br>Sleeve cuffs: Elastic<br>Pattern: Plain'],
            ['category_id' => 35, 'producer_id' => 21, 'code' => $codes[40], 'name' => 'ONSMARK PANT - Trousers', 'price' => 34.99, 'description' => '<b>Details</b><br>Rise: Normal<br>Fastening: Concealed fly<br>Pockets: Back pocket, side pockets<br>Pattern: Plain'],
            ['category_id' => 35, 'producer_id' => 21, 'code' => $codes[41], 'name' => 'Tracksuit bottoms', 'price' => 43.99, 'description' => '<b>Details</b><br>Rise: High<br>Pockets: Cargo pockets, side pockets<br>Pattern: Print<br>Details: Elasticated waist'],
            ['category_id' => 35, 'producer_id' => 22, 'code' => $codes[42], 'name' => 'XX CHINO SLIM II - Chinos - true chino shady', 'price' => 69.99, 'description' => '<b>Details</b><br>Rise: Normal<br>Fastening: Concealed fly<br>Pockets: Back pocket, side pockets<br>Pattern: Plain'],
            ['category_id' => 35, 'producer_id' => 22, 'code' => $codes[43], 'name' => 'SANT ANDREA - Tracksuit bottoms', 'price' => 39.99, 'description' => '<b>Details</b><br>Rise: Normal<br>Pockets: Side pockets<br>Pattern: Plain<br>Details: Elasticated waist'],
            ['category_id' => 35, 'producer_id' => 23, 'code' => $codes[44], 'name' => 'SCHEME - Shorts', 'price' => 58.00, 'description' => '<b>Details</b><br>Pattern: Plain'],
            ['category_id' => 35, 'producer_id' => 23, 'code' => $codes[45], 'name' => 'SHHYARD SLIM FIT - Chinos - dark sapphire', 'price' => 54.99, 'description' => '<b>Details</b><br>Rise: Normal<br>Fastening: Concealed fly<br>Pockets: Back pocket, side pockets<br>Pattern: Plain'],
            ['category_id' => 35, 'producer_id' => 24, 'code' => $codes[46], 'name' => 'M NSW NIKE AIR PANT FLC - Tracksuit bottoms', 'price' => 54.99, 'description' => '<b>Details</b><br>Rise: High<br>Pockets: Back pocket, side pockets<br>Pattern: Print<br>Details: Elasticated waist'],
            ['category_id' => 35, 'producer_id' => 24, 'code' => $codes[47], 'name' => 'ROVIC ZIP 3D STRAIGHT TAPERED - Cargo trousers', 'price' => 89.99, 'description' => '<b>Details</b><br>Rise: Normal<br>Fastening: Concealed fly<br>Pockets: Cargo pockets, back pocket, side pockets<br>Pattern: Plain'],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }

            $images = [
                ['path' => '/images/products/01-1.webp', 'product_id' => 1],
                ['path' => '/images/products/01-2.webp', 'product_id' => 1],
                ['path' => '/images/products/02-1.webp', 'product_id' => 2],
                ['path' => '/images/products/02-2.webp', 'product_id' => 2],
                ['path' => '/images/products/03-1.webp', 'product_id' => 3],
                ['path' => '/images/products/03-2.webp', 'product_id' => 3],
                ['path' => '/images/products/04-1.webp', 'product_id' => 4],
                ['path' => '/images/products/04-2.webp', 'product_id' => 4],
                ['path' => '/images/products/05-1.webp', 'product_id' => 5],
                ['path' => '/images/products/05-2.webp', 'product_id' => 5],
                ['path' => '/images/products/06-1.webp', 'product_id' => 6],
                ['path' => '/images/products/06-2.webp', 'product_id' => 6],
                ['path' => '/images/products/07-1.jpg', 'product_id' => 7],
                ['path' => '/images/products/07-2.webp', 'product_id' => 7],
                ['path' => '/images/products/08-1.jpg', 'product_id' => 8],
                ['path' => '/images/products/08-2.jpg', 'product_id' => 8],
                ['path' => '/images/products/09-1.webp', 'product_id' => 9],
                ['path' => '/images/products/09-2.webp', 'product_id' => 9],
                ['path' => '/images/products/10-1.webp', 'product_id' => 10],
                ['path' => '/images/products/10-2.jpg', 'product_id' => 10],
                ['path' => '/images/products/11-1.webp', 'product_id' => 11],
                ['path' => '/images/products/11-2.webp', 'product_id' => 11],
                ['path' => '/images/products/12-1.webp', 'product_id' => 12],
                ['path' => '/images/products/12-2.webp', 'product_id' => 12],
                ['path' => '/images/products/13-1.webp', 'product_id' => 13],
                ['path' => '/images/products/13-2.webp', 'product_id' => 13],
                ['path' => '/images/products/14-1.webp', 'product_id' => 14],
                ['path' => '/images/products/14-2.webp', 'product_id' => 14],
                ['path' => '/images/products/15-1.webp', 'product_id' => 15],
                ['path' => '/images/products/15-2.webp', 'product_id' => 15],
                ['path' => '/images/products/16-1.webp', 'product_id' => 16],
                ['path' => '/images/products/16-2.webp', 'product_id' => 16],
                ['path' => '/images/products/17-1.webp', 'product_id' => 17],
                ['path' => '/images/products/17-2.webp', 'product_id' => 17],
                ['path' => '/images/products/18-1.webp', 'product_id' => 18],
                ['path' => '/images/products/18-2.webp', 'product_id' => 18],
                ['path' => '/images/products/19-1.jpg', 'product_id' => 19],
                ['path' => '/images/products/19-2.webp', 'product_id' => 19],
                ['path' => '/images/products/20-1.webp', 'product_id' => 20],
                ['path' => '/images/products/20-2.webp', 'product_id' => 20],
                ['path' => '/images/products/21-1.webp', 'product_id' => 21],
                ['path' => '/images/products/21-2.webp', 'product_id' => 21],
                ['path' => '/images/products/22-1.webp', 'product_id' => 22],
                ['path' => '/images/products/22-2.jpg', 'product_id' => 22],
                ['path' => '/images/products/23-1.webp', 'product_id' => 23],
                ['path' => '/images/products/23-2.webp', 'product_id' => 23],
                ['path' => '/images/products/24-1.jpg', 'product_id' => 24],
                ['path' => '/images/products/24-2.webp', 'product_id' => 24],
                ['path' => '/images/products/25-1.webp', 'product_id' => 25],
                ['path' => '/images/products/25-2.webp', 'product_id' => 25],
                ['path' => '/images/products/26-1.webp', 'product_id' => 26],
                ['path' => '/images/products/26-2.webp', 'product_id' => 26],
                ['path' => '/images/products/27-1.webp', 'product_id' => 27],
                ['path' => '/images/products/27-2.webp', 'product_id' => 27],
                ['path' => '/images/products/28-1.webp', 'product_id' => 28],
                ['path' => '/images/products/28-2.webp', 'product_id' => 28],
                ['path' => '/images/products/29-1.jpg', 'product_id' => 29],
                ['path' => '/images/products/29-2.webp', 'product_id' => 29],
                ['path' => '/images/products/30-1.webp', 'product_id' => 30],
                ['path' => '/images/products/30-2.webp', 'product_id' => 30],
                ['path' => '/images/products/31-1.webp', 'product_id' => 31],
                ['path' => '/images/products/31-2.webp', 'product_id' => 31],
                ['path' => '/images/products/32-1.webp', 'product_id' => 32],
                ['path' => '/images/products/32-2.webp', 'product_id' => 32],
                ['path' => '/images/products/33-1.webp', 'product_id' => 33],
                ['path' => '/images/products/33-2.webp', 'product_id' => 33],
                ['path' => '/images/products/34-1.webp', 'product_id' => 34],
                ['path' => '/images/products/34-2.webp', 'product_id' => 34],
                ['path' => '/images/products/35-1.webp', 'product_id' => 35],
                ['path' => '/images/products/35-2.webp', 'product_id' => 35],
                ['path' => '/images/products/36-1.webp', 'product_id' => 36],
                ['path' => '/images/products/36-2.webp', 'product_id' => 36],
                ['path' => '/images/products/37-1.webp', 'product_id' => 37],
                ['path' => '/images/products/37-2.webp', 'product_id' => 37],
                ['path' => '/images/products/38-1.webp', 'product_id' => 38],
                ['path' => '/images/products/38-2.webp', 'product_id' => 38],
                ['path' => '/images/products/39-1.webp', 'product_id' => 39],
                ['path' => '/images/products/39-2.webp', 'product_id' => 39],
                ['path' => '/images/products/40-1.webp', 'product_id' => 40],
                ['path' => '/images/products/40-2.webp', 'product_id' => 40],
                ['path' => '/images/products/41-1.webp', 'product_id' => 41],
                ['path' => '/images/products/41-2.webp', 'product_id' => 41],
                ['path' => '/images/products/42-1.jpg', 'product_id' => 42],
                ['path' => '/images/products/42-2.webp', 'product_id' => 42],
                ['path' => '/images/products/43-1.webp', 'product_id' => 43],
                ['path' => '/images/products/43-2.webp', 'product_id' => 43],
                ['path' => '/images/products/44-1.webp', 'product_id' => 44],
                ['path' => '/images/products/44-2.webp', 'product_id' => 44],
                ['path' => '/images/products/45-1.webp', 'product_id' => 45],
                ['path' => '/images/products/45-2.webp', 'product_id' => 45],
                ['path' => '/images/products/46-1.webp', 'product_id' => 46],
                ['path' => '/images/products/46-2.webp', 'product_id' => 46],
                ['path' => '/images/products/47-1.webp', 'product_id' => 47],
                ['path' => '/images/products/47-2.webp', 'product_id' => 47],
                ['path' => '/images/products/48-1.webp', 'product_id' => 48],
                ['path' => '/images/products/48-2.webp', 'product_id' => 48]
            ];

        foreach($images as $image){
            DB::table('images')->insert($image);
        }
    }
}
