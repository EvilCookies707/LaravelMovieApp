<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FavoriteUser;
use Illuminate\Support\Facades\Auth;
use DB;


class MovieCard extends Component
{
    
    public $movies;
    public $page;
    public $myMovieFavorite = false;
    public $favoriteBTN = true;
 
    public function mount($movies, $page){
        $this->movies = $movies;
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.movie-card');
    }

    public function addToFavorite($movieId){

        //make DB call to check if this movie is already favorited
        $this->myMovieFavorite = DB::table('favorite_users')->where('user_id',Auth::id())->pluck('movie_id')->toArray();
        
        //check if the movie id is found
        if (in_array($movieId, $this->myMovieFavorite)){
            //should have error message
        }
        else{
            //put movie id into the DB
            $this->data=[
                'user_id' => Auth::id(),
                'movie_id' => $movieId,
            ];
            FavoriteUser::create($this->data
            );
            $movieId = null;
        }
    }

    public function removeFromFavorite($movieId){
        //delete movie id from this user's favorites
        $this->myMovieFavorite = DB::table('favorite_users')->where('user_id',Auth::id())->where('movie_id', $movieId)->delete();
        //refresh the favorite view
        return redirect('/myFavorite');
    }
}
