<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    /**
     * Display a listing of FAQs with pagination
     */
    public function index()
    {
        $faqs = Faq::orderBy('id', 'desc')->paginate(10);
        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new FAQ
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created FAQ in storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:1000',
            'answer' => 'required|string'
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer
        ]);

        return redirect()->route('admin_faq_index')->with('success', 'FAQ added successfully');
    }

    /**
     * Display the specified FAQ
     */
    public function show(Faq $faq)
    {
        return view('admin.faq.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified FAQ
     */
    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the specified FAQ in storage
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:1000',
            'answer' => 'required|string'
        ]);

        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer
        ]);

        return redirect()->route('admin_faq_index')->with('success', 'FAQ updated successfully');
    }

    /**
     * Remove the specified FAQ from storage
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin_faq_index')->with('success', 'FAQ deleted successfully');
    }
}
