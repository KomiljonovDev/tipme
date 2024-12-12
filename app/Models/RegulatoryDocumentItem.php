<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulatoryDocumentItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'regulatory_document_id',
        'name',
        'document'
    ];
    public function regulatoryDocument () {
        return $this->belongsTo(RegulatoryDocument::class);
    }
    public function translations()
    {
        return $this->hasMany(RegulatoryDocumentItemTranslation::class);
    }
}
