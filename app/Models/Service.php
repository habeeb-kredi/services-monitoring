<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['service_url','developer_incharge', 'downtime', 'service_name',
    'downtime_message', "developer_id", "http_method" ];
    

    public function developers()
    {
        return $this->belongsTo(Developer::class, 'developer_id');
    }

}
