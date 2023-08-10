<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\SalesLead;
use App\Models\StatusRef;
use App\Models\TjCompUser;
use App\Models\TrFormType;
use App\Models\TtContact;
use App\Models\TtForm;
use App\Models\TtUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SalesLeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd(base64_encode(env('APP_KEY')));

// dd($this->companycode());
        $statuscode = request()->get('status-code');
        return view('backend.company.index', compact('statuscode'));
    }

    public function grid($code){
        // $lead = Company::with(['users'])->where('created_by',Auth::user()->username)->get();

        $lead = TtForm::with(['company.users'])->where('status_code',$code)->get();

        return DataTables::of($lead)
            ->addIndexColumn()
            ->editColumn('active', function ($lead) {
                if($lead->company->active=='2'){
                    return '<span class="badge badge-pill badge-secondary" style="font-size: 14px">Inactive</span>';
                }else{
                    return '<span class="cubex-badge-success" style="font-size: 14px">Active</span>';
                }

            })
            ->editColumn('action', function ($lead) {
                if(count($lead->company->users) > 0){
                    return '

                    <a href="'.url('sales-lead/edit/'.$lead->id).'">
                        <img src="'.asset('assets/icon/edit-ico.svg').'" alt="edit-ico">
                    </a>';
                }else{
                    return '

                    <a href="'.url('sales-lead/edit/'.$lead->company->id).'">
                        <img src="'.asset('assets/icon/edit-ico.svg').'" alt="edit-ico">
                    </a>
                    <a href="javascript:void(0)" class="delete-company" data-companyid="'.$lead->id.'">
                        <img src="'.asset('assets/icon/delete-ico.svg').'" alt="delete-ico">
                    </a>
                    ';
                }
            })
            ->rawColumns(['action','active'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.company.create');
    }

    public function reference(){
        $reference = DB::table('tr_generic')->get();

        return response()->json(['data'=>$reference]);
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
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',

        ]);

        // dd($validated);
        if($validated){

            $status = DB::table('tr_status')->where('id',$request->status)->first();
            if(empty($request->company_id)){
                $compcode = 'COMP-'.$this->companycode();
                $company = Company::create([
                    'code'  => $compcode,
                    'nama'  => $request->nama,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'telepone' => $request->telepone,
                    'website' => $request->website,
                    'jenis_usaha' => $request->jenis_usaha,
                    'skala_usaha' => $request->skala_usaha,
                    'pendapatan_tahun' => $request->pendapatan_tahun,
                    'jumlah_karyawan' => $request->karyawan,
                    'active'=>$request->active == null ? 2 : 1,
                    'created_by' => Auth::user()->username,
                    'created_at' => now(),
                ]);

                $code = '01-'. date('dmY').'-'.$this->countform();
                $formtype = TrFormType::where('code','01')->first();
                $form = TtForm::create([
                    'code'  => $code, #01 -> code form_type - datenow - 01 sequence,
                    'name'  => $formtype->name.' '.$request->nama,
                    'company_id'    => $company->id,
                    'company_code'  => $company->code,
                    'status_id'     => $status->id,
                    'status_code'   => $status->code,
                    'type_id'       => '1',
                    'type_code'     => '01',
                    'created_at'    => now(),
                ]);

                return redirect()->route('company.edit',['formid'=>$form->id]);
            }else{

                $form = TtForm::where('id',$request->form_id)->first();
                $form->status_id = $status->id;
                $form->status_code = $status->code;
                $form->update();


                $company = Company::where('id',$request->company_id)->first();
                $company->nama = $request->nama;
                $company->alamat = $request->alamat;
                $company->email = $request->email;
                $company->telepone = $request->telepone;
                $company->website = $request->website;
                $company->jenis_usaha = $request->jenis_usaha;
                $company->skala_usaha = $request->sekala_usaha;
                $company->pendapatan_tahun = $request->pendapatan_tahun;
                $company->jumlah_karyawan = $request->karyawan;
                $company->active  = $request->active == null ? 2 : 1;

                $company->update();
                return redirect()->route('company.edit',['formid'=>$form->id]);

            }
        }
    }

    protected function countform(){
        $form = TtForm::where('type_code','01')->where('created_at','>=',Carbon::today())->count();
        $form = $form < 10 ? '0'.$form : $form;
        return $form;
    }

    protected function companycode(){
        $company = Company::where('created_at','>=',Carbon::today())->count();
        $company = $company + 1;
        $code = $company <= 10 ? '0'.$company : '-'.$company;
        return $code;
    }

    public function addcontact(Request $request){
        $validator = Validator::make($request->all(), [
            'emailkontak' => 'required|unique:tt_contact,nama',
            'phonekontak' => 'required|unique:tt_contact,nama',
        ]);

        if($validator->fails()){
            return response()->json(['status'=>false,'message'=>$validator->errors()]);
        }else{

            $fullName =  $request->namakontak;
            $nameParts = explode(' ', $fullName);
            $firstName = $nameParts[0];
            $midName = isset($nameParts[1]) ? $nameParts[1] : null;
            $lastName = isset($nameParts[2]) ? $nameParts[2] : null;

            $user = TtUser::create([
                'first_name'  => $firstName,
                'mid_name'    => $midName,
                'last_name'    => $lastName,
                'position'    => $request->jabatankontak,
            ]);

            TjCompUser::create([
                'company_id'    => $request->company_id,
                'user_id'       => $user->id,
            ]);


            TtContact::create([
                'nama'  => $request->emailkontak,
                'type'  => '1',
                'user_id' => $user->id
            ]);

            TtContact::create([
                'nama'  => $request->phonekontak,
                'type'  => '2',
                'user_id' => $user->id
            ]);

            return response()->json(['status'=>true,'message'=>'Success Add Contact']);

        }
    }

    public function editcontact($id){
        $tjcompuser = TjCompUser::with(['user.contacts'])->where('id',$id)->first();
        $reference = DB::table('tr_generic')->get();
        return response()->json(['status'=>true,'data'=>$tjcompuser,'reference'=>$reference]);

    }

    public function updatecontact(Request $request){
        $user = TtUser::with('contacts')->where('id',$request->userid)->first();

        $fullName =  $request->namakontak;
        $nameParts = explode(' ', $fullName);
        $firstName = $nameParts[0];
        $midName = isset($nameParts[1]) ? $nameParts[1] : null;
        $lastName = isset($nameParts[2]) ? $nameParts[2] : null;

        $user->first_name = $firstName;
        $user->mid_name = $midName;
        $user->last_name = $lastName;
        $user->position = $request->jabatankontak;

        $validator = Validator::make($request->all(), [
            'emailkontak' => 'required|unique:tt_contact,nama, '.$user->contacts[0]->id,
            'phonekontak' => 'required|unique:tt_contact,nama, '.$user->contacts[1]->id,
        ]);

        if($validator->fails()){
            return response()->json(['status'=>false,'message'=>$validator->errors()]);
        }else{

            $user->contacts[0]->nama = $request->emailkontak;
            $user->contacts[0]->update();

            $user->contacts[1]->nama = $request->phonekontak;
            $user->contacts[1]->update();

            $user->update();

            return response()->json(['status'=>true,'message'=>'Success Update Contact']);
        }

    }
    public function deletecontact($id){
        $tjcompuser = TjCompUser::with(['user.contacts'])->where('id',$id)->first();
        $tjcompuser->user->delcon();
        $tjcompuser->user->delete();
        $tjcompuser->delete();

        return response()->json(['status'=>true,'data'=>$tjcompuser->user]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($formid)
    {
        $form = TtForm::with(['status'])->where('id',$formid)->first();
        $company = Company::with(['users.user.contacts'])->where('id',$form->company_id)->first();

        // dd($company);
        return view('backend.company.create', compact('company','form'));

    }

    public function updatestatus(StatusRef $statusid,TtForm $formid){
        $sequence = $statusid->sequence + 1;
        $status = StatusRef::where('sequence',$sequence)->where('type_code','05')->first();
        $formid->status_id = $status->id;
        $formid->status_code = $status->code;
        $formid->update();

        return response()->json(['status'=>true, 'data' => $status]);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TtForm $ttform)
    {
        //
        Company::where('id',$ttform->company_id)->delete();
        $ttform->delete();
        return response()->json(['status'=>true]);

    }


    public function orderinstall(){
        $token = request()->bearerToken();
        if($token && $token == base64_encode(env('APP_KEY'))){
            $form = TtForm::with(['company'])->where('status_code','0507')->get();

            return response()->json(['status'=>true,'data'=>$form,'token'=>$token]);
        }else{
            return response()->json(['status'=>false,'message'=>'Token Invalid']);
        }

    }
}
