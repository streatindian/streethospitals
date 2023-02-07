<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $data['active_tab'] = request()->query('group') ? request()->query('group') : 'general';
        return view('admin.pages.setting.index')->with($data);
    }
    public function store(Request $request)
    {
        // dd($request->all());

        try {
            $settings = $request->settings;
            $rule['company_logo'] = 'nullable|mimes:png,jpg,jpeg';
            $rule['company_logo_dark'] = 'nullable|mimes:png,jpg,jpeg';
            $rule['favicon'] = 'nullable|mimes:png,jpg,jpeg';
            $this->validate($request, $rule);
            $uploadDir    = public_path('uploads/setting');
            File::isDirectory($uploadDir) or File::makeDirectory($uploadDir, 0777, true, true);
            foreach (['company_logo', 'company_logo_dark', 'favicon'] as $file) {
                if ($request->hasFile($file)) {
                    $ImgValue     = $request->file($file);
                    $getFileExt   = $ImgValue->getClientOriginalExtension();
                    $uploadedFile =   time() . rand(0000, 9999) . '.' . $getFileExt;
                    $ImgValue->move($uploadDir, $uploadedFile);
                    $settings[$file] = $uploadedFile;
                    $setting = DB::table('settings')->get();
                    $settingArray = [];
                    foreach ($setting as $s) {
                        $settingArray[$s->option] = $s->value;
                    }
                    if ($request->id) {
                        $fileimg = Setting::where('option', $settingArray[$file])->first();
                        $oldFile = $uploadDir . '/' . $fileimg->value;
                        if (File::exists($oldFile)) {
                            File::delete($oldFile);
                        }
                    }
                }
            }
            foreach ($settings as $option => $value) {
                $matchThese = ['option' => $option];
                Setting::updateOrCreate($matchThese, ['option' => $option, 'value' => $value]);
            }
            return redirect()->back()->withInput()->with('success', 'Record Update Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage().'___'.$e->getLine());
        }
    }
}
