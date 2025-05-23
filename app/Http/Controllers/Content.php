<?php

namespace App\Http\Controllers;

use App\Models\Content as modelContent;
use Illuminate\Http\Request;

class Content extends Controller
{
    public function index(Request $objRequest)
    {
        $strType = $objRequest->query("type");

        $objQuery = modelContent::query();
        if ($strType) {
            $objQuery->where("content_type", $strType);
        }

        return $objQuery->latest()->get();
    }

    public function store(Request $objRequest)
    {
        $arrData = $objRequest->validate([
            "content_type" => "required|string",
            "content_title" => "nullable|string|max:255",
            "content_body" => "required|string",
            "content_meta" => "nullable|array",
        ]);

        return(modelContent::create($arrData));
    }

    public function show(string $idContent)
    {
        return(modelContent::findOrFail($idContent));
    }
}
