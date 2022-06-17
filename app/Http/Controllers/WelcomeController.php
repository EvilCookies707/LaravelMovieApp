<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WelcomeController extends Controller
{
    public $movies;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
     public function index()
    {
        //get list of popular movies to display
        $response = Http::acceptJson()->get('https://imdb-api.com/en/API/MostPopularMovies/k_nj7oaiq1');
        $this->movies = $response->json();

        //set page value and load view
        $page = 'home';
        return view('welcome', ['movies'=>$this->movies['items'], 'page'=>$page]);
    }
        
}
