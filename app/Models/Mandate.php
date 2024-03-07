<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mandate extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_mandate';


    protected $fillable = ['num_mandat', 'person', 'bien_id_bien', 'contact_id_contact'];

    public function bien(): HasOne
    {
        return $this->hasOne(Bien::class, 'id', 'bien_id_bien');
    }

    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class, 'id', 'contact_id_contact');
    }
}
