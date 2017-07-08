<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\BlogRepository as BlogRepo;
use App\Repositories\CategoryRepository as CategoryRepo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    protected $categories;
    protected $blogs;
    protected $data;

    public function __construct(BlogRepo $blogRepo, CategoryRepo $categoryRepo)
    {
        $this->blog = $blogRepo;
        $this->category = $categoryRepo;

        $this->data["allCategories"] = $categoryRepo->all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->data["result"] = $this->blog->findBy("slug", $request->slug);
        return view('frontend.blog.index', $this->data);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $this->data["blogs"] = $this->blog->findWhere(array(array(
            "name", "like", "%$search%"
        )));

        return view('frontend.blog.search', $this->data);
    }

}