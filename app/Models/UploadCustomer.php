<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadCustomer extends Model
{
    protected $fillable = [
        'file', 'status', 'type',
    ];

    public function scopeWaiting($q)
    {
        $q->where('status', 'waiting');
    }

    public function statusProccessing()
    {
        $this->status = 'proccessing';
        $this->save();
    }

    public function statusSuccess()
    {
        $this->status = 'success';
        $this->save();
    }
}
