<?php

namespace App\Http\Controllers;

use App\Libraries\IPController;
use App\Models\Post;
use App\Models\Shortlink;
use App\Models\WpPost;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PublicController extends Controller
{
    public function view($slug)
    {
        $link = Shortlink::where('slug', $slug)->first();
        if (!$link) {
            // abort(404);
            // $post = Post::where('slug', $slug)->first();
            $url = $slug;
            $post = WpPost::where('post_name', urlencode($slug))->first();
            if (!$post) {
                return response()->json([
                    'message' => 'Not Found',
                ], 404);
                abort(404);
            }

            $post->post_content = str_replace('www.digitalpaanda.com', 'accfresno.com', $post->post_content);

            $post->custom_created_at = $post->post_date;
            $post->content = $post->post_content;
            $post->title = $post->post_title;
            $post->slug = $post->post_name;
            $post->thumbnail = null;

            if (Session::has('link')) {
                $link = Session::get('link');

                if ($link->random == false) {
                    // return view('page', compact('link'));
                    return view('page2', [
                        'post' => $post,
                        'url' => $link->url,
                    ]);
                }
                // return response()->json($link);
                return view('view', compact('post', 'link'));
            }

            return view('view', compact('post'));
        }

        // $post = Post::inRandomOrder()->first();
        $post = WpPost::inRandomOrder()->where([
            'post_status' => 'publish',
            'post_type' => 'post'
        ])->first();
        $post->slug = $post->post_name;
        // url decode with php utf8mb4
        $post->content = $post->post_content;
        // return response()->json($post->slug);

        return redirect()->route('view', $post->slug)->with('link', $link);
    }

    public function post($slug)
    {
        // $post = Post::where('slug', $slug)->first();
        $post = WpPost::where('post_name', '%' . $slug . '%')->first();
        if (!$post) {
            abort(404);
        }

        if (Session::has('link')) {
            $link = Session::get('link');

            if ($link->random == false) {
                return view('page', [
                    'post' => $post,
                    'link' => $link,
                ]);
            }

            return view('view', compact('post', 'link'));
        }

        return view('view', compact('post'));
    }

    public function post2($slug, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'shortlink' => 'required|string',
        ]);

        if ($validator->fails()) {
            abort(404);
        }

        $shortlink = Shortlink::where('slug', $request->shortlink)->first();
        if (!$shortlink) {
            abort(404);
        }
        $url = $shortlink->url;

        // $post = Post::where('slug', $slug)->first();
        $post = WpPost::where('post_name', urlencode($slug))->first();
        if (!$post) {
            abort(404);
        }

        if (Session::has('link')) {
            $link = Session::get('link');

            if ($link->random == false) {
                return view('page2', [
                    'post' => $post,
                    'url' => $url,
                ]);
            }

            return view('page2', compact('post', 'url'));
        }

        return view('page2', compact('post', 'url'));
    }

    public function createShortlink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|url',
            'password' => 'nullable|string',
            'random' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $short_url = substr(md5(time() . $request->url) . Str::random(60) . md5($request->url), 0, 5);
        $i = 1;
        while (Shortlink::where('slug', $short_url)->first()) {
            $short_url = substr(md5(time() . $request->url) . Str::random(60) . md5($request->url) . $i++, 0, 5);
        }

        try {
            //code...
            DB::beginTransaction();
            $link = Shortlink::create([
                'url' => $request->url,
                'password' => $request->password,
                'slug' => $short_url,
                'random' => $request->random,
            ]);

            DB::commit();
            $link = Shortlink::where('slug', $short_url)->first();
            return $this->sendResponse($link, 'Shortlink created successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->sendError($th->getMessage(), $th->getTrace(), 'SERVER_ERROR', 500);
        }
    }

    public function createDirectShortlink(Request $request)
    {
        if (isset($request->url)) {
            $short_url = substr(md5(time() . $request->url) . Str::random(60) . md5($request->url), 0, 5);
            $i = 1;
            while (Shortlink::where('slug', $short_url)->first()) {
                $short_url = substr(md5(time() . $request->url) . Str::random(60) . md5($request->url) . $i++, 0, 5);
            }
            try {
                //code...
                DB::beginTransaction();
                $shortlink = Shortlink::firstOrCreate([
                    'url' => $request->url,
                ],[
                    'url' => $request->url,
                    'slug' => $short_url,
                    'random' => 1,
                ]);
                DB::commit();
                $shortlink = Shortlink::where('id', $shortlink->id)->first();
                return redirect()->route('view', $shortlink->slug);
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();
                return $this->sendError($th->getMessage(), $th->getTrace(), 'SERVER_ERROR', 500);
            }
        } else {
            return $this->sendError('URL is required', [], 'PROCESS_ERROR', 400);
        }
    }

    public function passwordShortlink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string',
            'shortlink' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation error', $validator->errors()->toJson(), 'VALIDATION_ERROR', 422);
        }

        $link = Shortlink::where('slug', $request->shortlink)->first();
        if (!$link) {
            return $this->sendError('Shortlink not found', [], 'PROCESS_ERROR', 404);
        }

        if ($link->password == $request->password) {
            return $this->sendResponse([], 'Password correct');
        } else {
            return $this->sendError('Password is incorrect', [], 'PROCESS_ERROR', 400);
        }
    }

    public function redirectShortlink(Request $request)
    {
        $ref = (new IPController)->getReferer();
        if ($ref == 'Direct') {
            abort(404);
        }
        $validator = Validator::make($request->all(), [
            'shortlink' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation error', $validator->errors()->toJson(), 'VALIDATION_ERROR', 422);
        }

        $link = Shortlink::where('slug', $request->shortlink)->first();
        if (!$link) {
            return $this->sendError('Shortlink not found', [], 'PROCESS_ERROR', 404);
        }

        return $this->sendResponse([
            'link' => $link->url,
        ], 'Shortlink found');

    }
}
