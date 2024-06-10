<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $provider;

    public $retryAfter = 30;

    public $tries = 3;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $transport = (new \Swift_SmtpTransport($this->provider->host, $this->provider->port))
            ->setUsername($this->provider->username)
            ->setPassword($this->provider->password);

        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message('test subject'))
            ->setFrom($this->provider->from_address, $this->provider->from_name)
            ->setTo('testuser@example.com')
            ->setBody('This is an email body');

        $mailer->send($message);
    }
}
