<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\BlogRepository as BlogRepo;
use App\Repositories\CategoryRepository as CategoryRepo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    protected $blog;
    protected $category;

    public function __construct(BlogRepo $blogRepo, CategoryRepo $categoryRepo)
    {
        $this->blog = $blogRepo;
        $this->category = $categoryRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data["blogs"] = $this->blog->paginate(10);
        return view('backend.blog.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["categories"] = $this->category->pluck();
        return view('backend.blog.create', $this->data);
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
            'slug' => 'required|unique:blogs|max:255',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $Result = $request->except(["path_info"]);

        $this->blog->create($Result);
        flash('The blog post was successfully save!', 'success');

        return redirect(url("backend/blog"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data["result"] = $this->blog->find($id);
        return view('backend.blog.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data["categories"] = $this->category->pluck();
        $this->data["result"] = $this->blog->find($id);
        return view('backend.blog.edit', $this->data);
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
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $PagesUpdate = $request->except(["path_info"]);
        $Pages = $this->blog->find($id);
        $Pages->update($PagesUpdate);
        flash('The blog post was successfully update!', 'info');

        return redirect(url("backend/blog"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->blog->delete($id);
        if ($result) {
            flash('The blog post was successfully delete!', 'danger');
        } else {
            flash('We can not delete because no corresponding record was found', 'info');
        }

        return back();
    }
}