<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
class YzmController extends Controller
{
    public function anyIndex()
    {
        $phrase = new PhraseBuilder(); //生成验证码数字
        $captcha = new CaptchaBuilder($phrase->build(4));
        $captcha->build();
//        $captcha->save('out.jpg'); //存储图片
        error_log($captcha->getPhrase());
        return response($captcha->output())->header("Content-type","image/jpeg");

    }

    public function anyTest()
    {
        return view('captcha.test');
    }

}
