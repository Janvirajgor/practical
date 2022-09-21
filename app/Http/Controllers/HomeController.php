<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile(Request $request, $id)
    {
        $user = User::find($id);
        return view('auth.profile', compact('user'));
    }

    public function editProfile(Request $request, $id)
    {
        $user = User::find($id);
        return view('auth.editprofile', compact('user'));
    }




    public function updateProfile(Request $request, User $users, $id)
    {
        $user = $users->find($id);
        $request->validate([
            'name' => 'required',
            'mobile' => ['required', 'unique:users', 'digits:10'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'nullable'],
            'hobbies' => ['required', 'nullable'],
        ]);

        $profile_image = $request->file('profile_image');

        //generate unique id for image
        $name_gen = hexdec(uniqid());

        //image extention
        $img_ext = strtolower($profile_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/';
        $last_img = $up_location . $img_name;
        $profile_image->move($up_location, $img_name);

        // if (isset($input['image'])) {
        //     $user->image($last_img);
        // }

        // else {
        $user->forceFill([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'image' => $last_img,
            'hobbies' => $request->hobbies,
            'gender' => $request->gender,
            'updated_at' => Carbon::now()
        ])->save();
        // }

        $user->find($request->user_id);

        $email_data = array(
            'name' => $user['name'],
            'mobile' => $user['mobile'],
            'address' => $user['address'],
            'gender' => $user['gender'],
        );

        Mail::send('welcome_email', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['name'], $email_data['mobile'], $email_data['address'], $email_data['gender'])
                ->subject('Welcome to System')
                ->from('admin@gmail.com');
        });

        return redirect('/profile/' . $request->user_id);
    }
}
