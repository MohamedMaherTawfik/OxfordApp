<?php


namespace App\Interfaces;


interface categoreyInterface
{
    public function getAllCategories();

    public function getCategoryById($id);

    public function createCategory($data);

    public function updateCategory($id, $data);

    public function deleteCategory($id);

    public function getCategoryBySlug($slug);
}
