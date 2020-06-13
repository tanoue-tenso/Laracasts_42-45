<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMe extends Mailable
{
    use Queueable, SerializesModels;

    public $topic; // memo: blade内に変数を渡したいときに使う( bladeに渡す記述は不要 )

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($topic)
    {
        $this->topic = $topic;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact-me') // memo: ここに送りたいテンプレートが書かれたbladeを指定
                        ->subject('More information about ' . $this->topic);
    }
}
