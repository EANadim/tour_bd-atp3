<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour_location;
use App\Article;
use App\Article_rating;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index()
    {
        $tour_locations=DB::table('tour_locations')->get();
        $articles=DB::table('articles')->join('users', 'articles.user_id', '=', 'users.user_id')->get();

        return view('article.index')->with('tour_locations',$tour_locations)->with('articles',$articles);
    }
    public function store(Request $req)
    {
        if ($req->has('post'))
        {
            $article=new Article();
            date_default_timezone_set('Asia/Dhaka');
            
            // $article->article_id=0;
            $article->user_id=$req->session()->get('user_id');
            $article->article= $req->input('article');
            $article->tour_location_id= $req->input('tour_location_id');
            $article->verification='yes';
            $article->topic=$req->input('topic');
            $article->type=$req->input('type');
            // $article->created_at=date('Y-m-d h:m:s');
            // $article->updated_at='0000-00-00 00:00:00';

            $article->save();
            return redirect()->route('article.index');
            // echo $req->session()->get('user_id');echo '<br>';
            // echo $req->input('article');echo '<br>';
            // echo $req->input('tour_location_id');echo '<br>';
            // echo $req->input('topic');echo '<br>';
            // echo $req->input('type');echo '<br>';

        }
        else if($req->has('comment_button'))
        {
            $article_rating=new Article_rating();
            
            $article_rating->article_id=$req->input('article_id');
            $article_rating->commenter_id=$req->session()->get('user_id');
            $article_rating->comment=$req->input('comment_area');
            $article_rating->save();

            return redirect()->route('article.index');
        }
    }
    public function show($article_id)
    {
        $article= DB::table('articles')
                    ->join('users','articles.user_id','=','users.user_id')
                    ->where('article_id',$article_id)
                    ->first();
        $article_rating=DB::table('article_ratings')
                    ->join('articles', 'articles.article_id', '=', 'article_ratings.article_id')
                    ->join('users','users.user_id','=','article_ratings.commenter_id')
                    ->where('article_ratings.article_id',$article_id)
                    ->get();
        return view('article.show')->with('article',$article)->with('comment',$article_rating);
    }
    public function showCommentStore(Request $req,$article_id)
    {//for commenting purpose
        $article_rating=new Article_rating();
            
        $article_rating->article_id=$req->input('article_id');
        $article_rating->commenter_id=$req->session()->get('user_id');
        $article_rating->comment=$req->input('comment_area');
        $article_rating->save();

        return redirect()->route('article.index');
    }
    public function myArticlesShow(Request $req)
    {
        $article=DB::table('articles')
                    ->join('tour_locations', 'tour_locations.tour_location_id', '=', 'articles.tour_location_id')
                    ->where('articles.user_id',$req->session()->get('user_id'))
                    ->get();

        return view('article.myArticlesShow')->with('article',$article);        
    }
    public function edit(Request $req,$article_id)
    {
        $article=DB::table('articles')
                    ->join('tour_locations', 'tour_locations.tour_location_id', '=', 'articles.tour_location_id')
                    ->where('articles.article_id',$article_id)
                    ->first();
        $tour_locations=DB::table('tour_locations')->get();
        return view('article.edit')->with('article',$article)
                                ->with('tour_locations',$tour_locations);
    }
    public function update(Request $req,$article_id)
    {
        $article = Article::find($article_id);
        $article->article           = $req->article;
        $article->tour_location_id  = $req->tour_location_id;
        $article->topic             = $req->topic;
        $article->type              = $req->type;

        $article->save();
        
        $articleShow=DB::table('articles')
                    ->join('tour_locations', 'tour_locations.tour_location_id', '=', 'articles.tour_location_id')
                    ->where('articles.user_id',$req->session()->get('user_id'))
                    ->get();
        return redirect()->route('article.myArticlesShow')->with('article',$articleShow);        
    }
    public function delete(Request $req,$article_id)
    {
        DB::table('articles')->where('article_id', $article_id)->delete();
        DB::table('article_accuracys')->where('article_id', $article_id)->delete();
        DB::table('article_external_links')->where('article_id', $article_id)->delete();
        DB::table('article_images')->where('article_id', $article_id)->delete();
        DB::table('article_likes')->where('article_id', $article_id)->delete();
        DB::table('article_ratings')->where('article_id', $article_id)->delete();
        DB::table('article_saves')->where('article_id', $article_id)->delete();
        DB::table('post_reports')->where('article_id', $article_id)->delete();

        $articleShow=DB::table('articles')
                    ->join('tour_locations', 'tour_locations.tour_location_id', '=', 'articles.tour_location_id')
                    ->where('articles.user_id',$req->session()->get('user_id'))
                    ->get();
        return redirect()->route('article.myArticlesShow')->with('article',$articleShow);             
    }
}
