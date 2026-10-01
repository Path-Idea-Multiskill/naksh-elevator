<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Service;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $services = Service::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        return view(
            'frontend.contact.index',
            compact('services')
        );
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'phone' => [
                'required',
                'string',
                'max:20',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'subject' => [
                'required',
                'string',
                'max:255',
            ],

            'service' => [
                'nullable',
                'string',
                'max:255',
            ],

            'message' => [
                'required',
                'string',
                'max:2000',
            ],
        ]);


        Enquiry::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'subject' => $validated['subject'],
            'service' => $validated['service'] ?? null,
            'message' => $validated['message'],
            'status' => 'new',
            'admin_notes' => null,
            'read_at' => null,
        ]);


        return redirect()
            ->route('contact.index')
            ->with(
                'success',
                'Thank you! Your enquiry has been submitted successfully. Our team will contact you soon.'
            );
    }
}