<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulatoryDocumentItemTranslation extends Model
{
    use HasFactory;

    protected $table = 'reg_doc_item_translations';

    protected $fillable = [
        'regulatory_document_item_id',
        'locale',
        'name',
        'document',
    ];

    /**
     * Get the regulatory document item that owns the translation.
     */
    public function regulatoryDocumentItem()
    {
        return $this->belongsTo(RegulatoryDocumentItem::class);
    }
}

