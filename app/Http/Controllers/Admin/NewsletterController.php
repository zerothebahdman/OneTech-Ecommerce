<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Newsletter;
use Illuminate\Support\Carbon;

class NewsletterController extends Controller
{
    public function index()
    {
        $subscribers = Newsletter::latest()->get();

        $subscribers_today = Newsletter::whereDate('created_at', today())->latest()->get();

        $subscribers_year_month = Newsletter::whereYear('created_at', now()->year)->whereMonth('created_at', now()->month)->latest()->get();

        return view('adminDashboard.newsletter_subscribers.index', compact('subscribers', 'subscribers_today', 'subscribers_year_month'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['bail', 'required', 'string', 'email', 'unique:news_letters']
        ]);

        Newsletter::insert([
            'email' => $request['email'],
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Thanks for subscribing to our Newsletters');
    }
}