<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::insert([
            [
                'id' => 1,
                'nama' => 'Administrator',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'kode_kios' => null,
                'peran_id' => 1
            ],
            
            [
                'id' => 2,
                'nama' => 'Novi Fitrianingrum',
                'username' => 'novi',
                'password' => Hash::make('novi12345'),
                'kode_kios' => null,
                'peran_id' => 6
            ],
            
            [
                'id' => 3,
                'nama' => 'Made Kariada',
                'username' => 'made',
                'password' => Hash::make('made12345'),
                'kode_kios' => null,
                'peran_id' => 5
            ],
            
            // User UH
            [
                'id' => 4,
                'nama' => 'Ida Bagus Anom Satwika S.S',
                'username' => 'anom',
                'password' => Hash::make('anom12345'),
                'kode_kios' => 712002,
                'peran_id' => 3
            ],
            [
                'id' => 5,
                'nama' => 'Gede Yudi Darmayasa',
                'username' => 'yudi',
                'password' => Hash::make('yudi12345'),
                'kode_kios' => 704095,
                'peran_id' => 3
            ],
            [
                'id' => 6,
                'nama' => 'I Gusti Ngurah Gede Agung Wira Darma',
                'username' => 'gusde',
                'password' => Hash::make('gusde12345'),
                'kode_kios' => 701045,
                'peran_id' => 3
            ],
            [
                'id' => 7,
                'nama' => 'Adi Guntur Yasa',
                'username' => 'gun',
                'password' => Hash::make('gun12345'),
                'kode_kios' => 701025,
                'peran_id' => 3
            ],
            [
                'id' => 8,
                'nama' => 'Ida Ayu Putu Artini',
                'username' => 'dayu',
                'password' => Hash::make('dayu12345'),
                'kode_kios' => 706805,
                'peran_id' => 3
            ],
            [
                'id' => 9,
                'nama' => 'Cokorda Gede Raka Laksamana',
                'username' => 'cok',
                'password' => Hash::make('cok12345'),
                'kode_kios' => 706925,
                'peran_id' => 3
            ],

            // User Admin
            [
                'id' => 10,
                'nama' => 'Ni Kadek Duwi Kumala Dewi',
                'username' => 'kumala',
                'password' => Hash::make('kumala12345'),
                'kode_kios' => 712002,
                'peran_id' => 4
            ],
            [
                'id' => 11,
                'nama' => 'Ni Luh Putu Dewi Santi',
                'username' => 'santi',
                'password' => Hash::make('santi12345'),
                'kode_kios' => 704095,
                'peran_id' => 4
            ],
            [
                'id' => 12,
                'nama' => 'Ni Putu Surti Cahyanti',
                'username' => 'surti',
                'password' => Hash::make('surti12345'),
                'kode_kios' => 701045,
                'peran_id' => 4
            ],
            [
                'id' => 13,
                'nama' => 'Ni Putu Indah Saniska Dewi',
                'username' => 'indah',
                'password' => Hash::make('indah12345'),
                'kode_kios' => 701025,
                'peran_id' => 4
            ],
            [
                'id' => 14,
                'nama' => 'Ni Made Candra Dewi',
                'username' => 'candra',
                'password' => Hash::make('candra12345'),
                'kode_kios' => 706805,
                'peran_id' => 4
            ],
            [
                'id' => 15,
                'nama' => 'Ni Putu Mei Agustini',
                'username' => 'mei',
                'password' => Hash::make('mei12345'),
                'kode_kios' => 706925,
                'peran_id' => 4
            ],

            // User MCE
            [
                'id' => 16,
                'nama' => 'I Gusti Ayu Dianita Parmiati',
                'username' => 'rara',
                'password' => Hash::make('rara12345'),
                'kode_kios' => 712002,
                'peran_id' => 2
            ],
            [
                'id' => 17,
                'nama' => 'Anak Agung Ayu Ratna',
                'username' => 'ratna',
                'password' => Hash::make('ratna12345'),
                'kode_kios' => 712002,
                'peran_id' => 2
            ],
            [
                'id' => 18,
                'nama' => 'I Made Deni Kristiawan',
                'username' => 'deni',
                'password' => Hash::make('deni12345'),
                'kode_kios' => 712002,
                'peran_id' => 2
            ],
            [
                'id' => 19,
                'nama' => 'Gede Pastiasa',
                'username' => 'rasta',
                'password' => Hash::make('rasta12345'),
                'kode_kios' => 712002,
                'peran_id' => 2
            ],

            [
                'id' => 20,
                'nama' => 'I Komang Wahyudi Wisnawa',
                'username' => 'komang',
                'password' => Hash::make('komang12345'),
                'kode_kios' => 704095,
                'peran_id' => 2
            ],
            [
                'id' => 21,
                'nama' => 'Tjok Gde Teja Rajantam Putra',
                'username' => 'tjok',
                'password' => Hash::make('tjok12345'),
                'kode_kios' => 704095,
                'peran_id' => 2
            ],
            [
                'id' => 22,
                'nama' => 'Tia Sutianti',
                'username' => 'tia',
                'password' => Hash::make('tia12345'),
                'kode_kios' => 704095,
                'peran_id' => 2
            ],

            [
                'id' => 23,
                'nama' => 'I Dewa Putu Angga Putra Wiaya',
                'username' => 'angga',
                'password' => Hash::make('angga12345'),
                'kode_kios' => 701045,
                'peran_id' => 2
            ],
            [
                'id' => 24,
                'nama' => 'I Putu Some Jayanta',
                'username' => 'some',
                'password' => Hash::make('some12345'),
                'kode_kios' => 701045,
                'peran_id' => 2
            ],

            [
                'id' => 25,
                'nama' => 'Ida Bagus Trisnha Setiawan',
                'username' => 'trisnha',
                'password' => Hash::make('trisnha12345'),
                'kode_kios' => 701025,
                'peran_id' => 2
            ],
            [
                'id' => 26,
                'nama' => 'I Putu Gede Atmaja',
                'username' => 'atmaja',
                'password' => Hash::make('atmaja12345'),
                'kode_kios' => 701025,
                'peran_id' => 2
            ],
            [
                'id' => 27,
                'nama' => 'Barsthayana',
                'username' => 'barsthayana',
                'password' => Hash::make('barsthayana12345'),
                'kode_kios' => 701025,
                'peran_id' => 2
            ],
            [
                'id' => 28,
                'nama' => 'I Gusti Agung Dharma Putra',
                'username' => 'dharma',
                'password' => Hash::make('dharma12345'),
                'kode_kios' => 701025,
                'peran_id' => 2
            ],

            [
                'id' => 29,
                'nama' => 'Ida Ayu Putu Mita Sasmita',
                'username' => 'mita',
                'password' => Hash::make('mita12345'),
                'kode_kios' => 706805,
                'peran_id' => 2
            ],
            [
                'id' => 30,
                'nama' => 'Ni Putu Arlina Dewi',
                'username' => 'arlina',
                'password' => Hash::make('arlina12345'),
                'kode_kios' => 706805,
                'peran_id' => 2
            ],
            [
                'id' => 31,
                'nama' => 'Komang Subroto Adijaya',
                'username' => 'subroto',
                'password' => Hash::make('subroto12345'),
                'kode_kios' => 706805,
                'peran_id' => 2
            ],
            [
                'id' => 32,
                'nama' => 'Hari Sulistyo',
                'username' => 'hari',
                'password' => Hash::make('hari12345'),
                'kode_kios' => 706805,
                'peran_id' => 2
            ],
            [
                'id' => 33,
                'nama' => 'I Komang Agus Indra Jaya',
                'username' => 'indra',
                'password' => Hash::make('indra12345'),
                'kode_kios' => 706805,
                'peran_id' => 2
            ],
            [
                'id' => 34,
                'nama' => 'Ni Kadek Aprilia Vitaloka',
                'username' => 'vita',
                'password' => Hash::make('vita12345'),
                'kode_kios' => 706805,
                'peran_id' => 2
            ],
            [
                'id' => 35,
                'nama' => 'Komang Lisa Andriyani',
                'username' => 'lisa',
                'password' => Hash::make('lisa12345'),
                'kode_kios' => 706805,
                'peran_id' => 2
            ],

            [
                'id' => 36,
                'nama' => 'Gede Arya Sentana',
                'username' => 'arya',
                'password' => Hash::make('arya12345'),
                'kode_kios' => 706925,
                'peran_id' => 2
            ],
            [
                'id' => 37,
                'nama' => 'Nyoman Duta Suwarlana',
                'username' => 'duta',
                'password' => Hash::make('duta12345'),
                'kode_kios' => 706925,
                'peran_id' => 2
            ],
            [
                'id' => 38,
                'nama' => 'Putu Pindya Jayanti',
                'username' => 'pindya',
                'password' => Hash::make('pindya12345'),
                'kode_kios' => 706925,
                'peran_id' => 2
            ],
            [
                'id' => 39,
                'nama' => 'Luh Sri Utami',
                'username' => 'sri',
                'password' => Hash::make('sri12345'),
                'kode_kios' => 706925,
                'peran_id' => 2
            ],
            [
                'id' => 40,
                'nama' => 'Putu Indra Yudana',
                'username' => 'yuda',
                'password' => Hash::make('yuda12345'),
                'kode_kios' => 706925,
                'peran_id' => 2
            ],
        ]);
    }
}
