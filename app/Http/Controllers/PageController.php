<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10'
        ]);

        try {
            DB::connection()->getPdo();
            Contact::create($validated);
        } catch (\Exception $e) {
            Log::warning('Contact message could not be stored.', [
                'error' => $e->getMessage(),
                'email' => $validated['email'],
            ]);
        }

        if (app()->environment('production') && in_array(config('mail.default'), ['log', 'array'], true)) {
            return back()
                ->withInput()
                ->with('error', 'The email service is not configured yet. Please email me directly at villaloboscarlosmiguel@gmail.com.');
        }

        try {
            Mail::to(config('mail.contact_to'))->send(new ContactMessageMail($validated));
        } catch (\Throwable $e) {
            Log::error('Contact message email failed.', [
                'error' => $e->getMessage(),
                'email' => $validated['email'],
            ]);

            return back()
                ->withInput()
                ->with('error', 'Sorry, your message could not be emailed right now. Please email me directly at villaloboscarlosmiguel@gmail.com.');
        }

        return redirect()->route('contact')
            ->with('success', 'Your message has been sent successfully!');
    }
}
