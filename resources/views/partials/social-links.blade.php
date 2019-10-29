<section>
    <ul id="services">
        <h2>Comparte en tus redes sociales este artículo</h2>
        <li>
            <div class="facebook">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}&title={{ $description }}" 
                    title="Compartir en Facebook" 
                    target="_blank">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
            </div>
            <span>Facebook</span>
        </li>
        <li>
            <div class="twitter">
                <a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{ $description }}&via=@UnaAlejaa&hashtags={{ $post->url }}" 
                    target="_blank" 
                    title="Tweet">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
            </div>
            <span>Twitter</span>
        </li>
        <li>
            <div class="linkedin">
                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ request()->fullUrl() }}&title={{ $description }}&summary={{ $excerpt }}&source=blog.test">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
            </div>
            <span>LinkedIn</span>
        </li>
        <li>
            <div class="pinterest">
                <a href="http://pinterest.com/pin/create/button/?url={{ request()->fullUrl() }}&description={{ $description }}" 
                    target="_blank" 
                    title="Pin it">
                    <i class="fa fa-pinterest" aria-hidden="true"></i>
                </a>
            </div>
            <span>Pinterest</span>
        </li>
    </ul>
</section>