<?php

namespace App\Http\Controllers;

use App\Company;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // If User Logged In
        if(Auth::check())
        {
            // Retreive A List Of Companies
            $projects = Project::where('user_id',auth()->user()->id)->get();
            return view('projects.index')->with('projects',$projects);
        }
        // Redirect To Login
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {
        // If The Project Come Whitout Selecting A Company We Should Display To User A List Of His Own Companies

        $companies = (array) null;
        if(!$company_id)
        {
            $companies = Company::where('user_id',auth()->user()->id)->get();
        }

        return view('projects.create',['company_id' => $company_id,'companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //Checking If The User Authentified
        if(Auth::check())
        {
            $this->validate($request,[
                'name' => 'required',
                'description' => 'required'
            ]);
            // Create company
            $project = new Project;
            $project->name = $request->input('name');
            $project->description = $request->input('description');
            $project->user_id = auth()->user()->id;
            $project->company_id = $request->input('company_id');
            $result = $project->save();
            if($result)
            {
                return redirect('/projects')->with('success','Project Has Created Successfully');
            }
            return back()->withInput()->with('error','Error Creating New Project');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        // $company = Company::where('id',$company->id)->first();
        $project = Project::find($project->id);
        // Comments
        $comments = $project->comments;
        $data = array(
            'project' => $project,
            'comments' => $comments
        );
        return view('projects.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        $project = Project::find($project->id);
        // Check For The Correct User
        if(Auth::id() !== $project->user_id)
        {
            return redirect('/projects')->with('error','Unauthorized Page');
        }
        return view('projects.edit')->with('project',$project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        // Validation
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'company_id' => 'required'
        ]);
        // save data
        /*$company = Company::where('id',$company->id)
                    ->update([
                        'name' => $request->input('name'),
                        'description' => $request->input('description')
                    ]);
        */
        $project = Project::find($project->id);
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->save();

        // Back To Previous Location
        // return back()->withInput();
        // redirect data
        //return redirect('/companies')->with('success','Company Has Updated');
        //return redirect()->route('companies.show',['company'=>$company->id])->with('success','Company Has Updated Successfully');
        return redirect()->route('projects.show',[$project->id])->with('success','Project Has Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $project = Project::find($project->id);
        // Check For The Correct User
        if(Auth::id() !== $project->user_id)
        {
            return redirect('/project')->with('error','Unauthorized Page');
        }
        $project->delete();
        return redirect()->route('projects.index')->with('success','Project Has Deleted Successfully');
    }
}
