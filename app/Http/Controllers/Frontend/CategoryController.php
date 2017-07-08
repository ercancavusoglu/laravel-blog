<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\CategoryRepository as CategoryRepo;
use App\Repositories\BlogRepository as BlogRepo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
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
        $this->data["result"] = $this->category->findBy("slug",$request->slug);

        return view('frontend.category.index', $this->data);
    }
}