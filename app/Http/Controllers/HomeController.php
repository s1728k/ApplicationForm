<?php

namespace App\Http\Controllers;

use App\Matrimony;
use App\HouseListing;
use App\HouseHunting;
use App\JobListing;
use App\JobHunting;
use App\Mail\Notification;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class HomeController extends Controller
{
	private $request;

	public function __construct(Request $request)
    {
        // $this->middleware('auth');
        $this->request = $request;
        // $this->visibles = $request->query("visibles");
        // $this->hiddens = $request->query("hiddens")?$request->query("hiddens"):[];
        // $this->has_many = $request->query("has_many")?$request->query("has_many"):[];
        // $this->filters = $request->query("filters");
        // $this->dates = $request->query("dates");
        // Auth::guard('api')->user();
    }

    public function up()
    {
        // Schema::table('matrimony', function (Blueprint $table) {
        //     $table->text('images')->nullable();
        //     $table->text('attachments')->nullable();
        // });
        // Schema::table('house_listing', function (Blueprint $table) {
        //     $table->text('images')->nullable();
        //     $table->text('attachments')->nullable();
        // });
        // Schema::table('house_hunting', function (Blueprint $table) {
        //     $table->text('images')->nullable();
        //     $table->text('attachments')->nullable();
        // });
        // Schema::table('job_listing', function (Blueprint $table) {
        //     $table->text('images')->nullable();
        //     $table->text('attachments')->nullable();
        // });
        // Schema::table('job_hunting', function (Blueprint $table) {
        //     $table->text('images')->nullable();
        //     $table->text('attachments')->nullable();
        // });
    }

    public function index()
    {
    	return view('index');
    }

    public function cru_buttons(Request $request)
    {
        if($request->query("form_name")==''){
            return "invalid_input";
        }
        return view('cru_buttons')->with(['form_name' => $request->query("form_name"), 'title' => $this->form_class($request->query("form_name"), 1)]);
    }

    public function invalid_input()
    {
        return "invalid_input";
    }

    public function send_notification(Request $request){

        $form_name = $request->query("form_name");
        $table = $this->form_class($form_name);
        $id = $table::create($request->all())->id;
        return view($form_name)->with(['form_name'=>$form_name, 'id'=>$id, 'pin'=>'', 'record'=>'']);

    }

    public function application_form(Request $request){

        $id = $request->input("serial_no");
        $pin = $request->input("pin");

        if($id == ""){
            $form_name = $request->query("form_name");
            $table = $this->form_class($form_name);
            $id = $table::create($request->all())->id;
            return view($form_name)->with(['form_name'=>$form_name, 'id'=>$id, 'pin'=>'', 'record'=>'']);
        }

        if($request->input("cru")!=='2'){
            if($request->input("spin") == ''){
                return "secret pin is mandatory.";
            }
        }

        $form_name = $request->query("form_name");
        $table = $this->form_class($form_name);
        $record = $table::findOrFail($id);

        if($request->input("submit")=='Final Submit'){
            \Mail::to('s1728k@gmail.com')->send(new Notification($form_name, $id, $record->spin));
            return view('cru_buttons')->with(['form_name' => $form_name, 'title' => $this->form_class($form_name, 1)]);
        }

        if($record->spin == $pin){

            if(!empty($request->file('images'))){
                \Storage::delete(array_pluck(json_decode($record->images)??[], 'path'));
                $parr = array();
                $files = count($request->images);
                foreach (range(0, $files-1) as $index) {
                    $file = $request->file('images.' . $index);
                    $path = $file->store('public'); // "/storage/app/". 
                    array_push($parr, ['path' => $path, 'name' => $file->getClientOriginalName()]);
                }
                $record->update(['images' => json_encode($parr)]);
            }
            if(!empty($request->file('attachments'))){
                \Storage::delete(array_pluck(json_decode($record->attachments)??[], 'path'));
                $parr = array();
                $files = count($request->attachments);
                foreach (range(0, $files-1) as $index) {
                    $file = $request->file('attachments.' . $index);
                    $path = $file->store('public'); // "/storage/app/". 
                    array_push($parr, ['path' => $path, 'name' => $file->getClientOriginalName()]);
                }
                $record->update(['attachments' => json_encode($parr)]);
            }

            $rarr = $request->all();
            unset($rarr['images']);
            unset($rarr['attachments']);
            $record->update($rarr);
            
            return view($form_name)->with(['form_name'=>$form_name, 'id'=>$id, 'pin'=>$record->spin, 'record'=>$record]);
        }
        return 'no-form';
    }

    private function form_class($form_name, $title_space = null){

        $val = "";
        switch ($form_name) {
            case 'matrimony':
                $val = "App\\Matrimony";
                break;
            case 'house_listing':
                $val = "App\\House Listing";
                break;
            case 'house_hunting':
                $val = "App\\House Hunting";
                break;
            case 'job_listing':
                $val = "App\\Job Listing";
                break;
            case 'job_hunting':
                $val = "App\\Job Hunting";
                break;
        }
        if($title_space){
            return $val;
        }else{
            return str_replace(" ","",$val);
        }

    }
}