<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\Constraints\SoftDeletedInDatabase;
use App\Providers\AppServiceProvider;
use Carbon;

class ContactController extends Controller
{

    /**
     * @var App
     */
    private $app;

    public function __construct()
    {
        $app = new App();
        $this->app = $app;
    }

    public function index()
    {
        $Contacts = DB::table('contacts')->get();
        return $Contacts;
    }

    public function createNewContactAndStoreInDatabase(Request $request)
    {

        $data = [];

        try {
            $data = request()->all();

            if(!is_array($data)){
                $data = array($request->input());
            }

            $contact = new Contact();

            $contact->full_name = $data['first_name'] . ' ' . $data['last_name'];
            $contact->email = $data->email;
            $contact->mobile = $request->mobile;

            DB::table('contacts')->insert($contact->toArray());
            return response()->json(DB::table('contacts')->where('email', $data['email'])->first());

        } catch (\Exception $exception) {

        }

        return response()->json(DB::table('contacts')->where('email', $data['email'])->first());


    }


}
