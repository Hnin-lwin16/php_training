<?php
namespace App\Dao\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

/**
 * Data Access Object for Authentication
 */
class MajorDao implements MajorDaoInterface
{
    /**
     * To Save major with values from request
     * @param Request $request request including inputs
     * @return Object created major object
     */
    public function saveMajor (Request $request)
    {
        $major = new Major;
        $major->major = $request->major_only;
        $major->save();
    }
}
?>