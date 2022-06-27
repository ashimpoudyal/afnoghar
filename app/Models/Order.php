<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{




	public function orderitem(){
        return $this->hasMany(EventGallery::class, 'product_id');
    }

	protected $table ='orders';
	protected $fillable=[

		'user_id',
		'tracking_no',
		'tracking_msg',
		'payement_mode',
		'payement_id',
		'payement_status',
		'order_status',
		'cancel_reason',
		'table_no',
		'notify',





	];


	public function orderitems(){
        return $this->hasMany(OrderItem::class, 'order_id');
    }


    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }








    use HasFactory;
}
