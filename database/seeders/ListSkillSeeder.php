<?php

namespace Database\Seeders;

use App\Models\ListSkill;
use Illuminate\Database\Seeder;

class ListSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ListSkill::all()->each(fn($data) => $data->delete());

        $datas = [
            ['text' => 'Migracion'],
            ['text' => 'Familia'],
        ];


        foreach($datas as $data){
        
            $this->createSeeder($data);

        }
    }

    private function createSeeder($data){

        foreach($data as $row){

            ListSkill::create(['text' => $row]);

        }

    }
}
