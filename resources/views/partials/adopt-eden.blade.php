<section>
    <div class="container text-center">
        <h3>Adopte un Eden!</h3>
        <img class="body-img" src="{{asset('img/eden-v3-plante-lumic3a8re-e1514453066878.png')}}"/>

        <div class="row text-left">
            <div class="col-md-7 offset-md-3 col-sm-10 offset-sm-1 col-xs-12">
                {!! Form::open(['url' => 'adopte-un-eden', 'method' => 'post', 'class' => 'form-adopt', 'id' => 'adopt-eden-form']) !!}
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', $value = null, $attributes = ['required' => true]) !!}
                {!! Form::submit('Envoyer') !!}
                {!! Form::close() !!}
            </div>
        </div>

        <div id="adopt-eden-alerts"></div>
    </div>

    <div class="text-center share-buttons">
        <div class="share-title">Partager :</div>
        <!-- Twitter -->
        <a href="https://twitter.com/share?url=https://lesgermes.fr/adopte-un-eden&amp;text=Les%20Germés&amp;hashtags=lesgermes" target="_blank">
            <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
        </a>
        <!-- Facebook -->
        <a href="http://www.facebook.com/sharer.php?u=https://lesgermes.fr/adopte-un-eden" target="_blank">
            <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
        </a>
        <!-- Google+ -->
        <a href="https://plus.google.com/share?url=https://lesgermes.fr/adopte-un-eden" target="_blank">
            <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
        </a>
    </div>
</section>