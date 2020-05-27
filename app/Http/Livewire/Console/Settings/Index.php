<?php

namespace App\Http\Livewire\Console\Settings;

use App\Setting;
use Livewire\Component;

class Index extends Component
{
    /**
     * publi variable
     */
    public $settingId       = '';
    public $admin_title     = '';
    public $admin_footer    = '';
    public $site_title      = '';
    public $site_footer     = '';
    public $email_recived   = '';
    public $city            = '';
    public $keywords        = '';
    public $description     = '';
    public $logo            = '';

    public function mount()
    {
        $setting = Setting::find(1);

        if($setting) {

            $this->settingId        = $setting->id;
            $this->admin_title      = $setting->admin_title;
            $this->admin_footer     = $setting->admin_footer;
            $this->site_title       = $setting->site_title;
            $this->site_footer      = $setting->site_footer;
            $this->email_recived    = $setting->email_recived;
            $this->city             = $setting->city;
            $this->keywords         = $setting->keywords;
            $this->description      = $setting->description;
            $this->logo             = $setting->logo;

        }

    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate([
            'admin_title'   => 'required',
            'admin_footer'  => 'required',
            'site_title'    => 'required',
            'site_footer'   => 'required',
            'email_recived' => 'required|email',
            'city'          => 'required',
            'keywords'      => 'required',
            'description'   => 'required',
        ]);

        $setting = Setting::find($this->settingId);
        
        if($setting) {
            
            $setting->update([
                'admin_title'   => $this->admin_title,
                'admin_footer'  => $this->admin_footer,
                'site_title'    => $this->site_title,
                'site_footer'   => $this->site_footer,
                'email_recived' => $this->email_recived,
                'city'          => $this->city,
                'keywords'      => $this->keywords,
                'description'   => $this->description,
            ]);

            session()->flash('message', 'Data updated successfully');

            redirect()->route('console.settings.index');

        }

    }

    public function render()
    {
        return view('livewire.console.settings.index');
    }
}
