<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Content;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    function slug($key)
    {
        return $slug = strtolower(str_replace(' ', '-', $key)); // results in 'privacy-policy'

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $contents = [

            'hero' => [
                'title'             => ['label' => 'Title', 'required' => true],
                'name'              => ['label' => 'Section Name', 'required' => true],
                'short'             => ['label' => 'Short Description', 'required' => false],
                'img_path'          => ['label' => 'Image Background', 'required' => false],
                'img_paths'         => ['label' => 'Images', 'required' => false],
                'video_path'        => ['label' => 'Video', 'required' => false],
                'body'              => ['label' => 'Paragraph 1', 'required' => false],
                'body_2'            => ['label' => 'Paragraph 2', 'required' => false],
                'meta_title'        => ['label' => 'Meta Title', 'required' => false],
                'meta_description'  => ['label' => 'Meta Description', 'required' => false],
                'meta_keywords'     => ['label' => 'Meta Keywords', 'required' => false],
                'status'            => ['label' => 'Status', 'required' => true],
            ],
            'hero_tab' => [
                'title'      => ['label' => 'Tab Title (e.g. BHAIYA HOUSING)', 'required' => true],
                'name'       => ['label' => 'Internal Name', 'required' => true],
                'img_path'   => ['label' => 'Tab Icon (Image)', 'required' => true],
                'video_path' => ['label' => 'Link URL (Optional)', 'required' => false],
                'meta_title'        => ['label' => 'Meta Title', 'required' => false],
                'meta_description'  => ['label' => 'Meta Description', 'required' => false],
                'meta_keywords'     => ['label' => 'Meta Keywords', 'required' => false],
                'status'            => ['label' => 'Status', 'required' => true],
            ],
            'stats' => [
                'title'  => ['label' => 'Stat Label (e.g. Stalls)', 'required' => true],
                'name'   => ['label' => 'Icon Class (e.g. fa-solid fa-store)', 'required' => true],
                'short'  => ['label' => 'Value (e.g. 5,230)', 'required' => true],
                'meta_title'        => ['label' => 'Meta Title', 'required' => false],
                'meta_description'  => ['label' => 'Meta Description', 'required' => false],
                'meta_keywords'     => ['label' => 'Meta Keywords', 'required' => false],
                'status' => ['label' => 'Status', 'required' => true],
            ],
            'live_project_header' => [
                'title' => ['label' => 'Main Title', 'required' => true],
                'name' => ['label' => 'Subtitle (MOMENTS AT...)', 'required' => true],
                'short'  => ['label' => 'Description Paragraph', 'required' => true],
                'meta_title'        => ['label' => 'Meta Title', 'required' => false],
                'meta_description'  => ['label' => 'Meta Description', 'required' => false],
                'meta_keywords'     => ['label' => 'Meta Keywords', 'required' => false],
                'status' => ['label' => 'Status', 'required' => true],
            ],
            'live_project' => [
                'title'    => ['label' => 'Project Name', 'required' => true],
                'name'    => ['label' => 'Location (Cox’sbazar, ...)', 'required' => true],
                'img_path' => ['label' => 'Thumbnail Image', 'required' => true],
                'short'   => ['label' => 'Watching Count (e.g. 2.1k)', 'required' => false],
                'meta_title'        => ['label' => 'Meta Title', 'required' => false],
                'meta_description'  => ['label' => 'Meta Description', 'required' => false],
                'meta_keywords'     => ['label' => 'Meta Keywords', 'required' => false],
                'status'   => ['label' => 'Status', 'required' => true],
            ],
            'project' => [
                'title'    => ['label' => 'Project Name (Heading)', 'required' => true],
                'name'     => ['label' => 'Publish Date (e.g. April 25, 2024)', 'required' => true],
                'short'    => ['label' => 'Location (e.g. Banani, Dhaka)', 'required' => true],
                'body'     => ['label' => 'Specs (e.g. 3,025 Sq Ft, Flat)', 'required' => true],
                'img_path' => ['label' => 'Project Image', 'required' => true],
                'meta_title'        => ['label' => 'Meta Title', 'required' => false],
                'meta_description'  => ['label' => 'Meta Description', 'required' => false],
                'meta_keywords'     => ['label' => 'Meta Keywords', 'required' => false],
                'status'   => ['label' => 'Status', 'required' => true],
            ],
            'gallery_header' => [
                'title' => ['label' => 'Main Title', 'required' => true],
                'name' => ['label' => 'Subtitle (MOMENTS AT...)', 'required' => true],
                'short'  => ['label' => 'Description Paragraph', 'required' => true],
                'meta_title'        => ['label' => 'Meta Title', 'required' => false],
                'meta_description'  => ['label' => 'Meta Description', 'required' => false],
                'meta_keywords'     => ['label' => 'Meta Keywords', 'required' => false],
                'status' => ['label' => 'Status', 'required' => true],
            ],
            'gallery' => [
                'title' => ['label' => 'Main Title', 'required' => false],
                'name' => ['label' => 'Subtitle (MOMENTS AT...)', 'required' => false],
                'img_path' => ['label' => 'Gallery Image (4:3 ratio recommended)', 'required' => true],
                'meta_title'        => ['label' => 'Meta Title', 'required' => false],
                'meta_description'  => ['label' => 'Meta Description', 'required' => false],
                'meta_keywords'     => ['label' => 'Meta Keywords', 'required' => false],
                'status'   => ['label' => 'Status', 'required' => true],
            ],
            'video_header' => [
                'title' => ['label' => 'Main Heading', 'required' => true],
                'name' => ['label' => 'Subtitle (Upper Text)', 'required' => true],
                'short'  => ['label' => 'Description Paragraph', 'required' => true],
                'meta_title'        => ['label' => 'Meta Title', 'required' => false],
                'meta_description'  => ['label' => 'Meta Description', 'required' => false],
                'meta_keywords'     => ['label' => 'Meta Keywords', 'required' => false],
                'status' => ['label' => 'Status', 'required' => true],
            ],

            'video_list' => [
                'title'    => ['label' => 'Video Title (e.g. DINING)', 'required' => true],
                'name'    => ['label' => 'sub title', 'required' => true],
                'short'     => ['label' => 'Duration (e.g. 5.30)', 'required' => true],
                'img_path' => ['label' => 'Thumbnail Image', 'required' => true],
                'video_path'     => ['label' => 'Video Source ', 'required' => false],
                'meta_title'        => ['label' => 'Meta Title', 'required' => false],
                'meta_description'  => ['label' => 'Meta Description', 'required' => false],
                'meta_keywords'     => ['label' => 'Meta Keywords', 'required' => false],
                'status'   => ['label' => 'Status', 'required' => true],
            ],



            'pages' => [
                'title'      => ['label' => 'Title', 'required' => true],
                'name'      => ['label' => 'slug', 'required' => true],
                'body'      => ['label' => 'Description', 'required' => true],
                'status'   => ['label' => 'Status', 'required' => true],
            ],
            'social' => [
                'url'      => ['label' => 'Social Link', 'required' => true],
                'name'      => ['label' => 'Icon Code - fontawsome', 'required' => true],
                'status'   => ['label' => 'Status', 'required' => true],
            ],
            'our-project' => [
                'name'      => ['label' => 'Title', 'required' => true],
                'url'      => ['label' => 'Link', 'required' => true],
                'status'   => ['label' => 'Status', 'required' => true],
            ],
            'settings' => [
                'title'      => ['label' => 'Site Name', 'required' => true],
                'name'      => ['label' => 'Sologan', 'required' => true],
                'img_path' => ['label' => 'logo', 'required' => true],
                'short'      => ['label' => 'Address', 'required' => true],
                'location'      => ['label' => 'Email', 'required' => true],
                'extra'      => ['label' => 'Phone', 'required' => true],
                'status'   => ['label' => 'Status', 'required' => true],
            ],

        ];

        $setting = Content::where('type', 'settings')->where('status', 1)->first();
        $socials = Content::where('type', 'social')->where('status', 1)->latest()->get();
        $projects = Content::where('type', 'our-project')->where('status', 1)->latest()->get();
        $pages = Content::where('type', 'pages')->where('status', 1)->get();

        View::share('contents', $contents);
        View::share('setting', $setting);
        View::share('socials', $socials);
        View::share('projects', $projects);
        View::share('pages', $pages);
    }
}
