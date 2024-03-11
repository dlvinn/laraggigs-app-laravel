<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    
    //returns the home page
    public function index(){
        //  dd(request('tag'));
        /* return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag','search']))->get(),
        ]); //this is enough when you didnt want to paginate the page */
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(4),//or you can use simplePaginate()
        ]);
    }
    //shos the single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }
    //create function to create a new post
    public function create(){
        return view('listings.create');
    }
    //store function to save a new listing that you enter
    public function store(Request $request) {
        // dd($request->file('logo')->store());//the files that you are saving is going to go to a folder called storage/app
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }

        $formFields['user_id'] = auth()->id();


        Listing::create($formFields);
        
        return redirect('/')->with('message','listing created successfully');
        dd('error');
    }

    //show edit form
    public function edit(Listing $listing){
        return view('listings.edit', [
            'listing'=>$listing,
        ]);
    }

      //update the edited function
      public function update(Request $request, Listing $listing) {
        // dd($request, $listing);
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }



        $listing->update($formFields);
        
        return back()->with('message','listing updated successfully');
    }


    public function destroy(Listing $listing){
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message','listing deleted successfully');
    }

     // Manage Listings
     public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }

}
