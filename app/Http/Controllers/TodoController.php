<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(): JsonResponse
    {
        $todos = Todo::all();
        return response()->json($todos);
    }

    public function store(Request $request): JsonResponse
    {
        $todo = Todo::create($request->all());
        return response()->json($todo, 201);
    }

    public function show($id): JsonResponse
    {
        $todo = Todo::find($id);
        if (is_null($todo)) {
            return response()->json(['message' => 'Todo not found'], 404);
        }
        return response()->json($todo);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $todo = Todo::find($id);
        if (is_null($todo)) {
            return response()->json(['message' => 'Todo not found'], 404);
        }
        $todo->update($request->all());
        return response()->json($todo);
    }

    public function destroy($id): JsonResponse
    {
        $todo = Todo::find($id);
        if (is_null($todo)) {
            return response()->json(['message' => 'Todo not found'], 404);
        }
        $todo->delete();
        return response()->json(null, 204);
    }
}