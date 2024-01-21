<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\CreateContactRequest;
use App\Services\ContactService;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ContactController extends Controller
{
    public function __construct( public ContactService $contactService)
    {
        
    }

    public function store(CreateContactRequest $contactRequest) : JsonResponse
    {
        try{
            $contacts = $contactRequest->toArray();
            $contact = $this->contactService->createContact($contacts);
            return response()->json($contact);
        }
        catch(Exception)
        {

        }
      
    }

    public function update(Request $request, $contactId) :JsonResponse
    {
        $data = $request->all();
        $contact = $this->contactService->updateContact($data, $contactId);
        if($contact)
        {
            return response()->json($contact, 200);
        }else{
            throw new NotFoundHttpException("Erreur de la modification");
        }
    }
 

    public function index() :Collection
    {
        return $this->contactService->getAllContact();
    }
}
