<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
    /**
     * Return whole list of posts<br>
     * No authorization required
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Post::all());
    }

    /**
     * Create new post<br>
     * Only if the Posts' policy allows it
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $rules = array(
            'subject'   => 'required|string',
            'body'      => 'required|string',
        );
        $this->validate(Request::instance(), $rules);

        $this->authorize('create', Post::class);

        $post = new Post();
        $post->subject = Input::get('subject');
        $post->body = Input::get('body');
        Auth::user()->posts()->save($post);

        return response()->json($post);
    }

    /**
     * Update post<br>
     * Only if the Posts' policy allows it
     *
     * @param $post_id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update($post_id)
    {
        $rules = array(
            'subject'   => 'required|string',
            'body'      => 'required|string',
        );
        $this->validate(Request::instance(), $rules);

        $post = Post::find($post_id);
        $this->authorize('update', $post);

        try {
            $post->subject = Input::get('subject');
            $post->body = Input::get('body');
            $post->save();

            return response()->json($post);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Post not updated',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}