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

    public function updateContact(Contact $contact, array $params): Contact
    {
        $contact->update($params);
        return $contact;
    }

    public function getContact(): Collection
    {
        return Contact::all();
    }

    public function getById(int $contactId): Contact
    {
        return Contact::where('id', $contactId)->first();
    }
}
