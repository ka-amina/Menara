<?php

namespace App\Interfaces;

interface UserInterface
{
    public function create($data);
    public function findUserByEmail($email);
    public function updatePassword($user,$password);
    public function createOrUpdateToken($email,$token);
    public function getTokenByEmail($email);
    public function deleteTokenByEmail($email);
}
