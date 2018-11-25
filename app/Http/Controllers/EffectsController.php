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
}
