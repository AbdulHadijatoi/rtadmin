<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\User\ContactRequest;
use App\Helpers\ExceptionHandlerHelper;
use App\Models\Contact;

class ContactController extends Controller
{
    private $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    public function contact_us(ContactRequest $request)
    {
        return ExceptionHandlerHelper::tryCatch(function () use($request) {
            $data = $request->validated();
            $contact = $this->model::create([
                'first_name' => $data['first_name'],
                'email'      => $data['email'],
                'company_name'  => $data['company_name'],
                'mobile'     => $data['mobile'],
                'inquiry_topic' => $data['inquiry_topic'],
                'message'    => $data['message']
            ]);
            return $this->sendResponse($contact, 'Contact Added');
        });
    }
}