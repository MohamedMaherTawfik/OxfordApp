<?php


namespace App\Repository;


use App\Interfaces\categoreyInterface;
use App\Models\Categories;

class Categoreyrepository implements categoreyInterface
{
    public function getAllCategories()
    {
        return Categories::all();
    }

    public function getCategoryById($id)
    {
        return Categories::findOrFail($id);
    }

    public function createCategory($data)
    {
        return Categories::create($data);
    }

    public function updateCategory($id, $data)
    {
        $category = Categories::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function deleteCategory($id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();
        return true;
    }

    public function getCategoryBySlug($slug)
    {
        return Categories::with('courses')->where('slug', $slug)->firstOrFail();
    }
}