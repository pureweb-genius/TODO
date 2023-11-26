<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Services\TodoService;

class TodoController extends Controller
{
    protected TodoService $todoService;

    public function __construct(TodoService $todoService)
    {
         $this->todoService = $todoService;
    }

    public function index()
    {
         return Todo::where('user_id', auth()->user()->id)->paginate(10);
    }

    public function store(TodoRequest $request)
    {
        return $this->todoService->store($request->validated());
    }


    public function update(TodoRequest $request, $id)
    {
        return $this->todoService->update($request->validated(), $id);
    }

    public function delete($id)
    {
        return $this->todoService->delete($id);
    }
}
