<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    public function index()
    {
        return Inertia::render('Index');
    }

    public function store(Request $request)
    {
        // Add debug log
        Log::info('Contact form submitted', $request->all());

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            // Store in database
            $contact = Contact::create($validated);

            // Debug log successful creation
            Log::info('Contact created successfully', ['id' => $contact->id]);

            // Optional: Send email
//             Mail::to('your-email@example.com')->send(new ContactFormMail($validated));

            return redirect()->route('index')->with('success', 'Thank you for your message! We will get back to you soon.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Failed to create contact', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('index')->with('error', 'There was a problem submitting your message. Please try again.');
        }
    }
}

