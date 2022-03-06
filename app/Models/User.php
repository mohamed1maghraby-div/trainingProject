<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Mindscms\Entrust\Traits\EntrustUserWithPermissionsTrait;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, EntrustUserWithPermissionsTrait, SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $searchable =[
        'columns' => [
            'users.username' => 10,
            'users.email' => 10,
        ],
    ];
    
    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // friendship that this user started
	public function friendsOfThisUser()
	{
		return $this->belongsToMany(User::class, 'friends', 'user_id_sender', 'user_id_receiver')
                ->wherePivot('approved', 1)
                ->wherePivot('blocked', 0);
	}

	// friendship that this user was asked for
	public function thisUserFriendOf()
	{
		return $this->belongsToMany(User::class, 'friends', 'user_id_receiver', 'user_id_sender')
                ->wherePivot('approved', 1)
                ->wherePivot('blocked', 0);
	}

	// accessor allowing you call $user->friends
	public function getFriendsAttribute()
	{
		if ( ! array_key_exists('friends', $this->relations)) $this->loadFriends();
		return $this->getRelation('friends');
	}

	public function loadFriends()
	{
		if ( ! array_key_exists('friends', $this->relations))
		{
		$friends = $this->mergeFriends();
		$this->setRelation('friends', $friends);
	    }
	}

	public function mergeFriends()
	{
		if($temp = $this->friendsOfThisUser)
		return $temp->merge($this->thisUserFriendOf);
		else
		return $this->thisUserFriendOf;
	}

    public function addFriend(User $user){
        $this->friendsOfThisUser()->attach($user->id);
    }

    public function removeFriend(User $user){
        $this->friendsOfThisUser()->detach($user->id);
    }
}
