<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    private array $_QUOTES = [
        [
            'content' => 'I need ammo, not a ride',
            'author' => 'Volodymyr Zelensky'
        ],
        [
            'content' => 'Russian warship, go fuck yourself!',
            'author' => 'Roman Hrybov'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->_QUOTES as $QUOTE) {
            if (!Quote::where('content', '=', $QUOTE['content'])->exists()) {
                Quote::create($QUOTE);
            }
        }
        $this->command->info(count($this->_QUOTES) . ' quotes added.');
    }
}
