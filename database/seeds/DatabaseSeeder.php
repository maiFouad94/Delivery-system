<?php
use App\Models\Order\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(AuthTableSeeder::class);

        Model::reguard();
        Location::create([
            'lat'        => '31.2116291',
            'long'         => '29.9306771',
            'src_address' => '25 helmy bahagt,Alexandria'

        ]);

    }
}
