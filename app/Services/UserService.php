<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    /**
     * Get all users
     */
    public function getAllUsers(): Collection
    {
        return User::all();
    }

    /**
     * Create a new user
     */
    public function createUser(array $data): User
    {
        return User::create($data);
    }

    /**
     * Find user by id
     */
    public function findUser(int $id): ?User
    {
        return User::find($id);
    }

    /**
     * Delete user
     */
    public function deleteUser(int $id): bool
    {
        $user = $this->findUser($id);

        if (!$user) {
            return false;
        }

        return $user->delete();
    }

    /**
     * Check if user exists with email
     */
    public function userExistsByEmail(string $email): bool
    {
        return User::where('email', $email)->exists();
    }

    /**
     * Check if user exists
     */
    public function userExists(int $id): bool
    {
        return User::where('id', $id)->exists();
    }
}
