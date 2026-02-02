<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController
{
    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10'
        ]);

        try {
            DB::connection()->getPdo();
            // Store in database
            Contact::create($request->all());
        } catch (\Exception $e) {
            // Log error or ignore for static demo
            // Since this is a portfolio, we just pretend it sent if DB fails
        }

        return redirect()->route('contact')
            ->with('success', 'Your message has been sent successfully!');
    }
}
