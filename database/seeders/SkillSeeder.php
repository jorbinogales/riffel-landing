<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::all()->each(fn($data) => $data->delete());

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

            Skill::create(['text' => $row]);

        }

    }
}
