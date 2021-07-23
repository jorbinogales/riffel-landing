<?php 

namespace App\Utils;

use Exception;
use Illuminate\Support\Facades\Storage;


trait ImageTrait
{
    /**
     * Remove previous image if it exits
     * 
     * @param $image_hat
     * @param $distk (default = 'public')
     */
    protected function deleteImage($image_path, $disk = 'public')
    {
        try{
            if(Storage::disk($disk)->exists($image_path)){
                Storage::disk($disk)->delete($image_path);
            }
            return true;
        } catch (Exception $e){
            return $e;
        }
    }

    /**
     * @param $request ( request input )
     * @param $folder ( folder name)
     * @param $toUpdate ( model to update)
     */

    protected function createImage($request, $folder, $toUpdate){

        try { 

            if($request->picture != null){

                $name = str_replace(' ','-', $request->first_name);
                $date = Date('y-m-d_h-s');

                $toUpdate->update([
                    'picture' => ($request->hasFile('picture')) 
                                ? "$name"."$date.png"
                                : null,
                ]);

                $request->file('picture')->storeAs($folder, "$name"."$date.png", 'public');

            }

        } catch (Exception $e){

            return $e;

        }
    }
}