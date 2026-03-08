<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateLangJson extends Command
{
    protected $signature = 'lang:generate {locale=en}';
    protected $description = 'Scan and extract translatable strings from views and controllers into a JSON language file.';

    public function handle()
    {
        $locale = $this->argument('locale');
        $jsonPath = resource_path("lang/{$locale}.json");

        // Ensure the lang directory exists
        if (!File::exists(resource_path('lang'))) {
            File::makeDirectory(resource_path('lang'), 0777, true, true);
        }

        // Scan files for translation keys
        $translationKeys = $this->scanForTranslations(base_path('resources/views'));
        $translationKeys = array_merge($translationKeys, $this->scanForTranslations(base_path('app')));

        // Load existing translations
        $existingTranslations = File::exists($jsonPath) ? json_decode(File::get($jsonPath), true) : [];

        // Merge new keys with existing translations
        $mergedTranslations = array_merge($translationKeys, $existingTranslations);

        // Save to JSON
        File::put($jsonPath, json_encode($mergedTranslations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $this->info("Translations have been extracted to {$jsonPath}");
    }

    private function scanForTranslations($directory)
    {
        $files = File::allFiles($directory);
        $translations = [];

        foreach ($files as $file) {
            $content = File::get($file);

            // Match all __('text') and trans('text')
            preg_match_all("/__\(['\"](.+?)['\"]\)/", $content, $matches);
            preg_match_all("/trans\(['\"](.+?)['\"]\)/", $content, $matches2);

            $allMatches = array_merge($matches[1], $matches2[1]);

            foreach ($allMatches as $match) {
                if (!empty($match) && !isset($translations[$match])) {
                    $translations[$match] = $match; // Default value = key itself
                }
            }
        }

        return $translations;
    }
}
