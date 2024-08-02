<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Traits\ResponseTrait;
use App\Helpers\ExceptionHandlerHelper;

class BlogController extends Controller
{
    use ResponseTrait;
    public function index()
    {
        return ExceptionHandlerHelper::tryCatch(function(){
            $data=Blog::with('contents','faqs')->get();
            foreach ($data as $blog) {
                if ($blog->banner_image) {
                    $blog->banner_image_url = asset($blog->banner_image);
                }

                foreach ($blog->contents as $content) {
                    if ($content->image) {
                        $content->image_url = asset($content->image);
                    }
                }
            }


            return $this->sendResponse($data,'All Blogs');
        });
    }
    public function show($id)
    {
        return ExceptionHandlerHelper::tryCatch(function()use($id){
            $data=Blog::with('contents','faqs')->where('slug',$id)->first();
            if ($data->banner_image) {
                $data->banner_image_url = asset($data->banner_image);
            }

            // Modify the contents to include asset URLs for content images
            foreach ($data->contents as $content) {
                if ($content->image) {
                    $content->image_url = asset($content->image);
                }
            }

            return $this->sendResponse($data,'Blog Details');
        });
    }
}
