<p>Ratings:
    @for ($i = 0; $i < $filledStars; $i++)
        <span class="fa fa-star checked"></span>
    @endfor

    @for ($i = 0; $i < $emptyStars; $i++)
        <span class="fa fa-star"></span>
    @endfor
    {{ $rating }}
</p>
