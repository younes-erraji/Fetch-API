<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder {
    public function run() {
        $cities =  [
            [
                'name' => 'Casablanca',
                'country_code' => 'MAR',
                'district' => 'Casablanca',
                'population' => 2940623,
            ],
            [
                'name' => 'Rabat',
                'country_code' => 'MAR',
                'district' => 'Rabat-Salé-Zammour-Z',
                'population' => 623457,
            ],
            [
                'name' => 'Marrakech',
                'country_code' => 'MAR',
                'district' => 'Marrakech-Tensift-Al',
                'population' => 621914,
            ],
            [
                'name' => 'Fès',
                'country_code' => 'MAR',
                'district' => 'Fès-Boulemane',
                'population' => 541162,
            ],
            [
                'name' => 'Tanger',
                'country_code' => 'MAR',
                'district' => 'Tanger-Tétouan',
                'population' => 521735,
            ],
            [
                'name' => 'Salé',
                'country_code' => 'MAR',
                'district' => 'Rabat-Salé-Zammour-Z',
                'population' => 504420,
            ],
            [
                'name' => 'Meknès',
                'country_code' => 'MAR',
                'district' => 'Meknès-Tafilalet',
                'population' => 460000,
            ],
            [
                'name' => 'Oujda',
                'country_code' => 'MAR',
                'district' => 'Oriental',
                'population' => 365382,
            ],
            [
                'name' => 'Kénitra',
                'country_code' => 'MAR',
                'district' => 'Gharb-Chrarda-Béni H',
                'population' => 292600,
            ],
            [
                'name' => 'Tétouan',
                'country_code' => 'MAR',
                'district' => 'Tanger-Tétouan',
                'population' => 277516,
            ],
            [
                'name' => 'Safi',
                'country_code' => 'MAR',
                'district' => 'Doukkala-Abda',
                'population' => 262300,
            ],
            [
                'name' => 'Agadir',
                'country_code' => 'MAR',
                'district' => 'Souss Massa-Draâ',
                'population' => 155244,
            ],
            [
                'name' => 'Mohammedia',
                'country_code' => 'MAR',
                'district' => 'Casablanca',
                'population' => 154706,
            ],
            [
                'name' => 'Khouribga',
                'country_code' => 'MAR',
                'district' => 'Chaouia-Ouardigha',
                'population' => 152090,
            ],
            [
                'name' => 'Beni-Mellal',
                'country_code' => 'MAR',
                'district' => 'Tadla-Azilal',
                'population' => 140212,
            ],
            [
                'name' => 'Témara',
                'country_code' => 'MAR',
                'district' => 'Rabat-Salé-Zammour-Z',
                'population' => 126303,
            ],
            [
                'name' => 'El Jadida',
                'country_code' => 'MAR',
                'district' => 'Doukkala-Abda',
                'population' => 119083,
            ],
            [
                'name' => 'Nador',
                'country_code' => 'MAR',
                'district' => 'Oriental',
                'population' => 112450,
            ],
            [
                'name' => 'Ksar el Kebir',
                'country_code' => 'MAR',
                'district' => 'Tanger-Tétouan',
                'population' => 107065,
            ],
            [
                'name' => 'Settat',
                'country_code' => 'MAR',
                'district' => 'Chaouia-Ouardigha',
                'population' => 96200,
            ],
            [
                'name' => 'Taza',
                'country_code' => 'MAR',
                'district' => 'Taza-Al Hoceima-Taou',
                'population' => 92700,
            ],
            [
                'name' => 'El Araich',
                'country_code' => 'MAR',
                'district' => 'Tanger-Tétouan',
                'population' => 90400,
            ],
        ];
        City::insert($cities);
    }
}
