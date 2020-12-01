<?php

namespace Database\Seeders;

use App\Models\Clen;
use App\Models\Moderator;
use App\Models\Skupina;
use Illuminate\Database\Seeder;

class TestGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skupina::Create([
            'nazev' => 'private',
            'popis' => 'description',
            'zabezpeceni_profilu' => true,
            'zabezpeceni_obsahu' => true,
            'spravce' => 2,
        ]);
        Skupina::Create([
            'nazev' => 'public',
            'popis' => 'description',
            'zabezpeceni_profilu' => false,
            'zabezpeceni_obsahu' => false,
            'spravce' => 2,
        ]);

        Clen::Create([
            'id_users' => 2,
            'id_skupina' => 1
        ]);

        Clen::Create([
            'id_users' => 3,
            'id_skupina' => 1
        ]);

        Clen::Create([
            'id_users' => 4,
            'id_skupina' => 1
        ]);

        Clen::Create([
            'id_users' => 2,
            'id_skupina' => 2
        ]);

        Clen::Create([
            'id_users' => 3,
            'id_skupina' => 2
        ]);

        Clen::Create([
            'id_users' => 4,
            'id_skupina' => 2
        ]);

        Moderator::Create([
            'id_users' => 3,
            'id_skupina' => 1
        ]);

        Moderator::Create([
            'id_users' => 3,
            'id_skupina' => 2
        ]);
    }
}
