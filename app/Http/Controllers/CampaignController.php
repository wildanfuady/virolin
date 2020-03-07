<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Landingpage;
use App\Campaign;
use App\ListSubscriber;
use App\Form;
use App\Template;
use App\Autoresponder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use Input;

class CampaignController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('permission:landingpage-list|landingpage-create|landingpage-edit|landingpage-delete', ['only' => ['index','store']]);
        $this->middleware('permission:landingpage-create', ['only' => ['create','store']]);
        $this->middleware('permission:landingpage-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:landingpage-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $keyword = $request->query('keyword');
        $paginate = 10;
        $user_id = Auth::user()->id;
        $where = [];
        $orwhere = [];

        if(!empty($keyword)) {
            $where[] = ['campaign_name', 'LIKE', "%{$keyword}%"];
            $orwhere[] = ['campaign_slug', 'LIKE', "%{$keyword}%"];
        }

        if(empty($keyword)) {
            $data['campaign'] = Campaign::where('user_id', $user_id)
                ->paginate($paginate);
        } else {
            $data['campaign'] = Campaign::where('user_id', $user_id)
            ->where($where)
            ->orWhere($orwhere)
            ->paginate($paginate);
        }
        $data['keyword'] = $keyword;
        
        return view('campaign.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['template_id'] = rand(0000000000, 9999999999);
        $data['list_sub'] = ListSubscriber::where('list_sub_status', 'Active')->pluck('list_sub_name', 'list_sub_id');
        return view('campaign.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'campaign_name.required' => 'Nama Campaign wajib diisi.',
            'campaign_name.regex' => 'Nama Campaign hanya boleh berisi huruf, angka dan spasi.',
            'campaign_name.max' => 'Nama Campaign maksimal 50 karakter.',
            'campaign_group.required' => 'List Subscriber wajib diisi.',
            'campaign_form_telp.required' => 'No Telp wajib diisi.',
            'campaign_form_address.required' => 'Alamat wajib diisi.',
            'campaign_subject_thank_email.required' => 'Subject Thank Email wajib diisi.',
            'campaign_subject_confirm_email.required' => 'Subject Konfirmasi Email wajib diisi.',
            'campaign_confirm.required' => 'Teks Konfirmasi Email wajib diisi.',
            'campaign_form_thank.required' => 'Teks Thank Email wajib diisi.',
            'template_id.required' => 'Template wajib diisi.',
            'block1_bg.required' => 'Background Block 1 wajib diisi.',
            'block1_headline1.required' => 'Headline 1 Block 1 wajib diisi.',
            'block1_headline2.required' => 'Headline 2 Block 1 wajib diisi.',
            'block1_btn_text.required' => 'Teks Button Block 1 wajib diisi.',
            'block1_btn_text_color.required' => 'Warna Teks Button Block 1 wajib diisi.',
            'block1_btn_text_bg.required' => 'Background Button Block 1 wajib diisi.',
            'block2_text_edukasi.required' => 'Teks Edukasi Block 2 wajib diisi.',
            'block3_bg.required' => 'Background Block 3 wajib diisi.',
            'block3_headline.required' => 'Headline Block 3 wajib diisi.',
            'block3_alasan1_icon.required' => 'Icon Alasan 1 Block 3 wajib diisi.',
            'block3_alasan1_text.required' => 'Teks Alasan 1 Block 3 wajib diisi.',
            'block3_alasan2_icon.required' => 'Icon Alasan 2 Block 3 wajib diisi.',
            'block3_alasan2_text.required' => 'Teks Alasan 2 Block 3 wajib diisi.',
            'block3_alasan3_icon.required' => 'Icon Alasan 3 Block 3 wajib diisi.',
            'block3_alasan3_text.required' => 'Teks Alasan 3 Block 3 wajib diisi.',
            'block3_alasan4_icon.required' => 'Icon Alasan 4 Block 3 wajib diisi.',
            'block3_alasan4_text.required' => 'Teks Alasan 4 Block 3 wajib diisi.',
            'block4_bg.required' => 'Background Block 4 wajib diisi.',
            'block4_bg_headline.required' => 'Background Headline Block 4 wajib diisi.',
            'block4_text_headline.required' => 'Teks Headline Block 4 wajib diisi.',
            'block4_text_headline_desc.required' => 'Teks Deskripsi Headline Block 4 wajib diisi.',
            'block4_image.required' => 'Gambar Block 4 wajib diisi.',
            'block5_bg.required' => 'Background Block 5 wajib diisi.',
            'block5_text.required' => 'Teks Block 5 wajib diisi.',
            'block6_bg.required' => 'Background Block 6 wajib diisi.',
            'block6_text_headline.required' => 'Headline Block 6 wajib diisi.',
            'block7_faq.required' => 'Faq Block 7 wajib diisi.',
            'block8_bg.required' => 'Background Block 8 wajib diisi.',
            'block8_headline.required' => 'Headline Block 8 wajib diisi.',
            'block8_text_button.required' => 'Button Teks Block 8 wajib diisi.',
            'block8_text_color_button.required' => 'Warna Teks Button Block 8 wajib diisi.',
            'block8_button_bg_color.required' => 'Background Button Block 8 wajib diisi.',
        ];
        $rules = [
            'campaign_name' => 'required|regex:/^[a-zA-Z0-9 ]+$/u|max:50',
            'campaign_group' => 'required',
            'campaign_form_telp' => 'required',
            'campaign_form_address' => 'required',
            'campaign_subject_thank_email' => 'required',
            'campaign_form_thank' => 'required',
            'campaign_subject_confirm_email' => 'required',
            'campaign_confirm' => 'required',
            'campaign_text_share' => 'required',
            'template_id' => 'required',
            'block1_bg' => 'required',
            'block1_headline1' => 'required',
            'block1_headline2' => 'required',
            'block1_btn_text' => 'required',
            'block1_btn_text_color' => 'required',
            'block1_btn_text_bg' => 'required',
            'block2_text_edukasi' => 'required',
            'block3_bg' => 'required',
            'block3_image' => 'required',
            'block3_headline' => 'required',
            'block3_alasan1_icon' => 'required',
            'block3_alasan1_text' => 'required',
            'block3_alasan2_icon' => 'required',
            'block3_alasan2_text' => 'required',
            'block3_alasan3_icon' => 'required',
            'block3_alasan3_text' => 'required',
            'block3_alasan4_icon' => 'required',
            'block3_alasan4_text' => 'required',
            'block4_bg' => 'required',
            'block4_bg_headline' => 'required',
            'block4_text_headline' => 'required',
            'block4_text_headline_desc' => 'required',
            'block4_image' => 'required',
            'block5_bg' => 'required',
            'block5_text' => 'required',
            'block6_bg' => 'required',
            'block6_image' => 'required',
            'block6_text_headline' => 'required',
            'block7_faq' => 'required',
            'block8_bg' => 'required',
            'block8_headline' => 'required',
            'block8_text_button' => 'required',
            'block8_text_color_button' => 'required',
            'block8_button_bg_color' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $name = $request->campaign_name;
        $char = array ('{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','-','/','\\',',','.','#',':',';','\'','"','[',']');
        $del_char = strtolower(str_replace($char, "", $name));
        $slug = strtolower(str_replace(' ', '-', $del_char));

        if(empty($request->campaign_form_telp)){
            $telp = "Tidak";
        } else {
            $telp = "Ya";
        }

        if(empty($request->campaign_form_address)){
            $address = "Tidak";
        } else {
            $address = "Ya";
        }

        // generate text wa
        $text = nl2br($request->campaign_text_share);
        $char1 = str_replace(" ", "%20", $text);
        $char2 = str_replace("<br%20/>", "%0A", $char1);

        $campaign = new Campaign();

        $campaign->campaign_name            = $name; 
        $campaign->campaign_slug            = $slug; 
        $campaign->campaign_form_hp         = $telp; 
        $campaign->campaign_form_address    = $address; 
        $campaign->campaign_template        = $request->template_id;
        $campaign->campaign_subject_thank_email     = $request->campaign_subject_thank_email;
        $campaign->campaign_form_thank      = $request->campaign_form_thank;
        $campaign->campaign_subject_confirm_email   = $request->campaign_subject_confirm_email;
        $campaign->campaign_confirm         = $request->campaign_confirm;
        $campaign->campaign_text_share      = $char2;
        $campaign->user_id                  = Auth::user()->id; 
        $campaign->campaign_group           = $request->campaign_group; 
        $campaign->campaign_form_view       = 0; 

        $simpanCampaign = $campaign->save();

        $template = new Template();

        $template->template_id              = $request->template_id;
        $template->block1_bg                = $request->block1_bg;
        $template->block1_headline1         = $request->block1_headline1;
        $template->block1_headline2         = $request->block1_headline2;
        $template->block1_btn_text          = $request->block1_btn_text;
        $template->block1_btn_text_color    = $request->block1_btn_text_color;
        $template->block1_btn_text_bg       = $request->block1_btn_text_bg;
        $template->block1_headline2_color   = $request->block1_headline2_color;

        $template->block2_text_edukasi      = $request->block2_text_edukasi;

        $image3 = $request->file('block3_image')
                ->store('block3', 'public');

        $template->block3_bg                = $request->block3_bg;
        $template->block3_headline          = $request->block3_headline;
        $template->block3_image             = $image3;
        $template->block3_alasan1_icon      = $request->block3_alasan1_icon;
        $template->block3_alasan1_text      = $request->block3_alasan1_text;
        $template->block3_alasan2_icon      = $request->block3_alasan2_icon;
        $template->block3_alasan2_text      = $request->block3_alasan2_text;
        $template->block3_alasan3_icon      = $request->block3_alasan3_icon;
        $template->block3_alasan3_text      = $request->block3_alasan3_text;
        $template->block3_alasan4_icon      = $request->block3_alasan4_icon;
        $template->block3_alasan4_text      = $request->block3_alasan4_text;
        $template->block3_headline_color    = $request->block3_headline_color;
        $template->block3_text_alasan_color = $request->block3_text_alasan_color;

        $image4 = $request->file('block4_image')
                ->store('block4', 'public');

        $template->block4_bg                = $request->block4_bg;
        $template->block4_bg_headline       = $request->block4_bg_headline;
        $template->block4_text_headline     = $request->block4_text_headline;
        $template->block4_text_headline_desc= $request->block4_text_headline_desc;
        $template->block4_image             = $image4;
        $template->block4_text_headline_color= $request->block4_text_headline_color;

        $template->block5_bg                = $request->block5_bg;
        $template->block5_text              = $request->block5_text;

        $image6 = $request->file('block6_image')
                ->store('block6', 'public');

        $template->block6_bg                = $request->block6_bg;
        $template->block6_text_headline     = $request->block6_text_headline;
        $template->block6_image             = $image6;
        $template->block6_text_headline_color= $request->block6_text_headline_color;

        $template->block7_faq               = $request->block7_faq;

        $template->block8_bg                = $request->block8_bg;
        $template->block8_headline          = $request->block8_headline;
        $template->block8_text_button       = $request->block8_text_button;
        $template->block8_text_color_button = $request->block8_text_color_button;
        $template->block8_button_bg_color   = $request->block8_button_bg_color;

        $simpanTemplate = $template->save();

        if($simpanCampaign && $simpanTemplate){
            return redirect()->route('campaign.index')->with('success', 'Created Campaign Successfully');
        }
        
    }

    public function detail_campaign($slug)
    {
        $campaign = Campaign::where('campaign_slug', $slug)->first();

        if(empty($campaign)){
            // not found
            echo "Tak ada data";
        }

        return view('campaign.detail', compact('campaign'));
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
    public function edit($id)
    {
        $campaign = Campaign::join('templates', 'templates.template_id', '=', 'campaigns.campaign_template')->where('campaign_id', $id)->first();

        if(empty($campaign)){
            return redirect(url('campaign'))->with('warning', 'Halaman yang Anda cari tidak tersedia');
        } else {
            $list_sub = ListSubscriber::where('list_sub_status', 'Active')->pluck('list_sub_name', 'list_sub_id');
            return view('campaign.edit', compact('campaign', 'list_sub'));
        }
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
        $messages = [
            'campaign_name.required' => 'Nama Campaign wajib diisi.',
            'campaign_name.regex' => 'Nama Campaign hanya boleh berisi huruf, angka dan spasi.',
            'campaign_name.max' => 'Nama Campaign maksimal 50 karakter.',
            'campaign_group.required' => 'List Subscriber wajib diisi.',
            'campaign_form_telp.required' => 'No Telp wajib diisi.',
            'campaign_form_address.required' => 'Alamat wajib diisi.',
            'campaign_subject_thank_email.required' => 'Subject Thank Email wajib diisi.',
            'campaign_subject_confirm_email.required' => 'Subject Konfirmasi Email wajib diisi.',
            'campaign_confirm.required' => 'Teks Konfirmasi Email wajib diisi.',
            'campaign_form_thank.required' => 'Teks Thank Email wajib diisi.',
            'template_id.required' => 'Template wajib diisi.',
            'block1_bg.required' => 'Background Block 1 wajib diisi.',
            'block1_headline1.required' => 'Headline 1 Block 1 wajib diisi.',
            'block1_headline2.required' => 'Headline 2 Block 1 wajib diisi.',
            'block1_btn_text.required' => 'Teks Button Block 1 wajib diisi.',
            'block1_btn_text_color.required' => 'Warna Teks Button Block 1 wajib diisi.',
            'block1_btn_text_bg.required' => 'Background Button Block 1 wajib diisi.',
            'block2_text_edukasi.required' => 'Teks Edukasi Block 2 wajib diisi.',
            'block3_bg.required' => 'Background Block 3 wajib diisi.',
            'block3_headline.required' => 'Headline Block 3 wajib diisi.',
            'block3_alasan1_icon.required' => 'Icon Alasan 1 Block 3 wajib diisi.',
            'block3_alasan1_text.required' => 'Teks Alasan 1 Block 3 wajib diisi.',
            'block3_alasan2_icon.required' => 'Icon Alasan 2 Block 3 wajib diisi.',
            'block3_alasan2_text.required' => 'Teks Alasan 2 Block 3 wajib diisi.',
            'block3_alasan3_icon.required' => 'Icon Alasan 3 Block 3 wajib diisi.',
            'block3_alasan3_text.required' => 'Teks Alasan 3 Block 3 wajib diisi.',
            'block3_alasan4_icon.required' => 'Icon Alasan 4 Block 3 wajib diisi.',
            'block3_alasan4_text.required' => 'Teks Alasan 4 Block 3 wajib diisi.',
            'block4_bg.required' => 'Background Block 4 wajib diisi.',
            'block4_bg_headline.required' => 'Background Headline Block 4 wajib diisi.',
            'block4_text_headline.required' => 'Teks Headline Block 4 wajib diisi.',
            'block4_text_headline_desc.required' => 'Teks Deskripsi Headline Block 4 wajib diisi.',
            'block5_bg.required' => 'Background Block 5 wajib diisi.',
            'block5_text.required' => 'Teks Block 5 wajib diisi.',
            'block6_bg.required' => 'Background Block 6 wajib diisi.',
            'block6_text_headline.required' => 'Headline Block 6 wajib diisi.',
            'block7_faq.required' => 'Faq Block 7 wajib diisi.',
            'block8_bg.required' => 'Background Block 8 wajib diisi.',
            'block8_headline.required' => 'Headline Block 8 wajib diisi.',
            'block8_text_button.required' => 'Button Teks Block 8 wajib diisi.',
            'block8_text_color_button.required' => 'Warna Teks Button Block 8 wajib diisi.',
            'block8_button_bg_color.required' => 'Background Button Block 8 wajib diisi.',
        ];
        $rules = [
            'campaign_name' => 'required|regex:/^[a-zA-Z0-9 ]+$/u|max:50',
            'campaign_group' => 'required',
            'campaign_form_telp' => 'required',
            'campaign_form_address' => 'required',
            'campaign_subject_thank_email' => 'required',
            'campaign_form_thank' => 'required',
            'campaign_subject_confirm_email' => 'required',
            'campaign_confirm' => 'required',
            'campaign_text_share' => 'required',
            'template_id' => 'required',
            'block1_bg' => 'required',
            'block1_headline1' => 'required',
            'block1_headline2' => 'required',
            'block1_btn_text' => 'required',
            'block1_btn_text_color' => 'required',
            'block1_btn_text_bg' => 'required',
            'block2_text_edukasi' => 'required',
            'block3_bg' => 'required',
            'block3_headline' => 'required',
            'block3_alasan1_icon' => 'required',
            'block3_alasan1_text' => 'required',
            'block3_alasan2_icon' => 'required',
            'block3_alasan2_text' => 'required',
            'block3_alasan3_icon' => 'required',
            'block3_alasan3_text' => 'required',
            'block3_alasan4_icon' => 'required',
            'block3_alasan4_text' => 'required',
            'block5_bg' => 'required',
            'block5_text' => 'required',
            'block6_bg' => 'required',
            'block6_text_headline' => 'required',
            'block7_faq' => 'required',
            'block8_bg' => 'required',
            'block8_headline' => 'required',
            'block8_text_button' => 'required',
            'block8_text_color_button' => 'required',
            'block8_button_bg_color' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $name = $request->campaign_name;
        $char = array ('{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','-','/','\\',',','.','#',':',';','\'','"','[',']');
        $del_char = strtolower(str_replace($char, "", $name));
        $slug = strtolower(str_replace(' ', '-', $del_char));

        if(empty($request->campaign_form_telp)){
            $telp = "Tidak";
        } else {
            $telp = "Ya";
        }

        if(empty($request->campaign_form_address)){
            $address = "Tidak";
        } else {
            $address = "Ya";
        }

        // generate text wa
        $text = $request->campaign_text_share;
        $char1 = str_replace(" ", "%20", $text);
        $char2 = str_replace("<br%20/>", "%0A", $char1);

        $campaign = Campaign::find($id);

        $campaign->campaign_name            = $name; 
        $campaign->campaign_slug            = $slug; 
        $campaign->campaign_form_hp         = $telp; 
        $campaign->campaign_form_address    = $address; 
        $campaign->campaign_template        = $request->template_id;
        $campaign->campaign_subject_thank_email     = $request->campaign_subject_thank_email;
        $campaign->campaign_form_thank      = $request->campaign_form_thank;
        $campaign->campaign_subject_confirm_email   = $request->campaign_subject_confirm_email;
        $campaign->campaign_confirm         = $request->campaign_confirm;
        $campaign->campaign_text_share      = $char2;
        $campaign->user_id                  = Auth::user()->id; 
        $campaign->campaign_group           = $request->campaign_group; 

        $updateCampaign = $campaign->save();

        $template = Template::find($request->template_id);

        $template->block1_bg                = $request->block1_bg;
        $template->block1_headline1         = $request->block1_headline1;
        $template->block1_headline2         = $request->block1_headline2;
        $template->block1_btn_text          = $request->block1_btn_text;
        $template->block1_btn_text_color    = $request->block1_btn_text_color;
        $template->block1_btn_text_bg       = $request->block1_btn_text_bg;

        $template->block2_text_edukasi      = $request->block2_text_edukasi;

        if(!empty($request->file('block3_image'))){
            $image3 = $request->file('block3_image')
                    ->store('block3', 'public');
            $template->block3_image             = $image3;
        }

        $template->block3_bg                = $request->block3_bg;
        $template->block3_headline          = $request->block3_headline;
        $template->block3_alasan1_icon      = $request->block3_alasan1_icon;
        $template->block3_alasan1_text      = $request->block3_alasan1_text;
        $template->block3_alasan2_icon      = $request->block3_alasan2_icon;
        $template->block3_alasan2_text      = $request->block3_alasan2_text;
        $template->block3_alasan3_icon      = $request->block3_alasan3_icon;
        $template->block3_alasan3_text      = $request->block3_alasan3_text;
        $template->block3_alasan4_icon      = $request->block3_alasan4_icon;
        $template->block3_alasan4_text      = $request->block3_alasan4_text;

        if(!empty($request->file('block3_image'))){
            $image4 = $request->file('block4_image')
                ->store('block4', 'public');
            $template->block4_image             = $image4;
        }

        $template->block4_bg                = $request->block4_bg;
        $template->block4_bg_headline       = $request->block4_bg_headline;
        $template->block4_text_headline     = $request->block4_text_headline;
        $template->block4_text_headline_desc= $request->block4_text_headline_desc;

        $template->block5_bg                = $request->block5_bg;
        $template->block5_text              = $request->block5_text;

        if(!empty($request->file('block3_image'))){
            $image6 = $request->file('block6_image')
                ->store('block6', 'public');
            $template->block6_image             = $image6;
        }

        $template->block6_bg                = $request->block6_bg;
        $template->block6_text_headline     = $request->block6_text_headline;

        $template->block7_faq               = $request->block7_faq;

        $template->block8_bg                = $request->block8_bg;
        $template->block8_headline          = $request->block8_headline;
        $template->block8_text_button       = $request->block8_text_button;
        $template->block8_text_color_button = $request->block8_text_color_button;
        $template->block8_button_bg_color   = $request->block8_button_bg_color;

        $updateTemplate = $template->save();

        if($updateCampaign && $updateTemplate){
            return redirect()->route('campaign.index')->with('info', 'Updated Campaign Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campaign = Campaign::find($id);

        $template_id = $campaign->campaign_template;

        $template = Template::find($template_id);
        $hapus_template = $template->delete();

        if($hapus_template){
            $campaign->delete();
            return redirect()->route('campaign.index')->with('warning', 'Deleted Campaign Successfully');
        }
        
    }

    public function custom()
    {
        return view('campaign/create/index');
    }

    public function share()
    {
        // $id = 12;
        $campaign = Campaign::where('campaign_id', 12)->first();
        if(!empty($campaign)){
            $campaign->campaign_form_view += 1;
            $campaign->save(); 
        }
        return view('campaign/share');
    }

    public function send(Request $request)
    {
        $rules = [
            'fullname' => 'required|string|regex:/^[a-zA-Z]+$/u|max:35',
            'email' => 'required|email'
        ];

        $messages = [
            'fullname.required' => 'Nama Lengkap wajib diisi',
            'fullname.string' => 'Nama Lengkap hanya boleh berupa huruf dan angka',
            'fullname.regex' => 'Nama Lengkap hanya boleh berupa huruf dan angka',
            'fullname.max' => 'Nama Lengkap maksimal 35 karakter termasuk spasi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email yang Anda masukan tidak valid',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect(url('ecourse/failed'))->withErrors($validator)->withInput($request->all());
        }

        $fullname = $request->fullname;
        $email = $request->email;

        $sub = new \App\Subscribers;

        $sub->subscriber_name = $fullname;
        $sub->subscriber_email = $email;
        $sub->subscriber_nohp = "Tidak";
        $sub->subscriber_alamat = "Tidak";
        $sub->subscriber_verifikasi = "Tidak";
        $sub->user_id = 24;
        $sub->lp_id = 12;
        $sub->list_sub_id = 5;
        $simpan = $sub->save();

        if($simpan){
            return redirect(url('ecourse/thanks'));
        }

    }

    public function failed()
    {
        return view('campaign.failed');
    }

    public function thanks()
    {
        return view('campaign.thanks');
    }
}
