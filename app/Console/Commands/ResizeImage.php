<?php

namespace App\Console\Commands;

use App\Models\Voter;
use Illuminate\Console\Command;
use Intervention\Image\ImageManagerStatic as Image;

class ResizeImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:resize-image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //get file from storage/images/voter
        $files = \File::files(storage_path('images/voter'));
        foreach ($files as $key => $file) {
            $img = Image::make($file);
            if ($img->width() > 1440) {
                $img->resize(1440, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($file);
            }
        }
    }
}
