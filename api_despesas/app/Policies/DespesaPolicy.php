<?php

namespace App\Policies;

use App\Models\Despesa;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DespesaPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Despesa $despesa): bool
    {
        if(!$user){
            return false;
        }
        return $user->id == $despesa->id_usuario;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if(!$user){
            return false;
        }
        
        //Para essa aplicação específica, todos os usuários poderão criar despesas
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Despesa $despesa): bool
    {
        if(!$user){
            return false;
        }
        return $user->id == $despesa->id_usuario;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, string $id): bool
    {
        if(!$user){
            return false;
        }
        return $user->id == $id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Despesa $despesa): bool
    {
        if(!$user){
            return false;
        }
        return $user->id == $despesa->id_usuario;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Despesa $despesa): bool
    {
        if(!$user){
            return false;
        }
        return $user->id == $despesa->id_usuario;
    }

    public function show(User $user, string $id): bool
    {
        if(!$user){
            return false;
        }
        return $user->id == $id;
    }
}
