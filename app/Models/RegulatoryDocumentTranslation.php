<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulatoryDocumentTranslation extends Model
{
    use HasFactory;

    protected $table = 'reg_doc_translations';

    protected $fillable = [
        'regulatory_document_id',
        'locale',
        'name',
    ];

    /**
     * Get the regulatory document that owns the translation.
     */
    public function regulatoryDocument()
    {
        return $this->belongsTo(RegulatoryDocument::class);
    }
}
