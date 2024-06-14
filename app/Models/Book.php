<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // table name associated with this model
    protected $tableName = 'books';

    // use book_id as primary key instead of default key 'id'
    protected $primaryKey = 'book_id';

    // default ပါတဲ့ updated_at and created_at ကို မပါစေချင်ရင်သုံးလို့ရတယ်
    // ဒါပေမယ့် table create မလုပ်ခင်မှာ model ထဲမှာ false ပေးထားမှ အဆင်ပြေမယ်
    public $timestamps = false;

    // create method ကို model ကနေ တိုက်ရိုက်သုံးချင်ရင် fillable or guarded တွေသတ်မှတ်ပေးထားရမယ်။ mass assignment ကနေ ကာကွယ်လို့ရအောင်လိုံ့
    protected $fillable = ['author', 'email', 'price', 'level', 'isStock', 'published_at'];

    // guard လုပ်ထားတဲ့ props တွေကလွဲပြီး ကျန်တာ တွေကို insert လုပ်လို့ရတယ်
    protected $guarded = ['book_id'];
}
