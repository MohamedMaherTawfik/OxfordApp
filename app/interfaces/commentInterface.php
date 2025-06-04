<?php

namespace App\Interfaces;

interface commentInterface
{
    public function getComments($id);
    public function getComment($id);
    public function storeComment(array $data,$id);
    public function updateComment(array $data,$id);
    public function deleteComment($id);
}
