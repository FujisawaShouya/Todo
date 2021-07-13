<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index() {
        $items = todo::all();
        return view('index', ['items'=>$items]);
    }

    public function create(TodoRequest $request) {
        $model = new todo();
        $form = $request->all();
        unset($form['_token']);
        $model->fill($form)->save();

        return redirect('/');
    }

    public function update(TodoRequest $request) {
        $todo = todo::find($request->id);
        $form = $request->all();
        unset($form['_token_']);
        $todo->fill($form)->save();

        return redirect('/');
    }

    public function delete(TodoRequest $request) {
        todo::find($request->id)->delete();

        return redirect('/');
    }
}
