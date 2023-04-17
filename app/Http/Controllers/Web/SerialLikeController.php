<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\SerialUser;
use App\Models\Serial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SerialLikeController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $serial = Serial::findOrFail($request->id);

        SerialUser::create([
            'serial_id' => $serial->id,
            'user_id' => Auth::id(),
            'like' => 1,
        ]);

        return response()->json([
            'success' => 'Added'
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {

        $serial_like = SerialUser::query()->where('id', $request->id)->first();

        if ( !$serial_like ) {
            $serial_like = SerialUser::query()->where('serial_id', $request->id)->delete();
        }else{
            $serial_like->delete();
        }

        return response()->json([
            'success' => 'Deleted'
        ]);
    }
}
