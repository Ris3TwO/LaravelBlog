<?php $url = $post->iframe; ?>
@if (strpos($url,'youtube') !== false)
    <?php
        $partes = parse_url($url);
        $url = str_replace("v=", "", $partes);
        $iframe = "https://www.youtube.com/embed/" . $url['query']; 
    ?> 
    <iframe src="{!! $iframe !!}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>    
@else
    <iframe src="{!! $post->iframe !!}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
@endif