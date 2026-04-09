<?php

if (!function_exists('setting')) {
    /**
     * Get a setting value
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting($key, $default = null)
    {
        return \App\Models\Setting::get($key, $default);
    }
}

if (!function_exists('getSiteSettings')) {
    /**
     * Get all site settings as an array
     *
     * @return array
     */
    function getSiteSettings()
    {
        return [
            'site_name' => setting('site_name', 'TravelTag'),
            'site_title' => setting('site_title', 'Travel Tag'),
            'tagline' => setting('tagline', 'Explore the World'),
            'logo' => setting('logo'),
            'favicon' => setting('favicon'),
            'footer_text' => setting('footer_text', '© 2024 TravelTag. All rights reserved.'),
            'phone' => setting('phone', '+1234567890'),
            'whatsapp' => setting('whatsapp', '+1234567890'),
            'email' => setting('email', 'contact@traveltag.com'),
            'address' => setting('address', 'Your address here'),
            'map_embed' => setting('map_embed'),
            'facebook_url' => setting('facebook_url'),
            'instagram_url' => setting('instagram_url'),
            'youtube_url' => setting('youtube_url'),
            'twitter_url' => setting('twitter_url'),
            'linkedin_url' => setting('linkedin_url'),
            'primary_color' => setting('primary_color', '#0066cc'),
            'secondary_color' => setting('secondary_color', '#10b981'),
            'font_family' => setting('font_family', 'Poppins'),
            'dark_mode_enabled' => setting('dark_mode_enabled', '0'),
        ];
    }
}
