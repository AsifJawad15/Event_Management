<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageFacility;
use Illuminate\Http\Request;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderByItemOrder()->get();
        $facilities = PackageFacility::active()->orderByItemOrder()->get();
        return view('admin.package.index', compact('packages', 'facilities'));
    }

    public function create()
    {
        $facilities = PackageFacility::active()->orderByItemOrder()->get();
        return view('admin.package.create', compact('facilities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'maximum_tickets' => 'nullable|integer|min:1',
            'item_order' => 'required|integer|min:0',
            'facilities' => 'nullable|array',
            'facilities.*' => 'exists:package_facilities,id'
        ]);

        $package = Package::create($request->only(['name', 'price', 'maximum_tickets', 'item_order']));

        if ($request->has('facilities')) {
            $package->facilities()->sync($request->facilities);
        }

        return redirect()->route('admin_package_index')->with('success', 'Package created successfully.');
    }

    public function edit($id)
    {
        $package = Package::with('facilities')->findOrFail($id);
        $facilities = PackageFacility::active()->orderByItemOrder()->get();
        return view('admin.package.edit', compact('package', 'facilities'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'maximum_tickets' => 'nullable|integer|min:1',
            'item_order' => 'required|integer|min:0',
            'facilities' => 'nullable|array',
            'facilities.*' => 'exists:package_facilities,id'
        ]);

        $package = Package::findOrFail($id);
        $package->update($request->only(['name', 'price', 'maximum_tickets', 'item_order']));

        if ($request->has('facilities')) {
            $package->facilities()->sync($request->facilities);
        } else {
            $package->facilities()->detach();
        }

        return redirect()->route('admin_package_index')->with('success', 'Package updated successfully.');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->facilities()->detach();
        $package->delete();

        return redirect()->route('admin_package_index')->with('success', 'Package deleted successfully.');
    }

    // Facility Management
    public function facilityIndex()
    {
        $facilities = PackageFacility::orderByItemOrder()->get();
        return view('admin.package.facility_index', compact('facilities'));
    }

    public function facilityCreate()
    {
        return view('admin.package.facility_create');
    }

    public function facilityStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:package_facilities,name',
            'status' => 'required|boolean',
            'item_order' => 'required|integer|min:0'
        ]);

        PackageFacility::create($request->all());

        return redirect()->route('admin_package_facility_index')->with('success', 'Facility created successfully.');
    }

    public function facilityEdit($id)
    {
        $facility = PackageFacility::findOrFail($id);
        return view('admin.package.facility_edit', compact('facility'));
    }

    public function facilityUpdate(Request $request, $id)
    {
        $facility = PackageFacility::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255|unique:package_facilities,name,' . $facility->id,
            'status' => 'required|boolean',
            'item_order' => 'required|integer|min:0'
        ]);

        $facility->update($request->all());

        return redirect()->route('admin_package_facility_index')->with('success', 'Facility updated successfully.');
    }

    public function facilityDestroy($id)
    {
        $facility = PackageFacility::findOrFail($id);
        $facility->packages()->detach();
        $facility->delete();

        return redirect()->route('admin_package_facility_index')->with('success', 'Facility deleted successfully.');
    }
}