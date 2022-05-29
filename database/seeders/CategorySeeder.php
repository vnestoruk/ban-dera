<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    private array $_CATEGORIES = [
        'Automotive',
        'Business',
        'Casino',
        'Entertainment',
        'Financial',
        'Government',
        'Media',
        'Piracy',
        'Services',
        'Social Network',
        'Tourism'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->_CATEGORIES as $CATEGORY) {
            if (!Category::where('title', '=', $CATEGORY)->exists()) {
                Category::create(['title' => $CATEGORY]);
            }
        }
        $this->command->info(count($this->_CATEGORIES) . ' categories added.');
    }
}
