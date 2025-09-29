<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;
use App\Models\PackageFacility;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create facilities first
        $facilities = [
            ['name' => 'Conference Materials', 'status' => 1, 'item_order' => 1],
            ['name' => 'Lunch & Refreshments', 'status' => 1, 'item_order' => 2],
            ['name' => 'Certificate of Attendance', 'status' => 1, 'item_order' => 3],
            ['name' => 'Networking Session', 'status' => 1, 'item_order' => 4],
            ['name' => 'Workshop Access', 'status' => 1, 'item_order' => 5],
            ['name' => 'VIP Seating', 'status' => 1, 'item_order' => 6],
            ['name' => 'Welcome Kit', 'status' => 1, 'item_order' => 7],
            ['name' => 'Parking Pass', 'status' => 1, 'item_order' => 8],
            ['name' => 'Access to Recordings', 'status' => 1, 'item_order' => 9],
            ['name' => 'One-on-One Speaker Meet', 'status' => 1, 'item_order' => 10],
        ];

        foreach ($facilities as $facility) {
            PackageFacility::create($facility);
        }

        // Create packages
        $basicPackage = Package::create([
            'name' => 'Basic',
            'price' => 99.00,
            'maximum_tickets' => null,
            'item_order' => 1
        ]);

        $premiumPackage = Package::create([
            'name' => 'Premium',
            'price' => 199.00,
            'maximum_tickets' => null,
            'item_order' => 2
        ]);

        $vipPackage = Package::create([
            'name' => 'VIP',
            'price' => 299.00,
            'maximum_tickets' => 50,
            'item_order' => 3
        ]);

        // Assign facilities to packages
        $allFacilities = PackageFacility::all();

        // Basic package gets basic facilities
        $basicPackage->facilities()->attach([
            $allFacilities->where('name', 'Conference Materials')->first()->id,
            $allFacilities->where('name', 'Certificate of Attendance')->first()->id,
            $allFacilities->where('name', 'Welcome Kit')->first()->id,
        ]);

        // Premium package gets more facilities
        $premiumPackage->facilities()->attach([
            $allFacilities->where('name', 'Conference Materials')->first()->id,
            $allFacilities->where('name', 'Lunch & Refreshments')->first()->id,
            $allFacilities->where('name', 'Certificate of Attendance')->first()->id,
            $allFacilities->where('name', 'Networking Session')->first()->id,
            $allFacilities->where('name', 'Welcome Kit')->first()->id,
            $allFacilities->where('name', 'Parking Pass')->first()->id,
            $allFacilities->where('name', 'Access to Recordings')->first()->id,
        ]);

        // VIP package gets all facilities
        $vipPackage->facilities()->attach([
            $allFacilities->where('name', 'Conference Materials')->first()->id,
            $allFacilities->where('name', 'Lunch & Refreshments')->first()->id,
            $allFacilities->where('name', 'Certificate of Attendance')->first()->id,
            $allFacilities->where('name', 'Networking Session')->first()->id,
            $allFacilities->where('name', 'Workshop Access')->first()->id,
            $allFacilities->where('name', 'VIP Seating')->first()->id,
            $allFacilities->where('name', 'Welcome Kit')->first()->id,
            $allFacilities->where('name', 'Parking Pass')->first()->id,
            $allFacilities->where('name', 'Access to Recordings')->first()->id,
            $allFacilities->where('name', 'One-on-One Speaker Meet')->first()->id,
        ]);
    }
}
