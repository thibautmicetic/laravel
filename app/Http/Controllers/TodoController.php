<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function todo () {
        $todos = Todo::all();
        $count = $todos->count();
        return view('todo', ['todos' => $todos, 'count' => $count]);
    }

    public function todoAdd(Request $request) {
        Todo::create($request->all());
        return redirect("/todo");
    }

    public function updateTodo(int $id) {
        $todo = Todo::find($id);
        $todo->termine = true;
        $todo->save();
        return view('update-todo', ['todo' => $todo]);
    }

    public function deleteAllTodos() {
        Todo::query()->delete();
        return redirect("/todo");
    }

    public function deleteTodo(int $id) {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect("/todo");
    }
}
