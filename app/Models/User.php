<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{ 

  use HasFactory, Notifiable;
  protected $fillable = [
    'name', 'username', 'email', 'phone', 'password', 'verification_code', 
    'is_verified', 'wallet_balance', 'total_earned', 'total_withdrawn', 
    'current_plan_id', 'plan_expires_at', 'referrer_id', 'referral_count', 
    'referral_earnings', 'status', 'two_factor_secret', 'two_factor_recovery_codes',
    'email_verified_at', 'profile_image', 'dob', 'address', 'nid', 'task_cat'
];



  protected $hidden = [
      'password',
      'remember_token',
      'two_factor_secret',
      'two_factor_recovery_codes',
  ];

  protected $casts = [
      'email_verified_at' => 'datetime',
      'plan_expires_at' => 'datetime',
  ];

   
    public function roles()

    {
        return $this
            ->belongsToMany('App\\Models\Role')
            ->withTimestamps();
    }

    public function users()

    {
        return $this
            ->belongsToMany('App\Models\User')
            ->withTimestamps();
    }


    public function authorizeRoles($roles)

{
  if ($this->hasAnyRole($roles)) {
    return true;
  }
  abort(401, 'This action is unauthorized.');
}
public function hasAnyRole($roles)
{
  if (is_array($roles)) {
    foreach ($roles as $role) {
      if ($this->hasRole($role)) {
        return true;
      }
    }
  } else {
    if ($this->hasRole($roles)) {
      return true;
    }
  }
  return false;
}
public function hasRole($role)
{
  if ($this->roles()->where('name', $role)->first()) {
    return true;
  }
  return false;
}
// assing role to user
public function assignRole($role)
{
  // create a new role if not exists, or get the exits id
  $id = Role::firstOrCreate(['name' => $role],['description' => $role])->id;
   
  // add to user role if not exists , remove old role and add new role
  if(!$this->hasRole($role)){
    $this->roles()->detach();
    $this->roles()->attach($id);
  } 

}
//get current role 
public function getRole()
{
  //get role name
  if($this->roles()->first() == null) return 'user';

  return $this->roles()->first()->name; 

}
// is admin
public function isAdmin()
{
  return $this->hasRole('admin');
}
//custom fields for user, get with name & value, type=user and obj_id = user_id
public function custom_fields()
{
    return $this->hasMany(CustomFields::class, 'obj_id', 'id')->where('type', 'user');
}

public function tasks()
{
    return $this->hasMany(Tasks::class);
}


// set custom field
public function setCustomField($name, $value)
{
  update_field(
    $name,
    $value,
    'user',
    $this->id
  );
   
}
// get field by key
public function getCustomField($name)
{
  return get_field($name, 'user', $this->id);
}


    // A User can have many Subscriptions
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    // A User can have many referrals
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id');
    }

    // A User can have one active Plan (if any)
    public function currentPlan()
    {
        return $this->belongsTo(Subscription::class, 'user_id');
    }

    // A User can refer other users (referrer relationship)
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    /**
     * Additional Methods (if needed)
     */

    // Check if the user has an active plan
    public function hasActivePlan(): bool
    {
        return $this->current_plan_id && $this->plan_expires_at > now();
    }

    // Check if the user has a wallet balance greater than zero
    public function hasSufficientBalance(float $amount): bool
    {
        return $this->wallet_balance >= $amount;
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }




}
