<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\CreateContactRequest;
use App\Http\Requests\PreferencyContact\PreferencyContactRequest;
use App\Services\ContactService;
use App\Services\PreferencyContactService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ContactController extends Controller
{
    public function __construct(
        public ContactService $contactService,
        public PreferencyContactService $preferencyContactService)
    {
        
    }

    public function store(
        CreateContactRequest $contactRequest,
        PreferencyContactRequest $preferencyContactRequest)
    {
        try{            
            $userId = auth()->user();
            $preferencyContactId = $this->storePreferencyContact($preferencyContactRequest->toArray());
            $requestData = $contactRequest->validated();
            $requestData['contact']['preference_contacts_id_preference'] = $preferencyContactId['id'];
            $requestData['contact']['user_id'] = $userId->id;
            $requestData['contact']['agency_id'] = $userId->agency->id;
            
            $this->contactService->createContact($requestData);
         
            return response(['message' => 'un contact est créé avec succès'], Response::HTTP_CREATED);

        }catch (ValidationException $e) {
            return response(['message' => $e->validator->errors()], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            //roll back
            return response(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
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

    //PreferencyContact
    public function storePreferencyContact(array $requestData): array
    {
     
        $data = $this->preferencyContactService->store($requestData);
        $result = ['id' =>$data];

        return $result;
    }
}
