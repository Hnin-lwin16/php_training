<?php
namespace App\Contracts\Dao\Major;

use Illuminate\Http\Request;
use App\Models\Major;

/**
 * Interface of Data Access Object for Authentication
 */
interface MajorDaoInterface
{
    /**
     * To Save major with values from request
     * @param Request $request request including inputs
     * @return Object created major object
     */
    public function saveMajor (Request $request);
}