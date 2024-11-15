<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulatoryDocumentItem extends Model
{
    //
    public function regulatoryDocument () {
        return $this->belongsTo(RegulatoryDocument::class);
    }
}
