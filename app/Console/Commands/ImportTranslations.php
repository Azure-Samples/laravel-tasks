<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Lib\LoggerInfo;
use App\Models\Video;
use App\Models\Translation;
use Storage;

class ImportTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:translation {file_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the translation json file';

    protected $log;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set("memory_limit","20000M");
        $this->log = new LoggerInfo($this->signature, 'daily');

        $file_name = $this->argument('file_name');
        $this->log->info("file_name: {$file_name}");

        // check video that already registered or not
        $exist_data = Video::where('youtube_video_id', $file_name)->first(); 
        if($exist_data) {
            $this->log->commandOutput([
                "Import stopped, same youtube id exist."
            ]);
            return;
        }

        $video = Video::create(['youtube_video_id' => $file_name]);
        $videoId = $video->id;

        $jsons = Storage::disk('public')->get($file_name);
        $jsons = json_decode($jsons, true);

        DB::transaction(function () use ($jsons, $videoId){
            foreach($jsons AS $json) {
                Translation::create([
                    'video_id' => $videoId,
                    'jp' => $json['jp'],
                    'tw' => $json['tw'],
                    'start' => $json['start'],
                    'end' => $json['end']
                ]);
            }
        });


        $this->log->commandOutput([
            "Import finish"
        ]);
    }
}
