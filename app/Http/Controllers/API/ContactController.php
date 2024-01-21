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
            
            $typeOffertId = $contactRequest->input('type_offert_id');
            $typeEstateId = $contactRequest->input('type_estate_id');
            $preferencyContactRequest['preferencyContact']['type_offert_id'] = $typeOffertId;
            $preferencyContactRequest['preferencyContact']['type_estate_id'] = $typeEstateId;
            $preferencyContactId = $this->storePreferencyContact($preferencyContactRequest->toArray());

            $requestData = $contactRequest->validated();
            $requestData['contact']['preferency_contact_id'] = $preferencyContactId['id'];
            $requestData['contact']['user_id'] = $userId;

            $contacts = $contactRequest->toArray();
            $contact = $this->contactService->createContact($contacts);
            return response()->json($contact);
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
