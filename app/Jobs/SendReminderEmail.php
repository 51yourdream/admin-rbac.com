<?php

namespace App\Jobs;

use App\User;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;

class SendReminderEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $user;

    /**
     * SendReminderEmail constructor.
     * @param AdminUser $adminuser
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        /**
         * 参数1:表示视图文件
         * 参数2:表示数据
         * 参数3:表示回调函数
         */
        $name= "1014404765@qq.com";
        $mailer->send('emails.reminder',['adminuser'=>$this->user],function($message) use ($name){
            $to = $name;
            $message ->to($to)->subject('测试邮件');
            $message->cc('1441885890@qq.com'); //抄送
        });
//        $this->adminuser->reminders()->create();
    }
}
