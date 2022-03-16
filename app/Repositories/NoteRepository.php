<?php

namespace App\Repositories;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteRepository
{


    /**
     * @var Note
     */
    protected $Note;

    public function __construct(Note $note)
    {
        $this->note = $note;
    }

    /**
     * Get all notes.
     *
     * @return Note $note
     */
    public function getAll()
    {
        return $this->note
            ->get();
    }

    /**
     * Save Note
     *
     * @param $data
     * @return Note
     */
    public function save($data)
    {
        $note = new $this->note;

        $note->title = $data['title'];
        $note->note = $data['note'];
        $note->user_id = Auth::id();

        $note->save();

        return $note->fresh();
    }

}
