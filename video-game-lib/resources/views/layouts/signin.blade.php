<div class="d-flex align-items-center justify-content-center m-5">
    <h2 class="text-center text-white m-4">
        Log in to GAMEX
    </h2>
    <a class="btn btn-outline-light" id="backButton" href="{{ route('showIndex') }} ">
        Back
    </a>
</div>

<section>
    <div class="category_placement content_placement textstyle">
        <div class="search_placement login_box content_placement textstyle">
            <div class="logintext_placement1 textstyle">
                <p id= "enterInfo">
                    Please enter your Login Information here.
                </p>
            @if(auth()->check())
                <p>Logged in</p>
            @else
                <p id= "loggedOut1">Logged out</p>
            @endif

            <form method="post" id="signinForm">
                @csrf
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button id="signinSubmit">Login</button>
            </form>

            @if(auth()->check())
                <p>Logged in</p>
                <form method="post" action="/account/logout">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <p id= "loggedOut2">Logged out</p>
            @endif

            @if ($errors->has('login'))
                <div class="alert alert-danger">
                    {{ $errors->first('login') }}
                </div>
            @endif


            @if(auth()->check())
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ url('/account/change-password') }}">
                    @csrf
                    <input type="password" name="current_password" placeholder="Current Password" required>
                    <input type="password" name="password" placeholder="New Password" required>
                    <input type="password" name="password_confirmation" placeholder="Confirm New Password" required>
                    <button type="submit">Change Password</button>
                </form>
            @endif

        </div>
    </div>
</section>

<script> 

    $( "#signinSubmit" ).click(function (e) {
        e.preventDefault();
        var data=$( "#signinForm" ).get(0);

        $.ajax({
            type: "POST", 
            url: "/account/login",
            headers: { 'X-CSRF-Token': '{!! csrf_token() !!}' }, 
            processData: false, 
            contentType: false,
            enctype: 'multipart/form-data',
            data: new FormData(data),
            success: function (response){
                //console.log(response);
                var parsedResponse= $.parseHTML(response);
                  //var error= parsedResponse.find( ".alert" );
                  var error= $(parsedResponse).find( ".alert" );
                  console.log(parsedResponse);
                  if(error.length>0){
                    alert ( "Wrong Username or Password" );
                  }
                  else {
                    alert ( "Logged In" );
                    $( "#signinForm" ).hide();
                    $( "#enterInfo" ).hide();
                    $( "#loggedOut1" ).text( "Logged In" );
                    $( "#loggedOut2" ).hide();
                  }
            },

            error: function (xhr, status, error){
                console.error(xhr.responseText);
            }
        });
    });

</script>

