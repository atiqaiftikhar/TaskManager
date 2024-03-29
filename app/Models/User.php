<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'role'
    ];
    public function projects()
{
    return $this->belongsToMany(Project::class,'project_users');
}

 public function notifications()
 {
     return $this->hasMany(Notification::class);
 }


 public function tasks()
 {
     return $this->hasMany(Task::class, 'assign_to');
 }
 public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
//  public function permissions()
//  {
//      return $this->belongsToMany(Permission::class);
//  }

public function permissions()
{
    return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
}





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
        'password' => 'hashed',
    ];
}
