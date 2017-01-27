<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\City;
use App\Model\Address;
use App\Http\Requests;

class AddressController extends Controller
{

    public function index() {
        $cities = City::get();
        $addresses =  Address::orderBy('name')->get();

        return view('account.address', [
            'addresses' => $addresses,
            'cities'    => $cities,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'city' => 'required',
            'area' => 'required',
            'street' => 'max:255',
            'house' => 'max:55',
            'description' => 'max:1255'
        ]);
        $address = new Address($request->all());

        if($address->save()) {
            $status = 'Ok';
        } else {
            $status = 'Smt. went wrong';
        }

        return response()->json([
            'status' =>  $status,
            'data'   => $address
        ]);
    }

    public function destroy($id) {
        $address = Address::id($id);
        $address->delete();
        return redirect()->back()->with('success', 'Was Deleted');
    }

}
