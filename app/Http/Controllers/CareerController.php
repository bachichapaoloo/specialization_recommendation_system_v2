<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CareerController extends Controller
{
    public function careers(Request $request)
    {
        $searchTerm = $request->input('search');
        $currentPage = $request->input('page', 1);
        $itemsPerPage = 6;

        $path = public_path('json/careers.json');
        $data = json_decode(File::get($path), true);

        // Filter data based on the search term
        if ($searchTerm) {
            $data = array_filter($data, function ($item) use ($searchTerm) {
                $itemText = strtolower($item['job_name'] . ' ' . $item['Specialization'] . ' ' . $item['main_description'] . ' ' . $item['short_description']);
                return strpos($itemText, strtolower($searchTerm)) !== false;
            });
        }

        // Calculate pagination
        $totalItems = count($data);
        $totalPages = ceil($totalItems / $itemsPerPage);
        $offset = ($currentPage - 1) * $itemsPerPage;
        $data = array_slice($data, $offset, $itemsPerPage);

        if ($request->wantsJson()) {
            // If request wants JSON response
            return response()->json([
                'data' => array_values($data), // Re-index array after slicing
                'totalPages' => $totalPages,
                'currentPage' => $currentPage
            ]);
        } else {
            // If request wants HTML (Blade view)
            return view('careers', [
                'jobs' => $data,
                'totalPages' => $totalPages,
                'currentPage' => $currentPage,
                'searchTerm' => $searchTerm
            ]);
        }
    }
}
