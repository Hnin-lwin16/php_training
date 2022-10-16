<?php
namespace App\Contracts\Services\Major;

use Illuminate\Http\Request;
use App\Models\Major;

/**
 * Interface for task service
 */
interface MajorServiceInterface
{
    /**
     * To save major
     * @param Request $request request with inputs
     * @return Object major saved post
     */
    public function saveMajor (Request $request);
}
?>