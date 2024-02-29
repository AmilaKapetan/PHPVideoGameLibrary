<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<div class="container text-center mt-3">
    <style>
        .change {
            position: absolute;
            right: 18px;
        }
        </style>
    <div class="col">
        <a href="{{ route('showIndex') }}" class="text-decoration-none display-3 row"><strong>GAME<i>X</i></strong></a>
        <div class="row">
            <div class="mt-2">
                @can('admin', App\Models\Game::class)
                    EDIT GAMES AND CATEGORIES
                    </a>
                    <p class="">You are currently logged in as admin.</p>
                @else
                    <p id= "loggedInMessage">You are currently logged out and browsing as a guest.</p>
                @endcan
            </div>
            <div>
                <a href="{{ route('showAccount') }}" class="btn btn-outline-light" type="button">
                    ACCOUNT
                </a>
                <button class="btn btn-outline-light change" type="button"> 
                    Light
                </button>
                @can('admin', App\Models\Game::class)
                    <a href={{ route('admin.showGames') }} class="btn btn-outline-light" type="button">
                    EDIT GAMES AND CATEGORIES
                    </a>
                <a href="{{ route('showAccount') }}" class="btn btn-outline-light" type="button">
                    LANGUAGE
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>

<script>
    $( ".change" ).on("click", function() {
        if( $( "html" ).data("bs-theme") == "dark") {
            console.log("Change to light");
            $( "html" ).data("bs-theme", "light");

            // This is kinda dumb but I suppose it works.
            
            $("button, a.btn").addClass("btn-outline-dark");
            $('button, a.btn').removeClass('btn-outline-light');
            $('body').addClass('light-mode');
            $('h1, h2, hr, div.text-light, h1.text-white, p.text-white').removeClass('text-white');
            $('h1, h2, hr, div.text-light, h1.text-white, p.text-white').addClass('text-dark');


            $( ".change" ).text ( "Dark" );
        } else {
            $("html").data("bs-theme", "dark");
            $("button, a.btn").addClass("btn-outline-light");
            $('button, a.btn').removeClass('btn-outline-dark');
            $('body').removeClass('light-mode');
            $('h1, h2, hr, div.text-dark, h1.text-dark, p.text-dark').removeClass('text-dark');
            $('h1, h2, hr, div.text-dark, h1.text-dark, p.text-dark').addClass('text-white');
            $( ".change" ).text ( "Light" );
        }
    });
</script>