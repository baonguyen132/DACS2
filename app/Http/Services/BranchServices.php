<?php
namespace App\Http\Services;

use App\Models\VoucherBranch;

class BranchServices
{
    function getBranch()
    {
        $branchs = VoucherBranch::all();
        return $branchs;

    }


}


?>