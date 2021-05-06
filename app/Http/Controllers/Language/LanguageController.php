<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\App;
use App\Http\Requests\LanguageRequest;
class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Language::all();
        return view('dashboardAdmin/master', ['languages'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboardAdmin/addlanguage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
    
        Language::create($request->all());
       return redirect(app()->getLocale().'/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, Language $language)
    {

        App::setLocale($locale);
        session()->put('locale', $locale);
        return view('dashboardAdmin/editlanguage', ["language"=>$language]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($locale,LanguageRequest $request, $id)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);

        $language = Language::find($id);
        $language->update($request->all());
        $language->save();
        return redirect(app()->getLocale().'/dashboard')->with('succes','Update created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, $language)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);

        if(Language::destroy($language)) {
            return redirect(app()->getLocale().'/articles')->with('success', 'The article has been successfully deleted!');
          } else {
            return redirect(app()->getLocale().'/articles')->with('error', 'Please try again!');
          }
    }
}
