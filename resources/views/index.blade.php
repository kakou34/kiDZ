@extends('layouts.app')
@section('title', 'Acceuil')

@section('content')
    <div id="home">
        <div class=" landing-text text-center ">
            <img id="cloud" class="cloud" src="{{asset('/img/cloud2.png')}}" alt="cloud">
            <img id="cloud2" class="cloud" src="{{asset('/img/cloud2.png')}}" alt="cloud">
            <img id="cloud3" class="cloud" src="{{asset('/img/cloud2.png')}}" alt="cloud">
            <h1 class="scale-up-center">Bienvenue Sur kiDZ!</h1>
        </div>
    </div>
    <div class="padding">
        <div class="container pt-3">
            <div class="row py-4">
                <div class="col-md-12 section-title">
                    <h2 class="section-title">Que Pouvez-Vous Faire Sur Notre Site?</h2>
                    <div class="liner"></div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="sec">
                        <img src="{{asset('/img/watchicon.png')}}" class="sec-icon" alt="watch">
                        <div class="sec-body" style="background-color: #006fb5">
                            <div class="sec-body-content text-center">
                                <h3>Regarder</h3>
                                <div class="liner"></div>
                                <p>
                                    Dans la section "Je regarde", vous pouvez trouver des programmes amusants
                                    avecs de nouveaux épisodes qui sortent périodiquement!
                                </p>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="sec">
                        <img src="{{asset('/img/readicon.png')}}" class="sec-icon" alt="watch">
                        <div class="sec-body" style="background-color: #a53d6f">
                            <div class="sec-body-content text-center">
                                <h3>Lire</h3>
                                <div class="liner"></div>
                                <p>
                                    Dans la section "Je lis" vous pouvez trouver des articles, comptes, fables, histoires...
                                    de différentes catégories pour nos petits rats de bibliothèques!
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="sec">
                        <img src="{{asset('/img/learnicon.png')}}" class="sec-icon" alt="watch">
                        <div class="sec-body" style="background-color: #a0314d">
                            <div class="sec-body-content text-center">
                                <h3>Apprendre</h3>
                                <div class="liner"></div>
                                <p>
                                    Dans la section "J'apprends" vous pouvez trouver des leçons expliquées d'une manière facile et amusante.
                                    Nous vous invitons aussi à résoudre les QCMs pour tester vos connaissances!
                                </p>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="sec">
                        <img src="{{asset('/img/playicon.png')}}" class="sec-icon" alt="watch">
                        <div class="sec-body" style="background-color: #4e3d7a">
                            <div class="sec-body-content text-center">
                                <h3>Jouer</h3>
                                <div class="liner"></div>
                                <p>
                                    Après avoir appris vos leçons, n'hésitez pas à visiter la section "Je joue" pour jouer en ligne.
                                    Nos jeux sont aussi mis à jour périodiquement. Amusez-vous!
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="sec">
                        <img src="{{asset('/img/diyicon.png')}}" class="sec-icon" alt="watch">
                        <div class="sec-body" style="background-color: #8c9100">
                            <div class="sec-body-content text-center">
                                <h3>Artisanat</h3>
                                <div class="liner"></div>
                                <p>
                                    Et pour ceux qui adorent utiliser leurs mains pour faire de l'artisanat et créer des objets intéressants avec leurs amis,
                                    nous vous invitons à visiter la section "DIY" !
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fixed" class="text-center p-5">
        <div class="quote-section">
            <div class="pb-5"><i class="fas fa-quote-right fa-5x"></i></div>
            <div>
                <p class="quote">"Je m'amuse bien en naviguant sur kiDZ, je trouve tout ce que je veux!"</p>
                <div class="liner "></div>
                <p class="speaker"> Yousra MOUHEB</p>
            </div>
        </div>
    </div>

    <div class="padding">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-12 section-title">
                    <h2 class="section-title">Nos Sponsors</h2>
                    <div class="liner"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="sponsor">
                        <img src="{{asset('/img/logodypix.jpeg')}}" alt="Sponsor logo">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="sponsor">
                        <img src="{{asset('/img/logo.PNG')}}" alt="Sponsor logo">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="sponsor">
                        <img src="{{asset('/img/logodypix.jpeg')}}" alt="Sponsor logo">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="sponsor">
                        <img src="{{asset('/img/logo.PNG')}}" alt="Sponsor logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





