<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * ? About Us Page
     * @return Application|Factory|View
     */
    public function aboutUs(): Application|Factory|View
    {
        return view('web.page.about_us');
    }

    /**
     * ? Contact Us Page
     * @return Application|Factory|View
     */
    public function contactUs(): Application|Factory|View
    {
        return view('web.page.contact_us');
    }

    /**
     * ? FAQs Page
     * @return Application|Factory|View
     */
    public function faq(): Application|Factory|View
    {
        return view('web.page.faq');
    }

    /**
     * ? Privacy Policy Page
     * @return Application|Factory|View
     */
    public function privacyPolicy(): Application|Factory|View
    {
        return view('web.page.privacy_policy');
    }

    /**
     * ? Pricing Page
     * @return Application|Factory|View
     */
    public function pricing(): Application|Factory|View
    {
        return view('web.page.pricing');
    }

    /**
     * ? Tag Page
     * @return Application|Factory|View
     */
    public function tag(): Application|Factory|View
    {
        $tags = Tag::query()->whereHas('movies')->get();
        return view('web.page.tag', compact('tags'));
    }

}
