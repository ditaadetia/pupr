<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Tenant extends Model
{
    use HasApiTokens, HasFactory;

    protected $table = 'tenants';
    protected $guarded = [];

    // public function scopeFilter($query, array $filters)
    // {
    //     $query->when($filters['nama'] ?? false, fn($query, $nama) =>
    //         $query->whereHas('tenant', fn($query) =>
    //             $query->where('nama', $nama)
    //         )
    //     );
    //     $query->when($filters['category'] ?? false, function($query, $category){
    //         return $query->whereHas('category', function($query) use($category) {;
    //             $query->where('category_order_id', $category);
    //         });
    //     });
    // }

    protected $fillable = [
        'nama',
        'foto',
        'email',
        'password',
        'username',
        'no_hp',
        'kontak_darurat',
        'alamat'
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function refund()
    {
        return $this->hasMany(Refund::class);
    }

    public function reschedule()
    {
        return $this->hasMany(Reschedule::class);
    }

    // public function refund()
    // {
    //     return $this->hasMany(Refund::class);
    // }


    // public function refund()
    // {
    //     return $this->hasOneThrough(Refund::class, Order::class, 'tenant_id', 'order_id', 'id', 'id');
    // }
}
