<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function store(Request $request)
    {
        $img_path = null;
        $video_path = null;

        if ($request->hasFile('img_path')) {
            $img_path = $this->uploadImage($request->file('img_path'));
        }

        if ($request->hasFile('video_path')) {
            $video_path = $this->uploadVideo($request->file('video_path'));
        }

        $img_paths = [];
        if ($request->hasFile('img_paths')) {
            foreach ($request->file('img_paths') as $file) {
                $img_paths[] = $this->uploadImage($file);
            }
        }
        $video_paths = [];

        if ($request->hasFile('video_paths')) {
            foreach ($request->file('video_paths') as $file) {
                $video_paths[] = $this->uploadVideo($file); // upload each file
            }
        } else {
            $paths = null; // or leave as empty array []
        }

        // Create a new content instance
        Content::create([
            'type' => $request->input('type'),
            'parent_id' => $request->input('parent_id'),
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'body_2' => $request->input('body_2'),
            'body_3' => $request->input('body_3'),
            'body_4' => $request->input('body_4'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'meta_keywords' => $request->input('meta_keywords'),
            'img_path' => $img_path,
            'video_path' => $video_path,
            'img_paths' => json_encode($img_paths),
            'video_paths' => json_encode($video_paths),
            'url' => $request->input('url'),
            'start_date' => $request->input('start_date'),
            'short' => $request->input('short'),
            'end_date' => $request->input('end_date'),
            'location' => $request->input('location'),
            'extra' => $request->input('extra'),
            // 'status' => $request->input('status', 0),
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->back()->with('status', $request->input('type') . ' created successfully!');
    }
    public function update(Request $request)
    {
        $content = Content::find($request->input('id'));
        $img_path = $content->img_path;
        $video_path = $content->video_path;

        if ($request->hasFile('img_path')) {
            if ($content->img_path && file_exists(public_path($content->img_path))) {
                unlink(public_path($content->img_path));
            }
            $img_path = $this->uploadImage($request->file('img_path'));
        }

        if ($request->hasFile('video_path')) {
            if ($content->video_path && file_exists(public_path($content->video_path))) {
                unlink(public_path($content->video_path));
            }
            $video_path = $this->uploadVideo($request->file('video_path'));
        }

        $paths = json_decode($content->img_paths);
        if ($request->hasFile('img_paths')) {
            // Upload new images
            foreach ($request->file('img_paths') as $file) {
                $paths[] = $this->uploadImage($file);
            }
            $paths = json_encode($paths);
        } else {
            $paths = $content->img_paths ?? null; // keep old images if no new upload
        }

        // Create a new content instance
        $content->update([
            'type' => $request->input('type'),
            'parent_id' => $request->input('parent_id'),
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'short' => $request->input('short'),
            'img_paths' => $paths,

            'body' => $request->input('body'),
            'body_2' => $request->input('body_2'),
            'body_3' => $request->input('body_3'),
            'body_4' => $request->input('body_4'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'meta_keywords' => $request->input('meta_keywords'),
            'img_path' => $img_path,
            'video_path' => $video_path,
            'url' => $request->input('url'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'location' => $request->input('location'),
            'extra' => $request->input('extra'),
            // 'status' => $request->input('status', 0),
            'status' => $request->status == 'inactive' ? 0 : 1,
        ]);

        return redirect()->back()->with('status', $request->input('type') . ' updated successfully!');
    }
    public function destroy($type, $id)
    {
        $content = Content::find($id);

        if ($content->img_path && file_exists(public_path($content->img_path))) {
            unlink(public_path($content->img_path));
        }

        if ($content->video_path && file_exists(public_path($content->video_path))) {
            unlink(public_path($content->video_path));
        }

        $content->delete();
        return redirect()->back()->with('status', 'Deleted successfully!');
    }
    public function edit($type, $id)
    {
        $content = Content::find($id);
        return view('backend.content.update', compact('content', 'type'));
    }
    public function create($type)
    {
        return view('backend.content.create', compact('type'));
    }
    public function index($type)
    {
        $datas = Content::where('type', $type)->get();
        return view('backend.content.index', compact('datas', 'type'));
    }
    public function show($id)
    {
        $content = Content::find($id);
        return view('backend.content.show', compact('content'));
    }
    public function uploadImage($image)
    {
        $imageName = time() . rand(9999, 99999) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        return 'images/' . $imageName;
    }
    public function uploadVideo($video)
    {
        $videoName = time() . rand(999, 9999) . '.' . $video->getClientOriginalExtension();
        $video->move(public_path('videos'), $videoName);
        return 'videos/' . $videoName;
    }
}
