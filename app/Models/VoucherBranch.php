<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherBranch extends Model
{
    protected $table = "voucher_branchs";

    protected $fillable = [

        "name_branch_voucher",

    ];
    use HasFactory;
}