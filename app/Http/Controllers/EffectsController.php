<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebContent;

class EffectsController extends Controller
{
    public function galleryGlitch (Request $request, $id)
    {
        $url = '/events/'.$id;

        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect($url);
        }

        $glitch = WebContent::find(20);

        if ($glitch == null) {
            if (WebContent::find(19) == null) {
                $feature = new WebContent;
                $feature->content = $id;
                $feature->save();
            }
            $glitch = new WebContent;
            $glitch->content = '1';
            $glitch->save();

            flash('Glitch Successfully removed');

            return redirect($url);
        }

        if ($glitch->content == '0') {
            $glitch->content = '1';

            flash('Glitch Successfully removed');
        } else {
            $glitch->content = '0';

            flash('Glitch Successfully put back');
        }

        $glitch->save();

        return redirect($url);
    }

    public function internationalPartners (Request $request)
    {
        $partner = WebContent::find(21);
        $message = "International Partners Removed";

        if ($partner == null) {
            $content1 = WebContent::find(20);

            if ($content1 == null) {
                $content2 = WebContent::find(20);

                if ($content2 == null) {
                    $content2 = new WebContent;
                    $content2->content = 0;
                    $content2->save();
                }

                $content1 = new WebContent;
                $content1->content = 0;
                $content1->save();
            }

            $partner = new WebContent;
            $partner->content = 1;
            $partner->save();

            flash($message)->success();

            return back();
        }

        if ($partner->content == 1) {
            $partner->content = 0;
            $partner->save();
            
            $message = "International Partners Shown";
        } else {
            $partner->content = 1;
            $partner->save();
        }

        flash($message)->success();

        return back();
    }
}
