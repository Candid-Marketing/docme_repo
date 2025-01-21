<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StripeConfigurations;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\HomePage;

class SuperAdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $registrations = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month')
        ->get()
        ->toArray();
        // Pass both $users and $registrations to the view
        return view('superadmin.pages.index', compact('users', 'registrations'));
    }

    public function finance()
    {
        $stripe = StripeConfigurations::latest()->first();
        return view('superadmin.pages.stripe.index', compact('stripe'));
    }
    public function email()
    {
        return view('superadmin.pages.email.index');
    }
    public function homepage()
    {
        $homepage = HomePage::all();
        return view('superadmin.pages.homepage.index',compact('homepage'));
    }
    public function user()
    {
        return view('superadmin.pages.user.index');
    }

    public function stripeupdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stripe_key' => 'required',
            'stripe_secret' => 'required',
        ]);

        $stripeConfig = StripeConfigurations::findOrFail($request->id);
        $stripeConfig->name = $request->name;
        $stripeConfig->stripe_key = $request->stripe_key;
        $stripeConfig->stripe_secret = $request->stripe_secret;
        $stripeConfig->save();

        return redirect()->back()->with('success', 'Stripe configuration updated successfully!');
    }
    public function homestore(Request $request)
    {
        $section = $request->input('section');
        // Initialize empty variables for image paths

        if ($section === 'home') {

        $faviconUrl = null;
        $naviconUrl = null;
        $homeimageUrl = null;

        // Handle favicon image upload
        if ($request->hasFile('favicon_image')) {
            $favicon = $request->file('favicon_image');
            $originalName = $favicon->getClientOriginalName();
            $destinationPath = public_path('images');
            $favicon->move($destinationPath, $originalName);
            $faviconUrl = 'images/' . $originalName;
        }

        // Handle nav image upload
        if ($request->hasFile('nav_image')) {
            $navimage = $request->file('nav_image');
            $originalName = $navimage->getClientOriginalName();
            $destinationPath = public_path('images');
            $navimage->move($destinationPath, $originalName);
            $naviconUrl = 'images/' . $originalName;
        }

        // Handle home image upload
        if ($request->hasFile('home_image')) {
            $homeimage = $request->file('home_image');
            $originalName = $homeimage->getClientOriginalName();
            $destinationPath = public_path('images');
            $homeimage->move($destinationPath, $originalName);
            $homeimageUrl = 'images/' . $originalName;
        }

        // Prepare data for upsert
        $data = [];

        // Add favicon data if it exists
        $data = [
            [
                'name' => 'favicon_image',
                'image_path' => $faviconUrl,
                'content' => 'favicon',
            ],
            [
                'name' => 'nav_image',
                'image_path' => $naviconUrl,
                'content' => 'nav_image',
            ],
            [
                'name' => 'home_image',
                'image_path' => $homeimageUrl,
                'content' => 'home_image',
            ],
            [
                'name' => 'home_title',
                'image_path' => null,
                'content' => $request->home_title,
            ],
            [
                'name' => 'home_subtitle',
                'image_path' => null,
                'content' => $request->home_description,
            ],
        ];
        if (!empty($data)) {
            Homepage::upsert(
                $data,
                ['name'], // Ensure unique constraint by name
                ['image_path', 'content']
            );
        }
        return redirect()->back()->with('success', 'Homepage updated successfully!');
     }
     else if($section =="about_us")
     {
        $aboutusUrl = null;
        $aboutusUrl1 = null;
        $aboutusUrl2 = null;
        if ($request->hasFile('about_us_image')) {
            $aboutus = $request->file('about_us_image');
            $originalName = $aboutus->getClientOriginalName();
            $destinationPath = public_path('images');
            $aboutus->move($destinationPath, $originalName);
            $aboutusUrl = 'images/' . $originalName;
        }

        // Handle nav image upload
        if ($request->hasFile('about_us_image1')) {
            $aboutus1 = $request->file('about_us_image1');
            $originalName = $aboutus1->getClientOriginalName();
            $destinationPath = public_path('images');
            $aboutus1->move($destinationPath, $originalName);
            $aboutusUrl1 = 'images/' . $originalName;
        }

        // Handle home image upload
        if ($request->hasFile('about_us_image2')) {
            $aboutus2 = $request->file('about_us_image2');
            $originalName = $aboutus2->getClientOriginalName();
            $destinationPath = public_path('images');
            $aboutus2->move($destinationPath, $originalName);
            $aboutusUrl2 = 'images/' . $originalName;
        }

        $data = [];

        $data = [
            [
                'name' => 'about_us_image',
                'image_path' => $aboutusUrl,
                'content' => 'about_us_image',
            ],
            [
                'name' => 'about_us_image1',
                'image_path' => $aboutusUrl1,
                'content' => 'about_us_image1',
            ],
            [
                'name' => 'about_us_image2',
                'image_path' => $aboutusUrl2,
                'content' => 'about_us_image2',
            ],
            [
                'name' => 'about_us_title',
                'image_path' => null,
                'content' => $request->about_us_title,
            ],
            [
                'name' => 'about_us_description',
                'image_path' => null,
                'content' => $request->about_us_description,
            ],
            [
                'name' => 'about_us_list1',
                'image_path' => null,
                'content' => $request->about_us_list1,
            ],
            [
                'name' => 'about_us_list2',
                'image_path' => null,
                'content' => $request->about_us_list2,
            ],
        ];
        if (!empty($data)) {
            Homepage::upsert(
                $data,
                ['name'], // Ensure unique constraint by name
                ['image_path', 'content']
            );
        }
        return redirect()->back()->with('success', 'About Us updated successfully!');
     }
     else if ($section =="feature")
     {
        $navbarUrl1 = null;
        $navbarUrl2 = null;
        $navbarUrl3 = null;

        if ($request->hasFile('nav_image1')) {
            $nav_image1 = $request->file('nav_image1');
            $originalName = $nav_image1->getClientOriginalName();
            $destinationPath = public_path('images');
            $nav_image1->move($destinationPath, $originalName);
            $navbarUrl1 = 'images/' . $originalName;
        }

        // Handle nav image upload
        if ($request->hasFile('nav_image2')) {
            $nav_image2 = $request->file('nav_image2');
            $originalName = $nav_image2->getClientOriginalName();
            $destinationPath = public_path('images');
            $nav_image2->move($destinationPath, $originalName);
            $navbarUrl2 = 'images/' . $originalName;
        }

        // Handle home image upload
        if ($request->hasFile('nav_image3')) {
            $nav_image3 = $request->file('nav_image3');
            $originalName = $nav_image3->getClientOriginalName();
            $destinationPath = public_path('images');
            $nav_image3->move($destinationPath, $originalName);
            $navbarUrl3 = 'images/' . $originalName;
        }

        $data = [];

        $data = [
            [
                'name' => 'nav_image1',
                'image_path' => $navbarUrl1,
                'content' => 'nav_image1',
            ],
            [
                'name' => 'nav_image2',
                'image_path' => $navbarUrl2,
                'content' => 'nav_image2',
            ],
            [
                'name' => 'nav_image3',
                'image_path' => $navbarUrl3,
                'content' => 'nav_image3',
            ],
            [
                'name' => 'feature_title',
                'image_path' => null,
                'content' => $request->feature_title,
            ],
            [
                'name' => 'feature_description',
                'image_path' => null,
                'content' => $request->feature_description,
            ],
            [
                'name' => 'feat_nav1',
                'image_path' => null,
                'content' => $request->feat_nav1,
            ],
            [
                'name' => 'feat_nav2',
                'image_path' => null,
                'content' => $request->feat_nav2,
            ],
            [
                'name' => 'feat_nav3',
                'image_path' => null,
                'content' => $request->feat_nav3,
            ],
            [
                'name' => 'nav_title1',
                'image_path' => null,
                'content' => $request->nav_title1,
            ],
            [
                'name' => 'nav_title2',
                'image_path' => null,
                'content' => $request->nav_title2,
            ],
            [
                'name' => 'nav_title3',
                'image_path' => null,
                'content' => $request->nav_title3,
            ],
            [
                'name' => 'nav_desc1',
                'image_path' => null,
                'content' => $request->nav_desc1,
            ],
            [
                'name' => 'nav_desc2',
                'image_path' => null,
                'content' => $request->nav_desc2,
            ],
            [
                'name' => 'nav_desc3',
                'image_path' => null,
                'content' => $request->nav_desc3,
            ],
        ];
        if (!empty($data)) {
            Homepage::upsert(
                $data,
                ['name'], // Ensure unique constraint by name
                ['image_path', 'content']
            );
        }
        return redirect()->back()->with('success', 'Feature updated successfully!');
     }
     else if($section == 'service')
     {
        $data = [];

        $data = [
            [
                'name' => 'service_title',
                'image_path' => null,
                'content' => $request->service_title,
            ],
            [
                'name' => 'service_description',
                'image_path' => null,
                'content' => $request->service_description,
            ],
            [
                'name' => 'services_title1',
                'image_path' => null,
                'content' =>  $request->services_title1,
            ],
            [
                'name' => 'services_title2',
                'image_path' => null,
                'content' => $request->services_title2,
            ],
            [
                'name' => 'services_title3',
                'image_path' => null,
                'content' => $request->services_title3,
            ],
            [
                'name' => 'services_title4',
                'image_path' => null,
                'content' => $request->services_title4,
            ],
            [
                'name' => 'services_desc1',
                'image_path' => null,
                'content' => $request->services_desc1,
            ],
            [
                'name' => 'services_desc2',
                'image_path' => null,
                'content' => $request->services_desc2,
            ],
            [
                'name' => 'services_desc3',
                'image_path' => null,
                'content' => $request->services_desc3,
            ],
            [
                'name' => 'services_desc4',
                'image_path' => null,
                'content' => $request->services_desc4,
            ],
        ];
        if (!empty($data)) {
            Homepage::upsert(
                $data,
                ['name'], // Ensure unique constraint by name
                ['image_path', 'content']
            );
        }
        return redirect()->back()->with('success', 'Service updated successfully!');
     }
     else if($section == 'price')
     {
        $data = [];

        $data = [
            [
                'name' => 'price_title',
                'image_path' => null,
                'content' => $request->price_title,
            ],
            [
                'name' => 'price_description',
                'image_path' => null,
                'content' => $request->price_description,
            ],
            [
                'name' => 'price_day',
                'image_path' => null,
                'content' =>  $request->price_day,
            ],
            [
                'name' => 'price_month',
                'image_path' => null,
                'content' => $request->price_month,
            ],
            [
                'name' => 'price_year',
                'image_path' => null,
                'content' => $request->price_year,
            ],
            [
                'name' => 'price_desc1',
                'image_path' => null,
                'content' => $request->price_desc1,
            ],
            [
                'name' => 'price_desc2',
                'image_path' => null,
                'content' => $request->price_desc2,
            ],
            [
                'name' => 'price_desc3',
                'image_path' => null,
                'content' => $request->price_desc3,
            ],
        ];
        if (!empty($data)) {
            Homepage::upsert(
                $data,
                ['name'], // Ensure unique constraint by name
                ['image_path', 'content']
            );
        }
        return redirect()->back()->with('success', 'Price updated successfully!');
     }
     else if($section == 'contact')
     {
        $data = [];

        $data = [
            [
                'name' => 'contact_title',
                'image_path' => null,
                'content' => $request->contact_title,
            ],
            [
                'name' => 'contact_description',
                'image_path' => null,
                'content' => $request->contact_description,
            ],
            [
                'name' => 'location_ad',
                'image_path' => null,
                'content' =>  $request->location_ad,
            ],
            [
                'name' => 'contact_email',
                'image_path' => null,
                'content' => $request->contact_email,
            ],
            [
                'name' => 'phone_num1',
                'image_path' => null,
                'content' => $request->phone_num1,
            ],
            [
                'name' => 'phone_num2',
                'image_path' => null,
                'content' => $request->phone_num2,
            ],
            [
                'name' => 'touch_desc',
                'image_path' => null,
                'content' => $request->touch_desc,
            ],
        ];
        if (!empty($data)) {
            Homepage::upsert(
                $data,
                ['name'], // Ensure unique constraint by name
                ['image_path', 'content']
            );
        }
        return redirect()->back()->with('success', 'Contact updated successfully!');
     }

     else if($section =="footer")
     {
        if ($request->hasFile('footer_title')) {
            $footer_image = $request->file('footer_title');
            $originalName = $footer_image->getClientOriginalName();
            $destinationPath = public_path('images');
            $footer_image->move($destinationPath, $originalName);
            $footerUrl = 'images/' . $originalName;
        }
        $data = [];

        $data = [
            [
                'name' => 'footer_title',
                'image_path' => $footerUrl,
                'content' => 'footer_title',
            ],
            [
                'name' => 'footer_add',
                'image_path' => null,
                'content' => $request->footer_add,
            ],
            [
                'name' => 'footer_phone',
                'image_path' => null,
                'content' =>  $request->footer_phone,
            ],
            [
                'name' => 'footer_email',
                'image_path' => null,
                'content' => $request->footer_email,
            ],
        ];
        if (!empty($data)) {
            Homepage::upsert(
                $data,
                ['name'], // Ensure unique constraint by name
                ['image_path', 'content']
            );
        }
        return redirect()->back()->with('success', 'Footer updated successfully!');

     }

    }
}
