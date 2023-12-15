<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['tipo_documento_id', 'numero_documento', 'name', 'age', 'address', 'phone', 'ocupacion', 'state'];


    /**
     * Get all of the room for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function room(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    /**
     * Get the tipoDocumento that owns the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoDocumento(): BelongsTo
    {
        return $this->belongsTo(TipoDocumento::class);
    }

}
