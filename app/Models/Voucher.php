<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Voucher extends Model
{
    use HasFactory;
    protected $table = "voucher";

    protected $fillable = [

        "name_voucher",
        "code_voucher",
        "point",
        "image",
        "IDClient",
        "id_branch_voucher"



    ];




}