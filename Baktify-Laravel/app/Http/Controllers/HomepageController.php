<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;
        $product = Product::with(['Category']);

        $searchResult =  $product->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('price', 'LIKE', '%' . $keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $keyword . '%')
            ->orWhere('stock', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('Category', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            });

        if ($request->has('search')) {
            $product = $searchResult;
        }




        $product =  $product->paginate(12);


        return view('homepage.homepage', compact('product'));
    }

    public function profile()
    {

        $user = User::where('id', Auth::user()->id)->first();

        return view('profile.profile', compact('user'));
    }

    public function profile_update(Request $request)
    {
         $this->validate($request, [
            'name' => 'required|max:255',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password_confirmation|same:password_confirmation',
            'address' => 'min:15',
            'phone' => 'required|min:11'

        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back()->with('success','successfully updated');

    }

    public function add_to_cart($product, Request $request)
    {

        $product = Product::find($product);

        $cart = new Order();

        $qty = 1;

        $cart->id_user = Auth::user()->id;
        $cart->id_product = $product->id;
        $cart->qty = $qty;
        $cart->total = $product->price * $qty;
        $cart->status = 'Pending';
        // $cart->grand_total = $product->price * $qty;
        $cart->save();

        return redirect()->route('homepage.cart');

    }

    public function cart()
    {
        $cart = Order::with('Product','User')->where('status','Pending')->latest()->get();


        return view('profile.cart',compact('cart'));
    }

    public function detail($id)
    {
        $product = Product::with('Category')->find($id);

        return view('homepage.details', compact('product'));
    }

    public function checkout()
    {
        $cart = Order::where('status','Pending');

        $cart->update(['status'=>'Finish']);

        return redirect()->route('homepage.transaction');
    }

    public function transaction()
    {
        $transaction = Order::where('status','Finish')->latest()->get();

        return view('profile.transaction',compact('transaction'));
    }
}
