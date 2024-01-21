<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

class ContactService
{
    public function __construct()
    {
        // Constructor of the class
    }

    public function createContact(array $params): Contact
    {
        $contact = (new Contact($params));
        $contact->save();
        return $contact;
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
