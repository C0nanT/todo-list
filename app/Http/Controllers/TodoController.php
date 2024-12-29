<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{

    public function index(): JsonResponse
    {
        try {
            $todos = Todo::all();

            Log::info('Todos fetched successfully');
            return response()->json([
                'status' => 'success',
                'todos'=> $todos
            ], 200);
            
        } catch (\Exception $e) {
            Log::error('Error fetching todos: ' . $e->getMessage());

            return response()->json([
                'message' => 'Failed to fetch tasks.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'string',
            'category' => 'string',
            'responsible_id' => 'required|integer|exists:users,id'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }
    
        try {
            $author = auth()->user();
            $data = $request->all();
            $data['author_id'] = $author->id;
    
            $todo = Todo::create($data);
            $todo['status'] = 'success';

            Log::info('Todo created successfully: ' . $todo->id);
            return response()->json($todo, 201);
        } catch (\Exception $e) {
            Log::error('Error creating todo: ' . $e->getMessage());
        
            return response()->json([
            'message' => 'Failed to create the task.',
            'error' => $e->getMessage()
            ], 500);
        }
    }
}