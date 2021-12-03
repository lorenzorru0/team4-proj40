
<?php

use Illuminate\Database\Seeder;
use App\Type;
use Illuminate\Support\Str;
class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types=[
            'Alcol','Americano','Argentino','Asiatico','Asiatico fusion', 'Bagel','Bakery', 'Barbeque', 'Bevande','Bistecche','Botteghe Specialità', 'Brunch','Bubble tea','Burrito','Cinese', 'Colazione', 'Comfort food','Dessert', 'Gelato', 'Giapponese', 'Greco', 'Hamburger','Hawaiano','Healthy','Indiano', 'Insalate','Italiano','Kebab', 'Messicano','Pasta', 'Piadina','Pizza','Poke','Sandwich', 'Spagnolo','Street food', 'Sushi', 'Thailandese','Turco'
        ];
        foreach($types as $type){
            $newType = new Type();
            $newType->name=$type;
            $newType->slug=Str::of($type)->slug('-');
            $newType->save();
        }
    }
}