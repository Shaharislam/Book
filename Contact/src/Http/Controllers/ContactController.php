<?php

namespace Book\Contact\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\File;
use Book\Contact\Repositories\ContactRepository as Contact;

class ContactController extends Controller
{

    protected $_config;
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact              = $contact;
        $this->_config              = request('_config');
    }


    public function index()
    {
        $contact        = $this->contact->all();
        return view($this->_config['view'], compact('contact'));
    }


}
