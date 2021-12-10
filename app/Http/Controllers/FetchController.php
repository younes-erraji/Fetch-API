<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class FetchController extends Controller
{
  function index() {
    return view('fetch');
  }

  function cities() {
    $cities = City::all();
    if ($cities->count() > 0) {
      return response()->json(['status' => 1, 'cities' => $cities]);
    } else {
      return response()->json(['status' => 0, 'message' => 'There\'s No Data To Show!']);
    }
  }

  function get_cities() {
    $city = City::find(request('city'));
    if (isset($city)) {
      return response()->json(['status' => 1, 'city' => $city, 'name' => request('name')]);
    } else {
      return response()->json(['status' => 0, 'message' => 'There\'s No City With That ID']);
    }
  }

  function cities_with_params() {
    $city = City::find(request('city'));
    // return response()->json([$city]);
    return response()->json(['city' => request('city')]);
    // if (isset($city)) {
    //   return response()->json(['status' => 1, 'city' => $city]);
    // } else {
    //   return response()->json(['status' => 0, 'message' => 'There\'s No City With That ID']);
    // }
  }
}
