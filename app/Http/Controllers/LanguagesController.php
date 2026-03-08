<?php

namespace App\Http\Controllers;


use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class LanguagesController extends Controller
{
    public function index()
    {

        $name ='Language';
        $type ='language';

        $languages = Language::orderBy('id', 'desc')->paginate(10);
        return view('admin.pages.language.index', compact('languages','name','type'));
    }

    public function add()
    {

        $name ='Language';
        $type ='language';


        return view('admin.pages.language.add',compact('name','type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'language' => 'required|string|unique:languages,language',
            'iso_code' => 'required|unique:languages,iso_code',
        ]);

        $language = new Language();
        $language->language = $request->language;
        $language->iso_code = strtolower($request->iso_code);
        $language->save();

        // Ensure the lang directory exists
        $langPath = resource_path("lang");
        if (!File::exists($langPath)) {
            File::makeDirectory($langPath, 0777, true);
        }

        // Create an empty JSON file for the new language
        $path = resource_path("lang/{$language->iso_code}.json");
        File::put($path, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return redirect()->route('admin.languages.edit', Language::latest()->first()->id)->with('success', 'Language added successfully');
    }
    

    public function edit($id)
    {
        $name ='Language';
        $type ='language';

        $language = Language::findOrFail($id);
        return view('admin.pages.language.edit', compact('language','name','type'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'language' => 'required|string|unique:languages,language,' . $id,
            'iso_code' => 'required|' . $id . '|size:2',
        ]);

        $language = Language::findOrFail($id);
        $language->language = $request->language;
        $language->iso_code = strtolower($request->iso_code);
        $language->save();


        

        return redirect()->route('admin.languages.edit', $id)->with('success', 'Language updated successfully');
    }

    public function delete($id)
    {
        $language = Language::findOrFail($id);
        $language->delete();

        return redirect()->route('admin.languages.index')->with('success', 'Language deleted successfully');
    }


    public function translate($id)
{
    $language = Language::findOrFail($id);
    $iso_code = $language->iso_code;

    $path = resource_path("lang/{$iso_code}.json");

    if (!file_exists($path)) {
        file_put_contents($path, json_encode([]));
    }

    $translations = json_decode(file_get_contents($path), true);

    return view('admin.pages.language.translate', compact('language', 'translations'));
}

public function updateTranslation(Request $request, $id)
{
    $language = Language::findOrFail($id);
    $iso_code = $language->iso_code;

    // Ensure that keys and values are properly set
    if (!is_array($request->keys) || !is_array($request->values) || count($request->keys) !== count($request->values)) {
        return redirect()->back()->with('error', 'Invalid translation data.');
    }

    $translations = array_combine($request->keys, $request->values);
    
    $path = resource_path("lang/{$iso_code}.json");
    file_put_contents($path, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    return redirect()->back()->with('success', 'Translations updated successfully.');
}




    // Change the application language
    public function switchLanguage($iso_code)
    {
        $language = Language::where('iso_code', $iso_code)->first();
    
        if ($language) {
            session(['local' => $iso_code]);
            App::setLocale($iso_code);
    
            // Debugging: Check session value
            \Log::info('Language switched to: ' . session('local'));
    
            // Run the Artisan command to regenerate translations
            \Artisan::call('lang:generate', ['locale' => $iso_code]);
        } else {
            return redirect()->back()->with('error', 'Language not found.');
        }
    
        return redirect()->back()->with('success', 'Language . ' . $language->language . ' Translate Successfully');
    }
    



}
