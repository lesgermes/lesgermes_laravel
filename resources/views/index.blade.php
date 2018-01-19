@extends('layouts.layout')

@section('content')
    <section>
        <div class="container text-center">
            <h3>Le potager éducatif d'intérieur à la française</h3>
            <img class="body-img" src="{{asset('img/cropped-eden-v3-mes.png')}}"/>
        </div>

        <div class="text-center share-buttons">
            <div class="share-title">Partager :</div>
            <!-- Twitter -->
            <a href="https://twitter.com/share?url=https://lesgermes.fr&amp;text=Les%20Germés&amp;hashtags=lesgermes" target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
            </a>
            <!-- Facebook -->
            <a href="http://www.facebook.com/sharer.php?u=https://lesgermes.fr" target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
            </a>
            <!-- Google+ -->
            <a href="https://plus.google.com/share?url=https://lesgermes.fr" target="_blank">
                <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
            </a>
        </div>
    </section>

    <div class="parallax"></div>

    @include('partials.adopt-eden')

    <div class="parallax"></div>

    <section>
        <div class="container text-center">
            <h3>Eden c'est quoi?</h3>

            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img class="body-img2" src="{{asset('img/famille eden tipousse.png')}}"/>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <p>
                            C'est vivre une expérience potagère en famille !
                            Situé entre réel et virtuel, Even vous emmènera à la découverte du monde végétal,
                            guidé par notre mascotte Ti'pouss, afin de révéler votre pouvoir de jardiner.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="p-5">
                        <img class="body-img2" src="{{asset('img/illu 3d taille eden.png')}}"/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <p>
                            Eden, c'est un ensemble de trois mini serres design,
                            pensées en fonction des différents groupes de plants et graines
                            pouvant être cultivés (racinaire, grimpante...).
                        </p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img class="body-img2" src="{{asset('img/app 2.jpg')}}"/>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <p>
                            Nos miniserres éducatives communiquent avec notre application
                            afin de vous accompagner dans la gestion de vos plants et cultiver votre savoir.
                            Oubliez les manuels, vous apprendrez de façon ludique et facile,
                            grâce aux divers jeux proposés.
                        </p>
                    </div>
                </div>
            </div>

            <h5>Issu du travail entre l'artisanat et la technologie, les mini serres sont...</h5>
            <h4>Bioinspirées...</h4>
            <img class="body-img2" src="{{asset('img/site page landing page4.png')}}"/>

            <h5>Nous nous servons du virtuel pour créer du lien réel</h5>
            <h4>Éco-connecté...</h4>
            <img class="body-img2" src="{{asset('img/site page landing page5.png')}}"/>

            <h4>Mon aventure avec Eden</h4>
            <img class="body-img2" src="{{asset('img/site page landing page6.png')}}"/>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/adopt-eden.js') }}"></script>
@endsection