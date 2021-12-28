<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

use Storage;
use App\Models\SiteInfo as Info;

class SiteInfo extends Component
{
    use WithFileUploads;

    public $name, $domain, $mobile, $email, $appointment_email, $pharmacy_email, $google_map, $address, $overview, $facebook_page, $facebook_group, $twitter, $linkedin, $youtube, $logo, $favicon, $header_bg;
    
    public function mount()
    {
        $info = Info::find(1);

        $this->name = $info->name ?? '';
        $this->domain = $info->domain ?? '';
        $this->mobile = $info->mobile ?? '';
        $this->email = $info->email ?? '';
        $this->appointment_email = $info->appointment_email ?? '';
        $this->pharmacy_email = $info->pharmacy_email ?? '';
        $this->google_map = $info->google_map ?? '';
        $this->address = $info->address ?? '';
        $this->overview = $info->overview ?? '';
        $this->facebook_page = $info->facebook_page ?? '';
        $this->facebook_group = $info->facebook_group ?? '';
        $this->twitter = $info->twitter ?? '';
        $this->linkedin = $info->linkedin ?? '';
        $this->youtube = $info->youtube ?? '';
    }

    public function updateInfo()
    {
        $info = Info::find(1);

        if(!Info::find(1)){
            Info::create([
                'name' => $this->name,
                'domain' => $this->domain,
                'mobile' => $this->mobile,
                'email' => $this->email,
                'appointment_email' => $this->appointment_email,
                'pharmacy_email' => $this->pharmacy_email,
                'google_map' => $this->google_map,
                'address' => $this->address,
                'overview' => $this->overview,
                'facebook_page' => $this->facebook_page,
                'facebook_group' => $this->facebook_group,
                'twitter' => $this->twitter,
                'linkedin' => $this->linkedin,
                'youtube' => $this->youtube,                
                'created_by' => auth()->id(),
                'created_at' => now(),
            ]);
        }else{
            Info::find(1)->update([
                'name' => $this->name,
                'domain' => $this->domain,
                'mobile' => $this->mobile,
                'email' => $this->email,
                'appointment_email' => $this->appointment_email,
                'pharmacy_email' => $this->pharmacy_email,
                'google_map' => $this->google_map,
                'address' => $this->address,
                'overview' => $this->overview,
                'facebook_page' => $this->facebook_page,
                'facebook_group' => $this->facebook_group,
                'twitter' => $this->twitter,
                'linkedin' => $this->linkedin,
                'youtube' => $this->youtube,                
                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);
        }
        

        if($info){
            if($this->logo){

                Storage::delete($info->logo);

                $info->logo = $this->logo->store('images/resources');
                $info->save();

            }
            if($this->favicon){

                Storage::delete($info->favicon);

                $info->favicon = $this->favicon->store('images/resources');
                $info->save();

            }
            if($this->header_bg){

                Storage::delete($info->header_bg);

                $info->header_bg = $this->header_bg->store('images/backgrpund');
                $info->save();
            }
        }

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.site-info')->extends('layouts.admin');
    }
}
