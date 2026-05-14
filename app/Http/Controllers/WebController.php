<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Validator;


class WebController extends Controller
{


    // $all   = $this->fetchContent('slider'); get all
    // $whos      = $this->fetchContent('who-we-are', 3); take() limit
    // Fetch only defined fields from AppServiceProvider
    private function getFields($type)
    {
        // Get globally shared contents array
        $contents = view()->shared('contents');

        // If type doesn't exist, fallback to all fields
        if (!isset($contents[$type])) {
            return ['id', 'type', 'title', 'img_path', 'short', 'status', 'created_at'];
        }

        // get field names
        $fields = array_keys($contents[$type]);

        // always include primary keys
        $fields[] = 'id';
        $fields[] = 'type';

        return $fields;
    }

    // Reusable content fetcher
    private function fetchContent($type, $limit = null, $name = null, $paginate = null)
    {
        $query = Content::select($this->getFields($type))
            ->where('type', $type)
            ->where('status', '1');

        if ($name) {
            $query->where('name', $name);
        }

        $query->orderBy('created_at', 'desc');

        if ($paginate) {
            return $query->paginate($paginate);
        }

        if ($limit == 1) {
            return $query->first();
        } elseif ($limit) {
            $query->take($limit);
        }

        return $query->get();
    }

    public function index()
    {
        $hero      = $this->fetchContent('hero', 1);
    }
    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'code'    => 'required|string',
            'phone'   => 'required|string|max:20',
            'message' => 'required|string',
        ]);
        // dd($validated);

        Contact::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'phone_code' => $validated['code'],
            'phone'      => $validated['phone'],
            'message'    => $validated['message'],
        ]);


        return redirect()->back()->with([
            'success' => 'Thank you! Your message has been sent.',
            'lead_name' => $validated['name'],
            'lead_email' => $validated['email'],
            'lead_phone' => $validated['phone'],
        ]);
    }
    public function home()
    {
        $hero = $this->fetchContent('hero', 1, 'landing-hero');
        $tabs = $this->fetchContent('hero_tab');

        $stats = $this->fetchContent('stats');
        $liveHeader = $this->fetchContent('live_project_header', 1);
        $liveProjects = $this->fetchContent('live_project');
        $projects = $this->fetchContent('project');
        $galleryHeader = $this->fetchContent('gallery_header', 1);
        $galleryImages = $this->fetchContent('gallery', null, null, 6);
        $videoHeader = $this->fetchContent('video_header', 1);

        $videos = $this->fetchContent('video_list');
        $mainVideo = $videos->first();
        $videoList = $videos->skip(1)->take(3);
        return view('frontend.index', compact(
            'hero',
            'tabs',
            'stats',
            'liveHeader',
            'liveProjects',
            'projects',
            'galleryHeader',
            'galleryImages',
            'videoHeader',
            'mainVideo',
            'videoList'
        ));
    }
    public function details()
    {
        // $hero = $this->fetchContent('hero', 1);
        // $features = $this->fetchContent('features');
        // $glance = $this->fetchContent('glance');
        // $offerings = $this->fetchContent('offerings', 4);
        // $modernSlider = $this->fetchContent('modern-slider');
        // $accommodations = $this->fetchContent('accommodations', 4);
        // $benefits = $this->fetchContent('benefits', 6);
        // $packages = $this->fetchContent('packages');
        // $experience = $this->fetchContent('experience');
        // $whyInvesting = $this->fetchContent('why-investing', 1);
        // $allEvents = $this->fetchContent('events');

        // dd($hero);
        return view('frontend.pages.details');
    }
    // company-profile
    public function companyProfile()
    {
        $about = $this->fetchContent('about-hero', 1);
        $aboutBhaiya = $this->fetchContent('about-bhaiya-group', 1);
        $housing = $this->fetchContent('about-housing', 1);
        $founder = $this->fetchContent('founder', 1);
        $chairman = $this->fetchContent('voice-of-chairman', 1);
        $ceo = $this->fetchContent('voice-of-ceo', 1);
        $brands = $this->fetchContent('brand');
        return view(
            'frontend.profile.profile',
            compact('about', 'aboutBhaiya', 'housing', 'founder', 'chairman', 'ceo', 'brands')
        );
    }
    public function whyInvest()
    {
        $glance = $this->fetchContent('glance');
        $whyInvesting = $this->fetchContent('why-investing', 1);
        $features = $this->fetchContent('features');
        $benefits = $this->fetchContent('benefits', 6);
        $packages = $this->fetchContent('packages');
        return view(
            'frontend.invest.invest',
            compact('whyInvesting', 'features', 'benefits', 'packages', 'glance')
        );
    }
    public function contact()
    {
        $contact = $this->fetchContent('contact-hero', 1);
        $contactDetails = $this->fetchContent('contact-details');
        $contactForm = $this->fetchContent('contact-form', 1);
        return view('frontend.contact.contact', compact('contact', 'contactDetails', 'contactForm'));
    }


    public function blog()
    {
        $blogs = $this->fetchContent('blogs', 10);
        return view('frontend.blog.index', compact('blogs'));
    }
    public function blogShow($slug)
    {
        $blog = Content::where('type', 'blogs')->where('name', $slug)->first();
        $blogs = $this->fetchContent('blogs', 6);
        return view('frontend.blog.show', compact('blog', 'blogs'));
    }
    public function offers()
    {
        $currentOffers = Content::where('type', 'offers')
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->orderBy('start_date', 'desc')
            ->limit(5)
            ->get();
        $previousOffers = Content::where('type', 'offers')
            ->whereDate('end_date', '<', now())
            ->orderBy('end_date', 'desc')
            ->limit(5)
            ->get();
        return view('frontend.offers.index', compact('currentOffers', 'previousOffers'));
    }
    public function offersShow($slug)
    {
        $offer = Content::where('type', 'offers')->where('name', $slug)->first();
        return view('frontend.offers.show', compact('offer'));
    }
    public function events()
    {
        $allEvents = Content::where('type', 'events')
            ->orderBy('start_date', 'desc')
            ->get();

        return view('frontend.events.index', compact(
            'allEvents'
        ));
    }
    public function eventsShow($slug)
    {
        $event = Content::where('type', 'events')
            ->where('name', $slug)
            ->firstOrFail();

        // image processing (controller)
        $images = [];

        if (!empty($event->img_paths)) {
            $decoded = json_decode($event->img_paths, true);

            if (is_array($decoded) && count($decoded)) {
                $images = $decoded;
            }
        }

        // only first image path
        $event->banner_image = $images[0] ?? null;
        return view('frontend.events.show', compact('event'));
    }
    public function eventRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_slug' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->withFragment('registerNow');
        }

        EventRegistration::create($validator->validated());

        return redirect()->back()
            ->with('success', 'Registration successful!')
            ->withFragment('registerNow');
    }
    public function pageShow($slug)
    {
        $page = Content::where('type', 'pages')->where('name', $slug)->firstOrFail();
        return view('frontend.page', compact('page'));
    }
}
