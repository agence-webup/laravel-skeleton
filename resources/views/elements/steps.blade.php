<ol class="steps cart-steps cart-step-">
    <li class="@if($step == 2) cart-steps__previous @elseif($step == 1) cart-steps__current @else hidden-xs-u @endif">
        <a href="#" @if($step == 1) class="current" @endif>
            <span class="hidden-xs">Récapitulatif de ma commande</span>
            @if($step == 1) <span class="hidden-xs-up"> Etape 1/4</span> @endif
        </a>
    </li>
    <li class="@if($step == 1) cart-steps__next @elseif($step == 3) cart-steps__previous @elseif($step == 2) cart-steps__current @else hidden-xs-u @endif">
        <a href="#" @if($step == 2) class="current" @endif>
            <span class="hidden-xs">Informations</span>
            @if($step == 2) <span class="hidden-xs-up"> Etape 2/4</span> @endif
        </a>
    </li>
    <li class="@if($step == 2) cart-steps__next @elseif($step == 4) cart-steps__previous @elseif($step == 3) cart-steps__current @else hidden-xs-u @endif">
        <a href="#" @if($step == 3) class="current" @endif>
            <span class="hidden-xs">Paiement</span>
            @if($step == 3) <span class="hidden-xs-up"> Etape 3/4</span> @endif
        </a>
    </li>
    <li class="@if($step == 3) cart-steps__next @elseif($step == 4) cart-steps__current @else hidden-xs-u @endif">
        <a href="#" @if($step == 4) class="current" @endif>
            <span class="hidden-xs">Confirmation de ma commande</span>
            @if($step == 4) <span class="hidden-xs-up"> Etape 4/4</span> @endif
        </a>
    </li>
</ol>
