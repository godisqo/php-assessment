<?php

namespace App\Http\Controllers\Api;


use App\Services\NoteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    /**
     * @var noteService
     */
    protected $noteService;


    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $notes = $this->noteService->getAll();
        return response()->json($notes, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $note = $this->noteService->savePostData($request->all());
        return response()->json($note, 201);
    }

}
