<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use App\Models\Language;
use Illuminate\Support\Facades\Lang;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(request()->ajax())
        // {
        //     $data = Article::all();
        //      return view('dashboardAdmin/datatable');
                    
        // }
        // return view('dashboardAdmin/datatable');

        $data = Article::paginate(3);
     
        return view('dashboardAdmin/viewlist',['members'=> $data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        return view('dashboardAdmin/additem');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( ArticleRequest $request)
    {
        $Article =new Article();
            $languages = Language::all();
            $title = [];
            $meta_description = [];
            $description = [];
            $key_words = [];
         
            foreach($languages as $language){
                $title["$language->slug"] = $request->get("title_$language->slug");
                $meta_description["$language->slug"] = $request->get("meta_description_$language->slug");
                $description["$language->slug"] = $request->get("description_$language->slug");
                $key_words["$language->slug"] = $request->get("key_words_$language->slug");

            }
        $Article->title = $title;
        $Article->meta_description = $meta_description;
        $Article->description = $description;
        $Article->key_words = $key_words;
        $Article->image = $request->image;
        $Article->slug = $request->slug;
        $Article->save();
        return redirect(app()->getLocale().'/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale, $article)
    { 
         App::setLocale($locale);
        session()->put('locale', $locale);
        $article = Article:: where("id", $article)->orWhere('slug', $article)->first();
        if(!$article) abort("404");
      return view('dashboardAdmin/individualview', ["member"=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale ,Article $article)
    {
       // dd($article);
        App::setLocale($locale);
        session()->put('locale', $locale);
        return view('dashboardAdmin/edit', ["article"=>$article]);
    
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($locale, ArticleRequest $request,Article $Article)
    {
     

        App::setLocale($locale);
        session()->put('locale', $locale);
        
   
       
        $languages = Language::all();
 
       
        foreach($languages as $language){
        
            $Article->setTranslation('title', $language->slug, $request->get("title_$language->slug"));
            $Article->setTranslation('meta_description', $language->slug, $request->get("meta_description_$language->slug"));
            $Article->setTranslation('description', $language->slug, $request->get("description_$language->slug"));
            $Article->setTranslation('key_words', $language->slug, $request->get("key_words_$language->slug"));
        }
    
    $Article->image = $request->image;
    $Article->slug = $request->slug;
    $Article->save();
    
        return  redirect(app()->getLocale().'/articles')->with('succes','Update created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $locale,$article)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);

        if(Article::destroy($article)) {
            return  redirect(app()->getLocale().'/articles')->with('success', 'The article has been successfully deleted!');
          } else {
            return  redirect(app()->getLocale().'/articles')->with('error', 'Please try again!');
          }
        
    }
    public function allPosts($locale ,Request $request)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        $articles = Article::all();
        $language = Language::all();
        //dd($language);
        $a = [];
        foreach($articles as $key => $article){
            $a[$key]["dt"] = $article ->created_at->format("d m Y");
            $a[$key]["image"]= $article->image;
            $a[$key]["id"]= $article->id;
            $a[$key]["title"] =  $article->getTranslation('title',app()->getLocale());
            $a[$key]["description"] =  Str::limit($article->description, 200);
            $a[$key]["action_edit"] = route('articles.edit', [app()->getLocale(),$article->id]);
            $a[$key]["action_delete"] = route('destroy', [app()->getLocale(),$article->id]);
            $a[$key]["curr_lang"] = $locale;
        }
        // dd($a);
        return ["data"=>$a];
        
    }

    public function showuser($locale)
    {
        // App::setLocale($locale);
        // session()->put('locale', $locale);
        $data = Article::paginate(10);
       return view('portfolio-5-columns', ['members'=> $data]);
    }
    public function viewuser($locale, $article)
    {   // dd($article);
        $article = Article:: where("id", $article)->orWhere('slug', $article)->first();
       if(!$article) abort("404");
    
      return view('project1', ["member"=>$article]);
      
    }

 
    
}
