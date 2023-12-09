<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Terminal;

class TerminalUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $terminal;

    public function __construct(Terminal $terminal)
    {
        $this->terminal = $terminal;
    }

    public function build()
    {
        return $this->view('emails.tupdated');
    }
}
?>
