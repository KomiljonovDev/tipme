<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulatoryDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function regulatory_document_items(){
        return $this->hasMany(RegulatoryDocumentItem::class);
    }
    public function translations()
    {
        return $this->hasMany(RegulatoryDocumentTranslation::class);
    }
}
