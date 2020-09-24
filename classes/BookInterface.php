<?php

interface BookInterface {

    public function findAll(string $orderBy = ""): array;
    public function findOneById(int $id): BookModel;
    public function deleteOneById(int $id): bool;
    public function save(BookModel $book): void;
    
}