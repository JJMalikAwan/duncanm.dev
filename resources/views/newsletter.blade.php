@extends('layouts.app')

@section('title', 'Newsletter')

@section('content')
    <div class="mini-container">
        <header class="border-b-2 border-gray-400 mb-6 px-2 py-4">
            <h1 class="text-4xl mb-2">Newsletter</h1>
        </header>

        <div class="content-area">
            <p>Every so often I send out a little newsletter with either things to do with web development or some random thoughts I've had.</p>
            <p>I promise I won't spam you or sell your email to third parties because I hate it when people do that to me.</p>

            <form class="newsletter-signup-form" method="POST" action="https://sibforms.com/serve/MUIEAK9NETMtManh82fVl58DMNOcF4BNA_emL6WizdSD96u47O-YuTeQMwPT48-B8huNwwjRAH5O79bVVi4mhcKD00kPVzhRXu9j671x5DpujV9xO8Ey6Q1rA_YiFc1h_aTd5iKucbTSDLlroJvZpeVdrGuAV1HgDv4zGrjq2SiJLB9LJ6WbyItI5Fvdbhqy-mN7Wxg7hoaZjCsl">
                <div>
                    <label for="email">E-mail Address</label>
                    <input type="email" name="email" placeholder="duncan@example.com" required>
                </div>

                <button type="submit">Sign me up!</button>

                <input class="hidden" type="text" name="email_address_check" value="">
                <input type="hidden" name="locale" value="en">
                <input type="hidden" name="html_type" value="simple">
            </form>
        </div>
    </div>
@endsection
