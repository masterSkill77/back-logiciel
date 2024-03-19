<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\User;
use App\Models\PreferenceContacts;
use App\Http\Requests\Contact\CreateContactRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ContactService
{
    public function __construct()
    {
        // Constructor of the class
    }

    public function createContact(array $params): Contact
    {
        if(isset($params['contact']) && is_array($params['contact'])){
            $contact = (new Contact($params['contact']));
            $contact->save();
            return $contact;
        }
    }

    public function updateContact($data, $params): Contact
    {
        $contact = Contact::findOrFail($params);
        $contact->update($data);
        return $contact;
    }

    public function getAllContact(): Collection
    {
        return Contact::all();
    }

    public function getById(int $contactId): Contact
    {
        return Contact::where('id', $contactId)->first();
    }
}
