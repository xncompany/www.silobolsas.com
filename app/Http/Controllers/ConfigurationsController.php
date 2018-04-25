<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Repositories\ConfigurationsRepository;

class ConfigurationsController extends Controller
{

    /**
     * get current system configurations
     *
     * @return Response
     */
    public function list() {
    	$configurations = (new ConfigurationsRepository)->list();
        return view('configurations')->with('list', $configurations);
    }

    /**
     * update system configurations
     *
     * @return Response
     */
    public function update(Request $request) {

        $items = array();

        # group by mysql id
        foreach ($request->all() as $key => $val) {
            list($id, $action) = explode('_', $key);
            $items[$id][$action] = $val;
        }

        # parse data to be processed by API
        $data = array();
        foreach ($items as $id => $values) {
            $data[] = array('id' => $id, 'rangeA' => $values['from'], 'rangeB' => $values['to']);
        }

        # http x-www-form-urlencoded body
        $body = http_build_query($data);

        # go!
        $isOk = (new ConfigurationsRepository)->update($body);

        $configurations = (new ConfigurationsRepository)->list();

        return view('configurations')->with('list', $configurations)->with('status', $isOk);
    }
}
