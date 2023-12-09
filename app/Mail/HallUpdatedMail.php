<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Hall;

class HallUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $halls;

    public function __construct(Hall $halls)
    {
        $this->halls = $halls;
    }

    public function build()
    {
        return $this->view('emails.hupdated');
    }
}
?>
