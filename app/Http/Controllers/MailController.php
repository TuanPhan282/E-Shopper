<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\User;
use App\Models\History;
use App\Mail\MailNotify;

class MailController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->back()->with('error', 'Cart is empty');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        Mail::to('minhtuan.phan282@gmail.com')->send(new MailNotify($cart, $total));
        $user = User::where('id',Auth::id())->first();
        $data = [
            'email' => $user->email,
            'phone' => $user->phone,
            'name' => $user->name,
            'price' => $total,
            'id_user' => $user->id,
        ];
        History::create($data);
        return redirect()->back()->with('success', 'Email sent successfully!');
    }
}
