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
        $mailer->send('emails.reminder',['adminuser'=>$this->user],function($message){
            $to = 'lipeng@baicheng.com';
            $message ->to($to)->subject('测试邮件');
        });
//        $this->adminuser->reminders()->create();
    }
}
