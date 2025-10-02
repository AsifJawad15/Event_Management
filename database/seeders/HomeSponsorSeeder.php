namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeSponsor;

class HomeSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeSponsor::create([
            'heading' => 'Our Sponsors',
            'description' => 'We are grateful to our sponsors for their support and partnership.',
            'how_many' => 8,
            'status' => 'Show'
        ]);
    }
}
