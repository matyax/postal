@extends('website.layout')

@section('content')
        <header id="navigation" ng-controller="NavigationController">
            <div class="container">
                <div id="brand">
                   <a href="/">Postal Urbana Marketing Agency</a>
                </div>
                <nav >
                    <ul id="main-nav">
                        <li class="nav-item">
                            <a href="#agency" class="nav-link" ng-click="navigateTo($event)">
                                <span class="nav-icon agency">

                                </span>
                                agencia
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#services" class="nav-link" ng-click="navigateTo($event)">
                                <span class="nav-icon services">

                                </span>
                                servicios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#cases" class="nav-link" ng-click="navigateTo($event)">
                                <span class="nav-icon cases">

                                </span>
                                casos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link" ng-click="navigateTo($event)">
                                <span class="nav-icon contact">

                                </span>
                                contacto
                            </a>
                        </li>
                    </ul>
                    <div id="mobile-menu">
                        <a href>Menú</a>
                    </div>
                </nav>

            </div>
        </header>

        <div ng-controller="WorksController">
            <section id="home" class="screen">
                <div class="wrapper">
                    <div id="home-banners">
                        @foreach ($homeWorks as $work)
                            @foreach ($work->uploadedImages as $image)
                                @if ($image['type'] == 'home')
                                    <div class="banner-item" style="background-image:url({{ $image['path'] }}); left: 100%">
                                        <div class="banner-text">
                                            <h3>{{ $work->title }}</h3>
                                            <div class="link">
                                                <a href="#cases" ng-click="goToCase($event, {{ $work->work_category_id }}, {{ $work->id }})" class="home-button">
                                                    ver más
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="agency" class="screen">
                <div id="agency-process">
                    <div class="container">
                        <div class="process-block-list">
                            <div class="process-block first">
                                <div class="text first-text">
                                    Somos un equipo<br>de profesionales<br>dedicados al <strong>marketing</strong><br>y a la <strong>comunicación</strong><br>desde hace más<br>de una década.
                                </div>
                            </div>
                            <div class="process-block second">
                                <div class="image plane">
                                    <img src="/img/agency/plane.png" alt="">
                                </div>
                            </div>
                            <div class="process-block third">
                                <div class="text third-text">
                                Trabajamos en<br>conjunto con nuestros<br>clientes en una relación de <strong>confianza</strong>, convirtiéndonos en socios <strong>estratégicos</strong> articulando a la perfección todas las acciones de la
                                    empresa.</div>
                            </div>

                            <div class="process-block fourth">
                                <div class="text">1 · Investigar</div>
                                <div class="image">
                                    <img src="/img/agency/research.png" alt="">
                                </div>
                            </div>
                            <div class="process-block fifth">
                                <div class="text">2 · Pensar</div>
                                <div class="image">
                                    <img src="/img/agency/think.png" alt="">
                                </div>
                            </div>
                            <div class="process-block sixth">
                                <div class="text">3 · Hacer</div>
                                <div class="image">
                                    <img src="/img/agency/make.png" alt="">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="agency-team" class="clearfix">
                    <div class="container">

                            <div class="team-member col3">
                                 <div class="team-member-avatar castellino">

                                 </div>
                                  <div class="team-member-data">
                                       <div class="team-member-name">
                                           Eduardo Castellino

                                       </div>
                                       <div class="team-member-title">
                                           Director
                                       </div>
                                  </div>
                            </div>

                            <div class="team-member col3">
                                 <div class="team-member-avatar sanchez">

                                 </div>
                                  <div class="team-member-data">
                                       <div class="team-member-name">
                                           Ana Clara Sánchez
                                       </div>
                                       <div class="team-member-title">
                                           Branding
                                       </div>
                                  </div>
                            </div>
                            <div class="team-member col3">
                                 <div class="team-member-avatar mariani">

                                 </div>
                                  <div class="team-member-data">
                                       <div class="team-member-name">
                                           Pablo Mariani
                                       </div>
                                       <div class="team-member-title">
                                           Eventos
                                       </div>
                                  </div>
                            </div>

                            <div class="team-member col3">
                                 <div class="team-member-avatar maldonado">

                                 </div>
                                  <div class="team-member-data">
                                       <div class="team-member-name">
                                           Soledad Maldonado
                                       </div>
                                       <div class="team-member-title">
                                           Coordinadora de cuentas
                                       </div>
                                  </div>
                            </div>

                            <div class="team-member col3">
                                 <div class="team-member-avatar segovia">

                                 </div>
                                  <div class="team-member-data">
                                       <div class="team-member-name">
                                           Alejandra Segovia

                                       </div>
                                       <div class="team-member-title">
                                           Diseño Gráfico
                                       </div>
                                  </div>
                            </div>

                            <div class="team-member col3">
                                 <div class="team-member-avatar esteller" >

                                 </div>
                                  <div class="team-member-data">
                                       <div class="team-member-name">
                                           Ignacio Esteller
                                       </div>
                                       <div class="team-member-title">
                                           Social Media
                                       </div>
                                  </div>
                            </div>


                            <div class="team-member col3">
                                 <div class="team-member-avatar perlino">

                                 </div>
                                  <div class="team-member-data">
                                       <div class="team-member-name">
                                           Ana Perlino
                                       </div>
                                       <div class="team-member-title">
                                           Directora creativa
                                       </div>
                                  </div>
                            </div>

                            <div class="team-member col3">
                                 <div class="team-member-avatar gonzalez">

                                 </div>
                                  <div class="team-member-data">
                                       <div class="team-member-name">
                                           Ezequiel Gonzalez


                                       </div>
                                       <div class="team-member-title">
                                           Diseño Gráfico
                                       </div>
                                  </div>
                            </div>
                    </div>
                </div>
            </section>

            <section id="services" class="screen" ng-controller="NavigationController">
                <div id="services-cards">

                    <div class="service-card">
                        <div class="content">
                            <div class="image" style="background-image: url(/img/services/asesoramiento.jpg);">

                            </div>
                            <div class="text">
                                <h3>Asesoramiento comercial</h3>
                                <p>A partir del análisis del mercado de su negocio, confeccionamos e implementamos planes de comunicación que brinden soluciones integrales para la activación de los objetivos comerciales.</p>
                                 <div class="action">
                                     <a href="#cases" class="big-button" ng-click="navigateTo($event)">Ver Casos</a>
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="content">
                            <div class="image" style="background-image: url(/img/services/imagen.jpg);">

                            </div>
                            <div class="text">
                                <h3>Identidad  e imagen</h3>
                                <p>Desarrollamos marcas y personalidades desde cero, implementando la identidad definida en toda la organización.</p>
                                <div class="action">
                                     <a href="#cases" class="big-button" ng-click="navigateTo($event)">Ver Casos</a>
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="content">
                            <div class="image" style="background-image: url(/img/services/multimedia.jpg);">

                            </div>
                            <div class="text">
                                <h3>Multimedia</h3>
                                <p>Desarrollamos piezas combinando múltiples medios físicos o digitales. Creamos y editamos contenidos audiovisuales. Generamos interfaces web, sitemas/usuarios y piezas interactivas.</p>
                                  <div class="action">
                                     <a href="#cases" class="big-button" ng-click="navigateTo($event)">Ver Casos</a>
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="content">
                            <div class="image" style="background-image: url(/img/services/medios.jpg);">

                            </div>
                            <div class="text">
                                <h3>Medios</h3>
                                <p>Seleccionamos los medios idóneos para su empresa y garantizamos - gracias a nuestra vasta experiencia en el rubro -  excelentes acuerdos comerciales, logrando un plan de medios óptimo en relación costo - contacto.</p>
                                  <div class="action">
                                     <a href="#cases" class="big-button" ng-click="navigateTo($event)">Ver Casos</a>
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="content">
                            <div class="image" style="background-image: url(/img/services/eventos.jpg);">

                            </div>
                            <div class="text">
                                <h3>Eventos</h3>
                                <p>Detectamos eventos de interés para su empresa e implementamos su participación en los mismos. De igual manera, desarrollamos eventos corporativos de acuerdo a cada necesidad específica.</p>
                                 <div class="action">
                                     <a href="#cases" class="big-button" ng-click="navigateTo($event)">Ver Casos</a>
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="content">
                            <div class="image" style="background-image: url(/img/services/socialmedia.jpg);">

                            </div>
                            <div class="text">
                                <h3>Social Media</h3>
                                <p>Generamos y gestionamos plataformas de comunicación en línea, utilizando soportes interactivos logrando un impacto directo e inmediato..</p>
                                 <div class="action">
                                     <a href="#cases" class="big-button" ng-click="navigateTo($event)">Ver Casos</a>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="services-clients">
                    <div class="container">
                        <h2>NUESTROS CLIENTES</h2>
                        <div id="client-list">
                            <div class="client-item">
                                <div class="image">
                                    <img src="/img/clients/albura.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                <div class="image">
                                    <img src="/img/clients/alvear.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                <div class="image">
                                    <img src="/img/clients/andesbrix.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                 <div class="image">
                                    <img src="/img/clients/boxautoexpress.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                 <div class="image">
                                    <img src="/img/clients/cata.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                <div class="image">
                                    <img src="/img/clients/cataturismo.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                <div class="image">
                                    <img src="/img/clients/catacargo.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                 <div class="image">
                                    <img src="/img/clients/chamber.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                 <div class="image">
                                    <img src="/img/clients/maipu.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                 <div class="image">
                                    <img src="/img/clients/encina.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                 <div class="image">
                                    <img src="/img/clients/newtech.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                 <div class="image">
                                    <img src="/img/clients/maza.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                 <div class="image">
                                    <img src="/img/clients/prototype.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                 <div class="image">
                                    <img src="/img/clients/sulmineria.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                 <div class="image">
                                    <img src="/img/clients/taker.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                 <div class="image">
                                    <img src="/img/clients/tbm.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                 <div class="image">
                                    <img src="/img/clients/tresblasones.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                 <div class="image">
                                    <img src="/img/clients/trivento.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                 <div class="image">
                                    <img src="/img/clients/utn.png" alt="">
                                </div>
                            </div>
                            <div class="client-item">
                                 <div class="image">
                                    <img src="/img/clients/vaquie.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="cases" class="screen full">
               <div id="cases-images">
                    @foreach ($works as $work)
                        <div class="cases-item" style="left:100%;" data-id="{{ $work->id }}" data-category="{{ $work->work_category_id }}">
                            @foreach ($work->uploadedImages as $image)
                                <div class="case-image full" style="background-image:url({{ $image['path'] }});"></div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

               <div id="cases-arrows">
                   <a href class="arrow-left" ng-click="prev($event)">Anterior</a>
                   <a href class="arrow-right" ng-click="next($event)">Siguiente</a>
               </div>

                <div id="cases-description">
                   <div class="container">
                        @foreach ($works as $work)
                            <div class="col8 center description-container" style="display: none" data-work-id="{{ $work->id }}" >
                                {!! $work->description !!}
                            </div>
                        @endforeach
                   </div>
               </div>

               <div id="cases-nav">
                   <div class="container">
                       <nav class="col8 center">
                           <ul>
                              @foreach ($categories as $category)
                                <li>
                                    <a href="#" data-id="{{ $category->id }}" ng-click="displayCategory($event, {{ $category->id }})">{{ $category->name }}</a>
                                </li>
                              @endforeach

                           </ul>
                       </nav>
                   </div>
               </div>
            </section>
        </div>

        <section id="contact" class="screen" ng-controller="ContactController">
            <a href class="map-link"></a>
            <div class="wrapper">

                <div class="container">

                    <div class="col6 pull-right">
                        <div class="contact-block">
                            <div class="social-links">
                                <a href="https://www.facebook.com/postalurbana" target="_blank" class="facebook">Facebook</a>
                                <a href="https://www.facebook.com/postalurbana" target="_blank" class="twitter">Twitter</a>
                            </div>
                            <div class="title"></div>
                            <p>
                                <a href="mailto:hola@postalurbana.com.ar">hola@postalurbana.com.ar</a> <br>
                                Olascoaga 572 - Mendoza · Argentina <br>
                                +54 (261) 4292103
                            </p>

                            <div class="form">
                                <form novalidate ng-submit="sendForm()" name="contactForm">
                                    <div ng-show="contactSuccess === null">
                                        <div class="form-half-col">
                                           <label>nombre y apellido</label>
                                            <input type="text" ng-required="true" name="name" ng-model="contact.name">
                                        </div>
                                        <div class="form-half-col">
                                            <label>email</label>
                                            <input type="email" ng-required="true" name="email" ng-model="contact.email">
                                        </div>
                                        <div class="form-full-col">
                                            <label>consulta</label>
                                            <textarea ng-model="contact.message" name="message" ng-required="true" rows="5"></textarea>
                                            <input type="submit" value="[[ buttonStatus ]]" class="button" ng-disabled="contactForm.$invalid" >
                                        </div>
                                    </div>
                                    <div class="form-half-col" ng-show="contactSuccess === true">
                                        ¡Gracias por contactarnos! Te estaremos respondiendo a la brevedad
                                    </div>

                                    <div class="form-half-col" ng-show="contactSuccess === false">
                                        Estamos realizando tareas de mantenimiento. Por favor escribinos a
                                        <a href="mailto:hola@postalurbana.com.ar">hola@postalurbana.com.ar</a>.
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <footer>
                    COPYRIGHT &copy; 2015 POSTAL URBANA. TODOS LOS DERECHOS RESERVADOS.
                </footer>
            </div>

        </section>
@stop