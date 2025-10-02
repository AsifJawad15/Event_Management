<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactPageItem;

class AdminOtherPageController extends Controller
{
    public function contact_page()
    {
        $page_data = ContactPageItem::where('id',1)->first();
        return view('admin.other_pages.contact', compact('page_data'));
    }

    public function contact_page_update(Request $request)
    {
        $obj = ContactPageItem::where('id',1)->first();
        $obj->address = $request->address;
        $obj->phone = $request->phone;
        $obj->email = $request->email;
        $obj->map = $request->map;
        $obj->save();

        return redirect()->back()->with('success','Data is updated!');
    }
}
