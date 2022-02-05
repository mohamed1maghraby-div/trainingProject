@extends('layouts.app')
@section('content')

<div class="searchPage">
    <div class="sliderFilter">
        <h5>Search results</h5>
        <hr>
        <p>Filters</p>
        <a href="#">
            <div>
                <i data-visualcompletion="css-img" class="hu5pjgll eb18blue" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yu/r/TTR0dJzWbP6.png&quot;); background-position: 0px -132px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
            </div>
            <span>All</span>
        </a>
        <a href="#">
            <div>
                <i data-visualcompletion="css-img" class="hu5pjgll lzf7d6o1" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yJ/r/tkixFwJBa6n.png&quot;); background-position: 0px -780px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
            </div>
            <span>Posts</span>
        </a>
        <a href="#" class="active">
            <div>
                <i data-visualcompletion="css-img" class="hu5pjgll lzf7d6o1" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/y4/r/xl3FkXKjCsc.png&quot;); background-position: 0px -331px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
            </div>
            <span>Peopl</span>e
        </a>
        <a href="#">
            <div>
                <i data-visualcompletion="css-img" class="hu5pjgll lzf7d6o1" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yy/r/1dwAMk5maM6.png&quot;); background-position: 0px -330px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
            </div>
            <span>Photo</span>s
        </a>
        <a href="#">
            <div>
                <i data-visualcompletion="css-img" class="hu5pjgll lzf7d6o1" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/y4/r/xl3FkXKjCsc.png&quot;); background-position: 0px -541px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
            </div>
            <span>Video</span>s
        </a>
        <a href="#">
            <div>
                <i data-visualcompletion="css-img" class="hu5pjgll lzf7d6o1" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yJ/r/tkixFwJBa6n.png&quot;); background-position: 0px -675px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
            </div>
            <span>Marke</span>tplace
        </a>
        <a href="#">
            <div>
                <i data-visualcompletion="css-img" class="hu5pjgll lzf7d6o1" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yJ/r/tkixFwJBa6n.png&quot;); background-position: 0px -213px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
            </div>
            <span>Pages</span>
        </a>
        <a href="#">
            <div>
                <i data-visualcompletion="css-img" class="hu5pjgll lzf7d6o1" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yJ/r/tkixFwJBa6n.png&quot;); background-position: 0px -738px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
            </div>
            <span>Place</span>s
        </a>
        <a href="#">
            <div>
                <i data-visualcompletion="css-img" class="hu5pjgll lzf7d6o1" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yJ/r/tkixFwJBa6n.png&quot;); background-position: 0px -549px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
            </div>
            <span>Group</span>s
        </a>
        <a href="#">
            <div>
                <i data-visualcompletion="css-img" class="hu5pjgll lzf7d6o1" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/y4/r/xl3FkXKjCsc.png&quot;); background-position: 0px -163px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
            </div>
            <span>Event</span>s
        </a>
    </div>
    <div class="bodysearchResult">
        <div class="bodysearchWraper">
            <h5>People</h5>
        @forelse ($users as $user)
            <div class="persronInSearch">
                <div class="persronInSearchLeft">
                    <img src="{{ asset('userDashboard/images/personInSearch.jpg') }}" alt="person in search">
                    <div>
                        <a href="{{ route('user.search', $user->username) }}">{{ $user->username }}</a>
                        <p>Friend</p>
                    </div>
                </div>
                <div class="persronInSearchRight">
                    <a href="#">
                        <i data-visualcompletion="css-img" class="hu5pjgll lzf7d6o1" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yd/r/bYZNRUD4S34.png&quot;); background-position: 0px -258px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
                    </a>
                </div>
            </div>
            
        @empty
            
        @endforelse
        <hr>
        <div class="persronInSearch">
            <div class="persronInSearchLeft">
                <img src="{{ asset('userDashboard/images/personInSearch.jpg') }}" alt="person in search">
                <div>
                    <a href="#">Mohamed Medo</a>
                    <p>Friend</p>
                </div>
            </div>
            <div class="persronInSearchRight">
                <a href="#">
                    <i data-visualcompletion="css-img" class="hu5pjgll lzf7d6o1" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/y4/r/xl3FkXKjCsc.png&quot;); background-position: 0px -268px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
                </a>
            </div>
        </div>
        </div>
        
    </div>
</div>

@endsection
