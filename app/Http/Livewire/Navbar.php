<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Navbar extends Component
{
    public $search = '';
    public $searchQuery;
    public $movies;

    public function render()
    {
        return view('livewire.navbar');
    }

    public function movieSearch(){
        $this->searchQuery = $this->search;
        $this->search = '';
        return redirect('/search/'.$this->searchQuery);
    }

    public function movieRandom(){
        //get list of movies to select from
        $response = Http::acceptJson()->get('https://imdb-api.com/en/API/Top250Movies/k_nj7oaiq1');
        $response = $response->json();

        //select random movie title and call the search function
        $random = rand(0, 249);
        $this->searchQuery = $response['items'][$random]['title'];
        return redirect('/search/'.$this->searchQuery);
    }
}
