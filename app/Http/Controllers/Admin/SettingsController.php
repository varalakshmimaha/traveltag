<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->keyBy('key')->toArray();
        
        return view('admin.settings.edit', [
            'settings' => $settings,
            'setting_keys' => [
                'site_name' => 'TravelTag',
                'site_title' => 'Travel Tag',
                'tagline' => 'Explore the World',
                'logo' => null,
                'favicon' => null,
                'footer_text' => '© 2024 TravelTag. All rights reserved.',
                'phone' => '+1234567890',
                'whatsapp' => '+1234567890',
                'email' => 'contact@traveltag.com',
                'address' => 'Your address here',
                'map_embed' => '',
                'facebook_url' => 'https://facebook.com',
                'instagram_url' => 'https://instagram.com',
                'youtube_url' => 'https://youtube.com',
                'twitter_url' => 'https://twitter.com',
                'linkedin_url' => 'https://linkedin.com',
                'primary_color' => '#0066cc',
                'secondary_color' => '#10b981',
                'font_family' => 'Poppins',
                'dark_mode_enabled' => '0',
            ]
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_title' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'footer_text' => 'required|string',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'email' => 'required|email',
            'address' => 'required|string',
            'map_embed' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'primary_color' => 'required|regex:/#[0-9A-F]{6}/i',
            'secondary_color' => 'required|regex:/#[0-9A-F]{6}/i',
            'font_family' => 'required|in:Poppins,Roboto,Open Sans,Lato,Montserrat',
            'dark_mode_enabled' => 'nullable|boolean',
            'logo' => 'nullable|image|max:2048',
            'favicon' => 'nullable|image|max:512',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('settings/logo', 'public');
            Setting::set('logo', $logoPath);
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            $faviconPath = $request->file('favicon')->store('settings/favicon', 'public');
            Setting::set('favicon', $faviconPath);
        }

        // Save other settings
        foreach ($validated as $key => $value) {
            if (!in_array($key, ['logo', 'favicon'])) {
                Setting::set($key, $value);
            }
        }

        // Handle dark mode separately (since it's a checkbox)
        Setting::set('dark_mode_enabled', $request->has('dark_mode_enabled') ? '1' : '0');

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully!');
    }
}
