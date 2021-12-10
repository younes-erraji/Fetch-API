<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class XHRController extends Controller
{
  function index() {
    return view('xhr');
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
    return response()->json(['city' => request('city'), 'name' => request('name')]);
    // $city = City::find(request('city'));
    // if (isset($city)) {
    //   return response()->json(['status' => 1, 'city' => $city]);
    // } else {
    //   return response()->json(['status' => 0, 'message' => 'There\'s No City With That ID']);
    // }
  }
}
