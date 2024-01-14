<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\CreateContactRequest;
use App\Services\ContactService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct( public ContactService $contactService)
    {
        
    }

    public function store(CreateContactRequest $contactRequest) : JsonResponse
    {
        $contacts = $contactRequest->toArray();
        $contact = $this->contactService->createContact($contacts);
        return response()->json($contact);
    }
 

    public function index() :Collection
    {
        return $this->contactService->getAllContact();
    }
}
