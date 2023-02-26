<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    private array $_CATEGORIES = [
        'automotive',
        'business',
        'casino',
        'entertainment',
        'financial',
        'government',
        'media',
        'piracy',
        'services',
        'social_network',
        'tourism'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->_CATEGORIES as $CATEGORY) {
            if (!Category::where('key', '=', $CATEGORY)->exists()) {
                Category::create(['key' => $CATEGORY]);
            }
        }
        $this->command->info(count($this->_CATEGORIES) . ' categories added.');
    }
}
