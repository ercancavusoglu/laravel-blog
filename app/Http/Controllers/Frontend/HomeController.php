<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\BlogRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $categories;
    protected $blogs;
    protected $data;


    public function __construct(CategoryRepository $categories, BlogRepository $blogs)
    {
        $this->categories = $categories;
        $this->blogs = $blogs;

        $this->data["allCategories"] = $categories->all();
    }

    /**
     * Show the homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data["blogs"] = $this->blogs->paginate(5);
        return view('frontend.home.index',$this->data);
    }
}
