<?php 
if(is_user_logged_in()) {
    $text = 'Donate';
    $link = 'https://www.every.org/principledacademy?utm_campaign=donate-link#/donate/card';
    $target = '_blank';
} else {
    $text = 'Sign Up / Login';
    $link = '/login/';
    $target = '_self';
}

$text = 'Donate';
    $link = 'https://www.every.org/principledacademy?utm_campaign=donate-link#/donate/card';
    $target = '_blank';

?>

@if(!is_user_logged_in() && !is_page('login'))
    <div id="" class="z-10 p-4 sticky bottom-0 left-0 w-screen flex lg:hidden  justify-center md:justify-end" style=""><a
            href="{!! $link !!}" target="{!! $target !!}"
            class="bg-blue-main text-white rounded-[12px] py-2 px-6 flex items-center lg:bg-opacity-75 hover:bg-opacity-100">
            <span>{!! $text !!}</span>
        </a>
    </div>
@endif
