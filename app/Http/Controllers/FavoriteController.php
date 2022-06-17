<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class FavoriteController extends Controller
{
    public $myMovieFavorites;
    public $myMovieArray = [];

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
    
    
    public function favorite()
    {   
        //get this users favorite movie id's
        $this->myMovieFavorites = DB::table('favorite_users')->where('user_id',Auth::id())->get('movie_id');

        //make api call for each movie and put into array
        foreach ($this->myMovieFavorites as $movie) {
            $response = Http::acceptJson()->get('http://www.omdbapi.com/?apikey=854a6ca5&i='.$movie->movie_id);
            $response = $response->json();
            array_push($this->myMovieArray, $response);
        };

        //set page value and load view
        $page = 'favorite';
        return view('favorite', ['movies'=>$this->myMovieArray, 'page'=>$page]);
    }
    
}
