<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebController extends Controller
{
    //
    public function getCode($code)
    {
        $website = Website::where('code', $code)->first();
        if (! $website) {
            return response()->json([
                'message' => 'Код не найден',
            ], 404);
        }

        $website->increment('clicks');
        return redirect()->away($website->url, 302);
    }

    public function insertLinks(Request $request)
    {
        $validated = $request->validate([
            'url' => ['required', 'url:http,https'],
        ]);
        $website = Website::where('url', $validated['url'])->first();

        if ($website) {
            return response()->json([
                'code'      => $website->code,
                'short_url' => "http://localhost/$website->code",
            ]);
        }
        do {
            $code = strtoupper(Str::random(6));
        } while (Website::where('code', $code)->exists());

        $website = Website::create([
            'url'  => $validated['url'],
            'code' => $code,
        ]);

        return response()->json([
            'code'      => $website->code,
            'short_url' => "http://localhost/$website->code",
        ]);
    }

    public function getStatsLinks($code)
    {
        $website = Website::where('code', $code)->first();
        if (! $website) {
            return response()->json([
                'message' => 'Code not found',
            ], 404);
        }
        return response()->json([
            'url'        => $website->url,
            'code'       => $website->code,
            'clicks'     => $website->clicks,
            'created_at' => $website->created_at?->toISOString(),
        ]);
    }

}
