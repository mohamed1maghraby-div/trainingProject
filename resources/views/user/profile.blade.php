@extends('layouts.app')

@section('content')
<div class="uploadCancelSubmitShow">
    <div class="uploadCancelSubmit">
        <div class="uploadInfo">
            <i></i>
            <p>Your cover photo is public.</p>
        </div>
        <div class="uploadButtons">
            <a href="#" onclick="uploadCancel(event)">Cancel</a>
            <a href="{{ route('user.store.background') }}" onclick="event.preventDefault(); document.getElementById('submitUploadBgCover').submit();">Save changes</a>
        </div>
    </div>
</div>

<div class="photoUploadCancelSubmitShow">
    <div class="uploadCancelSubmit">
        <div class="uploadInfo">
            <i></i>
            <p>Your photo is public.</p>
        </div>
        <div class="uploadButtons">
            <a href="#" onclick="photoUploadCancel(event)">Cancel</a>
            <a href="{{ route('user.store.background') }}" onclick="event.preventDefault(); document.getElementById('photoSubmitUploadBgCover').submit();">Save changes</a>
        </div>
    </div>
</div>

<div class="profilePageTop">
    <div class="coverPage">
        {{-- <img src="" alt=""> --}}
        <div class="defaultCoverBackgourd"></div>
        <div class="addCoverPhoto">
            <i></i>{{ $medo = auth()->user()->cover_image ? 'Edit' : 'Add' }} Cover Photo
            {!! Form::open(['route' => 'user.store.background', 'method' => 'post', 'id' => 'submitUploadBgCover', 'files' => true]) !!}
                {!! Form::file('cover_image', ['id' => 'file-upload', 'accept' => 'image/*', 'onchange' => 'showPreview(event);']) !!}
            {!! Form::close() !!}
        </div>
        @if (auth()->user()->cover_image )
            <img src="{{ asset('userDashboard/assets/users/covers/' . auth()->user()->cover_image) }}" alt="cover Image">
        @endif
        <div class="preview">
            <img id="bg-preview">
        </div>
    </div>
    <div class="headerProfilePage">
        <div class="headerLeftSection">
            <div class="pesonalImage">
                <img id="photo-preview" style="position: absolute;">
                @if (auth()->user()->user_image )
                    <img src="{{ asset('userDashboard/assets/users/photos/' . auth()->user()->user_image) }}" alt="photo Image">
                @else
                    <img src="{{ asset('userDashboard/images/profilePerson.png') }}" alt="Profile Person">
                @endif
                <div class="camerIconBackground">
                    <i class="camerIcon"></i>
                    {!! Form::open(['route' => 'user.store.background', 'method' => 'post', 'id' => 'photoSubmitUploadBgCover', 'files' => true]) !!}
                    {!! Form::file('user_image', ['id' => 'file-upload', 'accept' => 'image/*', 'onchange' => 'showPrsonalPhoto(event);']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="mainInfo">
                <h2>{{ auth()->user()->username }}</h2>
                <p>{{ $allFriends->count() }} Friend{{ $allFriends->count() > 1? 's' : '' }}</p>
                <div class="frendsImages">
                    @forelse ($allFriends as $allFriend)
                        @if ($allFriend->user_image != '')
                            <a href="{{ route('user.search', $allFriend->username) }}">
                                <img src="{{ asset('userDashboard/assets/users/photos/' . $allFriend->user_image) }}" width="32" height="32" alt="Frends Image">
                            </a>
                        @else
                            <a href="{{ route('user.search', $allFriend->username) }}">
                                <img src="{{ asset('userDashboard/images/defaultPerson.png') }}" height="32" width="32" alt="Person Image">
                            </a>
                        @endif
                    @empty
                    zero
                    @endforelse
                </div>
            </div>
        </div>
        <div class="headerRightSection">
            <a class="headerRightSectionAdd" href="#">
                <img src="{{ asset('userDashboard/images/addIcon.png') }}" alt="add icon">
                <span>Add to story</span>
            </a>
                <a class="headerRightSectionEdit" href="#">
                    <img src="{{ asset('userDashboard/images/eidtIcon.png') }}" alt="edit icon">
                    <span>Edit profile</span>
                </a>
        </div>
    </div>
    <hr>
    <div class="profileNav">
        <div class="profileNavLeft">
            <a href="#">Posts</a>
            <a href="#">About</a>
            <a href="#">Friends</a>
            <a href="#">Phote</a>
            <a href="#">Vidoes</a>
            <a href="#">Check-ins</a>
            <a href="#">More</a>
        </div>
        <div class="profileNavRight"><span>...</span></div>
    </div>
</div>
<div class="profilePageBotton">
    <div class="profileBody">
        <div class="profileBodyLeft">
            <div class="profileBodyLeftIntro">
                <h5>Intro</h5>
                <a href="#">Add Bio</a>
                <a href="#">Edit details</a>
                <a href="#">Add Hobbies</a>
                <a href="#">Add Featured</a>
            </div>
            <div class="profileBodyLeftPhotos">
                <div class="info">
                    <h5>Photos</h5>
                    <a href="#">See all photos</a>
                </div>
                <img src="{{ asset('userDashboard/images/photosSidebar.jpg') }}" width="106" height="106" alt="photo sidebar">
            </div>
            <div class="profileBodyLeftFriends">
                <div class="info">
                    <h5>Friends</h5>
                    <a href="#">See all friends</a>
                </div>
                <p>{{ $allFriends->count() }} Friend{{ $allFriends->count() > 1? 's' : '' }}</p>
                @forelse ($allFriends as $allFriend)
                    <div class="friendPreson">
                        @if ($allFriend->user_image != '')
                            <a href="{{ route('user.search', $allFriend->username) }}">
                                <img src="{{ asset('userDashboard/assets/users/photos/' . $allFriend->user_image) }}" width="100" height="100" alt="all frends">
                            </a>
                        @else
                            <a href="{{ route('user.search', $allFriend->username) }}">
                                <img src="{{ asset('userDashboard/images/defaultPerson.png') }}" height="100" width="100" alt="all frends">
                            </a>
                        @endif
                            <span>{{ $allFriend->username }}</span>
                    </div>
                @empty
                <p>You not have any friends</p>
                @endforelse
            </div>
        </div>
        <div class="profileBodyRight">
            <div class="whatOnYourMind">
                <div class="header">
                    <img src="{{ asset('userDashboard/images/defaultPerson.png') }}" height="40" width="40" alt="Person Image">
                    <a href="#">{{ __("What's on your mind? :username", ['username' => auth()->user()->username]) }}</a>
                </div>
                <div class="footer">
                    <a href="#">
                        <svg style="fill: #f3425f;" viewBox="0 0 24 24" width="1em" height="1em" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4 i2fa72qc rgmg9uty b73ngqbp"><g fill-rule="evenodd" transform="translate(-444 -156)"><g><path d="M113.029 2.514c-.363-.088-.746.014-1.048.234l-2.57 1.88a.999.999 0 0 0-.411.807v8.13a1 1 0 0 0 .41.808l2.602 1.901c.219.16.477.242.737.242.253 0 .508-.077.732-.235.34-.239.519-.65.519-1.065V3.735a1.25 1.25 0 0 0-.971-1.22m-20.15 6.563c.1-.146 2.475-3.578 5.87-3.578 3.396 0 5.771 3.432 5.87 3.578a.749.749 0 0 1 0 .844c-.099.146-2.474 3.578-5.87 3.578-3.395 0-5.77-3.432-5.87-3.578a.749.749 0 0 1 0-.844zM103.75 19a3.754 3.754 0 0 0 3.75-3.75V3.75A3.754 3.754 0 0 0 103.75 0h-10A3.754 3.754 0 0 0 90 3.75v11.5A3.754 3.754 0 0 0 93.75 19h10z" transform="translate(354 158.5)"></path><path d="M98.75 12c1.379 0 2.5-1.121 2.5-2.5S100.129 7 98.75 7a2.503 2.503 0 0 0-2.5 2.5c0 1.379 1.121 2.5 2.5 2.5" transform="translate(354 158.5)"></path></g></g></svg>
                        <span>Live video</span>
                    </a>
                    <a href="#">
                        <svg style="fill: #45bd62;" viewBox="0 0 24 24" width="1em" height="1em" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4 n90h9ftp rgmg9uty b73ngqbp"><g fill-rule="evenodd" transform="translate(-444 -156)"><g><path d="m96.968 22.425-.648.057a2.692 2.692 0 0 1-1.978-.625 2.69 2.69 0 0 1-.96-1.84L92.01 4.32a2.702 2.702 0 0 1 .79-2.156c.47-.472 1.111-.731 1.774-.79l2.58-.225a.498.498 0 0 1 .507.675 4.189 4.189 0 0 0-.251 1.11L96.017 18.85a4.206 4.206 0 0 0 .977 3.091s.459.364-.026.485m8.524-16.327a1.75 1.75 0 1 1-3.485.305 1.75 1.75 0 0 1 3.485-.305m5.85 3.011a.797.797 0 0 0-1.129-.093l-3.733 3.195a.545.545 0 0 0-.062.765l.837.993a.75.75 0 1 1-1.147.966l-2.502-2.981a.797.797 0 0 0-1.096-.12L99 14.5l-.5 4.25c-.06.674.326 2.19 1 2.25l11.916 1.166c.325.026 1-.039 1.25-.25.252-.21.89-.842.917-1.166l.833-8.084-3.073-3.557z" transform="translate(352 156.5)"></path><path fill-rule="nonzero" d="m111.61 22.963-11.604-1.015a2.77 2.77 0 0 1-2.512-2.995L98.88 3.09A2.77 2.77 0 0 1 101.876.58l11.603 1.015a2.77 2.77 0 0 1 2.513 2.994l-1.388 15.862a2.77 2.77 0 0 1-2.994 2.513zm.13-1.494.082.004a1.27 1.27 0 0 0 1.287-1.154l1.388-15.862a1.27 1.27 0 0 0-1.148-1.37l-11.604-1.014a1.27 1.27 0 0 0-1.37 1.15l-1.387 15.86a1.27 1.27 0 0 0 1.149 1.37l11.603 1.016z" transform="translate(352 156.5)"></path></g></g></svg>
                        <span>Photo/video</span>
                    </a>
                    <a href="#">
                        <i data-visualcompletion="css-img" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/ys/r/_Z2A1Jyh9dg.png&quot;); background-position: -25px -208px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
                        <span>Life event</span>
                    </a>
                </div>
            </div>
    
        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
