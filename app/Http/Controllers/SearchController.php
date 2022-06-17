<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public $searchQuery;
    public $movies;
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
    
    public function index($name){
        //make api call and add moviedata to variable
        $this->searchQuery = $name;
        $response = Http::acceptJson()->get('https://imdb-api.com/en/API/SearchMovie/k_nj7oaiq1/'.$this->searchQuery);
        $this->movies = $response->json();

        //set page value and load view
        $page = 'search';
        return view('search', ['movies'=>$this->movies['results'], 'page'=>$page]);
    }
    
}
