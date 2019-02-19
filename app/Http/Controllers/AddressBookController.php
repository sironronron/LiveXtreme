<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\AddressBook;
use App\Country;
use Auth;

class AddressBookController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::get();
        $addresses = AddressBook::where('user_id', Auth::user()->id)->get();

        return view('member.profile.address.index', compact('categories', 'addresses'));
    }

    public function create()
    {
        $categories = ProductCategory::get();
        $countries = Country::pluck('country_name', 'country_code');
        return view('member.profile.address.create', compact('categories', 'countries'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|min:3|max:192',
            'lastname'  => 'required|min:3|max:192',
            'address1'  => 'required|max:192',
            'address2'  => 'max:192',
            'city'      => 'required|min:3|max:192',
            'state'     => 'required|min:3|max:192',
            'country'   => 'required',
            'zipCode'   => 'required|min:3',
            'telNo'     => 'required|min:10|max:11'
        ]);

        $address = new AddressBook();

        $address->user_id   = Auth::user()->id;
        $address->firstname = $request->firstname;
        $address->lastname = $request->lastname;
        $address->address1 = $request->address1;
        $address->address2 = $request->address2;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->zipCode = $request->zipCode;
        $address->telNo = $request->telNo;

        $address->save();

        return redirect()->route('address.index')->with('success', 'Address Information Added');
    }

    public function edit($id)
    {
        $categories = ProductCategory::get();
        $countries = Country::pluck('country_name', 'country_code');
        $address = AddressBook::where('user_id', Auth::user()->id)->where('id', $id)->firstOrFail();
        return view('member.profile.address.edit', compact('categories', 'countries', 'address'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required|min:3|max:192',
            'lastname'  => 'required|min:3|max:192',
            'address1'  => 'required|max:192',
            'address2'  => 'max:192',
            'city'      => 'required|min:3|max:192',
            'state'     => 'required|min:3|max:192',
            'country'   => 'required',
            'zipCode'   => 'required|min:3',
            'telNo'     => 'required|min:10|max:11'
        ]);

        $address = AddressBook::find($id);

        $address->firstname = $request->input('firstname');
        $address->lastname = $request->input('lastname');
        $address->address1 = $request->input('address1');
        $address->address2 = $request->input('address2');
        $address->city = $request->input('city');
        $address->state = $request->input('state');
        $address->country = $request->input('country');
        $address->zipCode = $request->input('zipCode');
        $address->telNo = $request->input('telNo');

        $address->save();

        return redirect()->route('address.index')->with('success', 'Address Information Updated');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $address = AddressBook::find($id);
        $address->delete();
        return redirect()->route('address.index')->with('success', 'Address Deleted');
    }

    public function makeDefault($id)
    {
        $address = AddressBook::find($id);
        $address->default = '1';
        $address->save();
        return redirect()->back()->with('success', "$address->address1 is now your default address.");
    }
}
