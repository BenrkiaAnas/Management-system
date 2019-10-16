<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // If User Logged In
        if(Auth::check())
        {
            // Retreive A List Of Companies
            $companies = Company::where('user_id',auth()->user()->id)->get();
            return view('companies.index')->with('companies',$companies);
        }
        // Redirect To Login
        return view('auth.login');



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Checking If The User Authentified
        if(Auth::check())
        {
            $this->validate($request,[
                'name' => 'required',
                'description' => 'required'
            ]);
            // Create company
            $company = new Company;
            $company->name = $request->input('name');
            $company->description = $request->input('description');
            $company->user_id = auth()->user()->id;
            $result = $company->save();
            if($result)
            {
                return redirect('/companies')->with('success','Company Has Created Successfully');
            }
            return back()->withInput()->with('error','Error Creating New Company');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        // $company = Company::where('id',$company->id)->first();
        $company = Company::find($company->id);
        return view('companies.show')->with('company',$company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {

        $company = Company::find($company->id);
        // Check For The Correct User
        if(Auth::id() !== $company->user_id)
        {
            return redirect('/companies')->with('error','Unauthorized Page');
        }
        return view('companies.edit')->with('company',$company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        // Validation
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required'
        ]);
        // save data
        /*$company = Company::where('id',$company->id)
                    ->update([
                        'name' => $request->input('name'),
                        'description' => $request->input('description')
                    ]);
        */
        $company = Company::find($company->id);
        $company->name = $request->input('name');
        $company->description = $request->input('description');
        $company->save();

        // Back To Previous Location
        // return back()->withInput();
        // redirect data
        //return redirect('/companies')->with('success','Company Has Updated');
        //return redirect()->route('companies.show',['company'=>$company->id])->with('success','Company Has Updated Successfully');
        return redirect()->route('companies.show',[$company->id])->with('success','Company Has Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //

        $company = Company::find($company->id);
        // Check For The Correct User
        if(Auth::id() !== $company->user_id)
        {
            return redirect('/companies')->with('error','Unauthorized Page');
        }
        $company->delete();
        return redirect()->route('companies.index')->with('success','Company Has Deleted Successfully');
    }
}
