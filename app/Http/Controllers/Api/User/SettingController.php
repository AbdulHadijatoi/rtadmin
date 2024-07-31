<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\Homeimage;
use Illuminate\Http\Request;
use App\Helpers\ExceptionHandlerHelper;
use App\Traits\ResponseTrait;
use App\Models\SettingContactUs;
use App\Models\SettingFindUs;
use App\Models\SettingGuideline;
use App\Models\SettingTermsCondition;
use App\Models\SettingPrivacyPolicy;
use App\Models\SettingBlog;

class SettingController extends Controller
{
    use ResponseTrait;
    public function contactUs()
    {
        return ExceptionHandlerHelper::tryCatch(function(){
            $data=SettingContactUs::all();
            return $this->sendResponse($data,'Contact-us details');
        });

    }
    public function findUs()
    {
        return ExceptionHandlerHelper::tryCatch(function(){
            $data=SettingFindUs::all();
            return $this->sendResponse($data,'Find-us details');
        });

    }

    public function homeImage()
    {
        return ExceptionHandlerHelper::tryCatch(function(){
            $data=Homeimage::all();
            return $this->sendResponse($data,'Find-us details');
        });

    }

    public function aboutImage()
    {
        return ExceptionHandlerHelper::tryCatch(function(){
            $data=Aboutus::all();
            return $this->sendResponse($data,'Find-us details');
        });

    }
    public function guidelinesImage()
    {
        return ExceptionHandlerHelper::tryCatch(function(){
            $data=SettingGuideline::all();
            return $this->sendResponse($data,'Guideline Image');
        });

    }
    public function termsConditionsImage()
    {
        return ExceptionHandlerHelper::tryCatch(function(){
            $data=SettingTermsCondition::all();
            return $this->sendResponse($data,'Terms & Conditions Image');
        });

    }
    public function privacyPolicyImage()
    {
        return ExceptionHandlerHelper::tryCatch(function(){
            $data=SettingPrivacyPolicy::all();
            return $this->sendResponse($data,'Privacy Policy Image');
        });

    }

    public function blogImage()
    {
        return ExceptionHandlerHelper::tryCatch(function(){
            $data=SettingBlog::all();
            return $this->sendResponse($data,'Blog Page Image');
        });

    }
}