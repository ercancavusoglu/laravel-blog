<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\CategoryRepository as CategoryRepo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryRepo $categoryRepo)
    {
        $this->category = $categoryRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data["categories"] = $this->category->paginate(10);
        return view('backend.category.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:categories|max:255'
        ]);

        $Result = $request->except(["path_info"]);
        $this->category->create($Result);

        flash('The category post was successfully save!', 'success');

        return redirect(url("backend/category"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data["result"] = $this->category->find($id);
        return view('backend.category.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data["result"] = $this->category->find($id);
        return view('backend.category.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|max:255',
        ]);

        $PagesUpdate = $request->except(["path_info"]);
        $Pages = $this->category->find($id);
        $Pages->update($PagesUpdate);
        flash('The category post was successfully update!', 'info');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->category->delete($id);
        if ($result) {
            flash('The category post was successfully delete!', 'danger');
        } else {
            flash('We can not delete because no corresponding record was found', 'info');
        }

        return back();
    }
}