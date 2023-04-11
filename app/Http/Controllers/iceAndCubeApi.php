<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;
use Error;

class iceAndCubeApi extends Controller
{
    //
    public function index()
    {
        //
        try {
            $response = Http::get('https://anapioficeandfire.com/api/books');
        
            if ($response->successful()) {
                $data = $response->json();
        
                return response()->json([
                    'status' => 'success',
                    'message' => 'successful',
                    'data' => $data,
                ]);
            } else {
                return response()->json([
                    'message' => 'an error occurred',
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'errors' => 'an exceptional error occurred',
            ]);
        } catch (Error $e) {
            return response()->json([
                'errors' => 'an error occurred',
            ]);
        }
        
        
    }

    public function show(string $id)
    {
        //
        
    try {
        $response = Http::get('https://anapioficeandfire.com/api/books/'.$id);

        if ($response->successful()) {
            $book = $response->json();

            // Check if the book title matches "Game of Thrones"
            if ($book['name'] == 'A Game of Thrones') {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Book found',
                    'data' => $book,
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Book not found',
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
            ]);
        }
    } catch (Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'An exceptional error occurred',
        ]);
    } catch (Error $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'An error occurred',
        ]);
    }
  }
}
