<div class="main-row">
    @foreach ($movies as $movie)
        <div class="movie">
            @if($page != 'favorite')
                <div class="movie-img" style="background-image: url({{$movie["image"]}});"></div>
            @else
                <div class="movie-img" style="background-image: url({{$movie["Poster"]}});"></div>
            @endif
            <div class="text-movie-cont">
                <div class="mr-grid">
                    <div class="col1">
                        @if($page != 'favorite')
                            <h1>{{$movie["title"]}}</h1>
                        @else
                            <h1>{{$movie["Title"]}}</h1>
                        @endif
                    </div>
                </div>
                <div class="mr-grid summary-row">
                    <div class="col2">
                        @if($page != 'search')
                            <h5>CREW</h5>
                        @else
                            <h5>DESCRIPTION</h5>
                        @endif
                    </div>
                </div>
                <div class="mr-grid">
                    <div class="col1">
                    <p class="movie-description">
                        @if($page == 'home')
                            {{$movie["crew"]}}
                        @elseif($page == 'search')
                            {{$movie['description']}}
                        @else
                            {{$movie["Actors"]}}
                        @endif
                    </p>
                    </div>
                </div>
                @auth
                    <div class="mr-grid action-row">
                        <div class="col2">
                            @if($page == 'home' || $page == 'search')
                                <button class="action-btn" wire:click="addToFavorite('{{$movie['id']}}')">
                                    <h3>ADD TO FAVORITE</h3>
                                </button>
                            @else
                                <button class="action-btn" wire:click="removeFromFavorite('{{$movie['imdbID']}}')">
                                    <h3>REMOVE FROM FAVORITE</h3>
                                </button>
                            @endif
                        </div>
                    </div>
                @endauth
            </div>

        </div>
    @endforeach
</div>