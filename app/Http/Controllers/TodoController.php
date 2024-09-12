<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function todo () {
        return view('todo', ['todos' => Todo::all()]);
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

    public function deleteTodo(int $id) {
        $todo = Todo::find($id);
        $todo->delete();
        return view('delete-todo', ['todo' => $todo]);
    }
}
