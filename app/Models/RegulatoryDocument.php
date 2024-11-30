<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulatoryDocument extends Model
{
    protected $fillable = [
        'name',
    ];
    public function regulatory_document_items(){
        return $this->hasMany(RegulatoryDocumentItem::class);
    }
}
