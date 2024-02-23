<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contact extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_contact';
    protected $fillable = ['contact_type', 'target', 'civility', 'firstname', 'lastname',
                            'legal_form', 'company_name', 'siret', 'phone', 'home_phone',
                            'mail', 'country', 'city', 'zip', 'adress', 'negociator',
                            'contact_source', 'note', 'space_perso_activate', 'space_proprio_activate',
                            'man_info', 'woman_info', 'user_id', 'preference_contacts_id_preference',
                            'man_info_compl', 'woman_info_compl'];
    
    protected $casts = [
        "man_info" => "json",
        "woman_info" => "json"
    ];

    public function scopeContact(Builder $query , Contact $contact): Builder
    {
        return $query->where('id_contact', $contact->id_contact);
    }


    public function user() :HasOne
    {
        return $this->hasOne(User::class);
    }

    public function preferency() : HasOne
    {
        return $this->hasOne(PreferenceContacts::class);
    }   
}


