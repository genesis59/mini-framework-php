<?php

interface IDAO {

    public function findAll(string $orderBy = ""): array;
    public function findOneById(int $id): UserModel;
    public function deleteOneById(int $id): bool;
    public function save(UserModel $user): void;
    
}