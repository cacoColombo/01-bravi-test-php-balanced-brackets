<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeRequest;

class HomeController extends Controller
{

    public function index() {
        $response = '';
        $bracketsString = '';
        return view('balancedbrackets', compact('response', 'bracketsString'));
    }

    public function check(HomeRequest $request) {
        $inputs = $request->all();
        $bracketsString = $inputs['bracketsString'];
        $breaks = array("\r\n", "\n", "\r");
        $bracketsString = str_replace($breaks, "", $bracketsString);
        $bracketsHeap = [];

        if (strlen($bracketsString) % 2 != 0) {
            $response = '<span class="invalid">Invalid string of brackets!</span>';
            return view('balancedbrackets', compact('response', 'bracketsString'));
        }
        else{
            for($i = 0; $i < strlen($bracketsString); $i++){
                logger($bracketsHeap);
                logger($bracketsString[$i]);
                if(sizeof($bracketsHeap) == 0) {
                    array_push($bracketsHeap, $bracketsString[$i]);
                }
                else {
                    $bracket = $bracketsString[$i];
                    switch ($bracket) {
                        case ']':
                            if(array_pop($bracketsHeap) != '[') {
                                $response = '<span class="invalid">Invalid string of brackets!</span>';
                                return view('balancedbrackets', compact('response', 'bracketsString'));
                            }
                            break;
                        case '}':
                            if(array_pop($bracketsHeap) != '{') {
                                $response = '<span class="invalid">Invalid string of brackets!</span>';
                                return view('balancedbrackets', compact('response', 'bracketsString'));
                            }
                            break;
                        case ')':
                            if(array_pop($bracketsHeap) != '(') {
                                $response = '<span class="invalid">Invalid string of brackets!</span>';
                                return view('balancedbrackets', compact('response', 'bracketsString'));
                            }
                            break;
                        default:
                            array_push($bracketsHeap, $bracket);
                            break;
                    }
                }
            }
        }
        logger('END');
        logger($bracketsHeap);
        logger(count($bracketsHeap));
        if (sizeof($bracketsHeap) != 0){
            $response = '<span class="invalid">Invalid string of brackets!</span>';
        }
        else {
            $response = '<span class="valid">Valid string of brackets!</span>';
        }
        return view('balancedbrackets', compact('response', 'bracketsString'));
    }
}
