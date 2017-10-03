<?php

namespace App\Http\Controllers;

use App\{Category,Post};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Connection;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index',
            [
                'categories' => Category::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        $request->session()->flash('message', 'Category create successful!');
        $request->session()->flash('alert-type', 'success');

        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show',
            [
                'category' => $category
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',
            [
                'category' => $category
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return redirect(route('category.show', ['id' => $category->id]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {

        $connection = new Connection(DB::connection()->getPdo()); //???
        $connection->beginTransaction();
        try {
            Post::where('category_id', $category->id)->update(['category_id' => null]);
            $category->delete();

            $request->session()->flash('message', 'Category delete successful!');
            $request->session()->flash('alert-type', 'success');
            $connection->commit();
        } catch (\Exception $e) {
            $request->session()->flash('message', $e->getMessage());;
            $request->session()->flash('alert-type', 'danger');
            $connection->rollBack();
        }

        return redirect(route('main'));
    }
}
