<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('writer', 'comments')->withCount(['likes', 'comments'])
            ->orderBy('likes_count', 'desc')
            ->orderBy('comments_count', 'desc')
            ->take(10)
            ->get();
        $xmlContent = $this->generateXml($posts);
        $new_posts = Post::with('writer')->get();
        $categories = Category::all();
        $xml_obj = simplexml_load_string($xmlContent);
        $xmlArray = json_decode(json_encode($xml_obj), true);
        if (isset($xmlArray['post']) && !is_array($xmlArray['post'])) {
            $xmlArray['post'] = [$xmlArray['post']];
        }
        return view('home', ['xmlArray' => $xmlArray,'new_posts'=>$new_posts,'categories'=>$categories]);
    }

  public function post_by_category($id){
      $posts = Post::where('category_id','=',$id)->get();
      $categories = Category::all();

      return view('category_page', ['new_posts'=>$posts,'categories'=>$categories]);

  }

    public function getPopularPosts()
    {
        $new_posts = Post::with('writer')->get();
        $posts = Post::with('writer', 'comments')->withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->take(10)->get();

        $xmlContent = $this->generateXml($posts);
        $new_posts = Post::with('writer')->get();
        $categories = Category::all();
        $xml_obj = simplexml_load_string($xmlContent);
        $xmlArray = json_decode(json_encode($xml_obj), true);

        return view('home2', ['xmlArray' => $xmlContent,'new_posts'=>$new_posts,'categories'=>$categories]);
    }
    public function generateXml($posts)
    {
        $xml = new \SimpleXMLElement('<posts/>');

        foreach ($posts as $post) {
            $postNode = $xml->addChild('post');
            $postNode->addChild('id', $post->id);
            $postNode->addChild('title', htmlspecialchars($post->post_topic));
            $postNode->addChild('content', htmlspecialchars($post->post_content));
            $postNode->addChild('likes', $post->post_likes);
            $postNode->addChild('comments', $post->comments_count); // Add the comments count here
            $postNode->addChild('category', htmlspecialchars($post->category->name)); // Assuming the 'category' relation exists
            $postNode->addChild('date', $post->created_at->toFormattedDateString());
            $postNode->addChild('author', htmlspecialchars($post->writer->name)); // Assuming the 'user' relation exists and it has a 'name' attribute
        }

            return $xml->asXML();
    }


}
