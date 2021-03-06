<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use Image;

class ProjectController extends Controller
{
    public function onSelectThree()
    {

        $result = Projects::limit(3)->get();
        return $result;
    } // end mehtod 

    public function onSelectAll()
    {

        $result = Projects::all();
        return $result;
    } // end mehtod 


    public function projectDetails($projectId)
    {
        $id = $projectId;
        $result = Projects::where('id', $id)->get();
        return $result;
    } // end mehtod 



    public function allProjects()
    {
        $projects = Projects::all();
        return view('backend.project.all_project', compact('projects'));
    } // end mehtod 


    public function addProject()
    {
        return view('backend.project.add_project');
    } // end mehtod 


    public function storeProject(Request $request)
    {

        $request->validate([
            'project_name' => 'required',
            'project_description' => 'required',
            'img_one' => 'required',
        ], [
            'project_name.required' => 'Input Project Name',
            'project_description.required' => 'Input Project Description',

        ]);

        $image_one = $request->file('img_one');
        $name_gen = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
        Image::make($image_one)->save('upload/project/' . $name_gen);
        $save_url_one = env('APP_URL') . '/upload/project/' . $name_gen;


        $image_two = $request->file('img_two');
        $name_gen = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
        Image::make($image_two)->save('upload/project/' . $name_gen);
        $save_url_two = env('APP_URL') . '/upload/project/' . $name_gen;

        Projects::insert([
            'project_name' => $request->project_name,
            'project_description' => $request->project_description,
            'project_features' => $request->project_features,
            'live_preview' => $request->live_preview,
            'img_one' => $save_url_one,
            'img_two' => $save_url_two,
        ]);

        $notification = array(
            'message' => 'Project Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.projects')->with($notification);
    } // end mehtod


    public function editProject($id)
    {
        $project = Projects::findOrFail($id);
        return view('backend.project.edit_project', compact('project'));
    } // end mehtod 


    public function updateProject(Request $request)
    {
        $project_id = $request->id;

        if ($request->file('img_one')) {

            $image_one = $request->file('img_one');
            $name_gen = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->save('upload/project/' . $name_gen);
            $save_url_one = env('APP_URL') . '/upload/project/' . $name_gen;


            $image_two = $request->file('img_two');
            $name_gen = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->save('upload/project/' . $name_gen);
            $save_url_two = env('APP_URL') . '/upload/project/' . $name_gen;

            Projects::findOrFail($project_id)->update([
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'project_features' => $request->project_features,
                'live_preview' => $request->live_preview,
                'img_one' => $save_url_one,
                'img_two' => $save_url_two,
            ]);

            $notification = array(
                'message' => 'Project Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.projects')->with($notification);
        } else {

            Projects::findOrFail($project_id)->update([
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'project_features' => $request->project_features,
                'live_preview' => $request->live_preview,

            ]);

            $notification = array(
                'message' => 'Project Updated Without Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.projects')->with($notification);
        }
    } // end method 


    public function deleteProject($id)
    {

        Projects::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Project Delected Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end mehtod 

}
