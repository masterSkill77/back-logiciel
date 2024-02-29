<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InfoCopropriete extends Model
{
    use HasFactory;

    protected $fillable = [
        'lot_number', 'total_unit', 'annual_charges', 'amount_fund', 'thousands_copropriete', 'property_copropriete', 'backupPlan', 'unionStatus'
    ];

    protected $primaryKey = 'id_infocopropriete';
    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = true;

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $casts = ['property_copropriete' => 'json'];

    public function bien(): BelongsTo
    {
        return $this->belongsTo(Bien::class);
    }
}
