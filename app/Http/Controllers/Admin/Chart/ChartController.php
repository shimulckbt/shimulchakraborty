<?php

namespace App\Http\Controllers\Admin\Chart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chart;

class ChartController extends Controller
{
	public function onAllSelect()
	{
		$result = Chart::all();
		return $result;
	} // end method 

	public function createChartContent()
	{
		return view('backend.chart.create_chart');
	}

	public function storeChartContent(Request $request)
	{
		// dd($request->all());
		$request->validate([
			'techonology' => 'required',
			'project' => 'required',
		]);

		$skill = new Chart();

		$skill->x_data = $request->techonology;
		$skill->y_data = $request->project;
		$skill->css_prop = $request->css_prop;

		$skill->save();

		$notification = array(
			'message' => 'Chart Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('chart.create')->with($notification);
	}

	public function allChartContents()
	{
		$chart = Chart::all();
		return view('backend.chart.all_chart', compact('chart'));
	} // end method 


	public function editChartContent($id)
	{
		$chart = Chart::findOrFail($id);
		return view('backend.chart.edit_chart', compact('chart'));
	} // end method 


	public function updateChartContent(Request $request)
	{

		$chart_id = $request->id;

		Chart::findOrFail($chart_id)->update([

			'x_data' => $request->techonology,
			'y_data' => $request->project,
			'css_prop' => $request->css_prop,
		]);

		$notification = array(
			'message' => 'Chart Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('all.chart.content')->with($notification);
	} // end method 

	public function deleteChart($id)
	{
		Chart::findOrFail($id)->delete();

		$notification = array(
			'message' => 'Review Delected Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	} // end method 
}
