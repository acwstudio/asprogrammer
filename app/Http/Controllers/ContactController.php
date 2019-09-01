<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;


/**
 * Class ContactController
 *
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{
    /**
     * @param ContactFormRequest $formRequest
     * @return array|null|string
     */
    public function send(ContactFormRequest $formRequest)
    {
        $contact = [];
        $contact['name'] = $formRequest->name;
        $contact['email'] = $formRequest->email;
        $contact['message'] = $formRequest->message;

        Mail::to("receiver@example.com")->send(new ContactMail($contact));

        return __('panels.forms.success');
    }
}
