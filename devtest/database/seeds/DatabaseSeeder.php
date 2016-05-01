<?php

use Illuminate\Database\Seeder;
use App\Property;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		DB::table('properties')->delete();

		$csvObj = new mnshankar\CSV\CSV();

		$contents = $csvObj->with(storage_path().'/app/property-data.csv')->toArray();
		foreach( $contents as $content ) {
			property::create($content);
		}
    }
}
