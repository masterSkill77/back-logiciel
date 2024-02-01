<?php

namespace App\Services;

use App\Models\Commentaire;
use App\Models\Pige;

class CommentaireService
{
    public function __construct()
    {
        // Constructor of the class
    }

    public function createCommentaire(int $userId, int $pigeId, string $title, string $comments)
    {
        $comment = new  Commentaire(
            [
                'pige_id' => $pigeId,
                'title' => $title,
                'comment' => $comments,
                'user_id' => $userId
            ]
        );
        $comment->save();
        return $comment;
    }
}
