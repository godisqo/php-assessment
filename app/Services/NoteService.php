<?php

namespace App\Services;

use App\Repositories\NoteRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class NoteService
{
    /**
     * @var $noteRepository
     */
    protected $noteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    /**
     * Get all note.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->noteRepository->getAll();
    }

    /**
     * Validate note data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function savePostData($data)
    {

        $result = $this->noteRepository->save($data);

        return $result;
    }

}
