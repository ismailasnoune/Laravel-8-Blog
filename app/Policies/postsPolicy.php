<?php

namespace App\Policies;

use App\Models\User;
use App\Models\posts;
use Illuminate\Auth\Access\HandlesAuthorization;

class postsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user,posts $posts)
    {

        
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, posts $posts)
    {
        dd($user);
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create()
    {

         $check=auth()->check()? true :false;
       // dd($check);
        return $check;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, posts $posts)
    {
        return $user->id == $posts->user_id||$user->is_admin? true : false;
        
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, posts $posts)
    {
        return $user->id == $posts->user_id||$user->is_admin? true : false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, posts $posts)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, posts $posts)
    {
        //
    }
}
