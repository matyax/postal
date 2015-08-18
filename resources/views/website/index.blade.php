@extends('website.layout')

@section('content')
        <header id="navigation">
            <div class="container">
                <div id="brand">
                   <a href="/">Postal Urbana Marketing Agency</a>
                </div>
                <nav >
                    <ul id="main-nav">
                        <li class="nav-item">
                            <a href="#agency" class="nav-link">
                                <span class="nav-icon agency">

                                </span>
                                agencia
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#services" class="nav-link">
                                <span class="nav-icon services">

                                </span>
                                servicios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#cases" class="nav-link">
                                <span class="nav-icon cases">

                                </span>
                                casos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link">
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

        <section id="home" class="screen">
            <div class="wrapper">
                <div id="home-banners">
                    <div class="banner-item" style="background-image:url(/img/home-banners/utn.jpg);">
                        <div class="banner-text">
                            <h3>UTN REGIONAL MENDOZA</h3>
                            <div class="link">
                                <a href="#cases" class="home-button">ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="banner-item" style="background-image:url(/img/home-banners/sul.jpg); left:100%;">
                        <div class="banner-text">
                            <h3>SUL MINERIA</h3>
                             <div class="link">
                                <a href="#cases" class="home-button">ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="banner-item" style="background-image:url(/img/home-banners/cata.jpg); left:200%;">
                        <div class="banner-text">
                            <h3>CATA</h3>
                            <div class="link">
                                <a href="#cases" class="home-button">ver más</a>
                            </div>
                        </div>
                    </div>
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

        <section id="services" class="screen">
            <div id="services-cards">

                <div class="service-card">
                    <div class="content">
                        <div class="image" style="background-image: url(/img/services/asesoramiento.jpg);">

                        </div>
                        <div class="text">
                            <h3>Asesoramiento comercial</h3>
                            <p>A partir del análisis del mercado de su negocio, confeccionamos e implementamos planes de comunicación que brinden soluciones integrales para la activación de los objetivos comerciales.</p>
                             <div class="action">
                                 <a href class="big-button">Ver Casos </a>
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
                                 <a href class="big-button">Ver Casos </a>
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
                                 <a href class="big-button">Ver Casos </a>
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
                                 <a href class="big-button">Ver Casos </a>
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
                                 <a href class="big-button">Ver Casos </a>
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
                                 <a href class="big-button">Ver Casos </a>
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
                    <div class="cases-item" style="left:0%;" id="taker">
                        <div class="case-image" style="background-image:url(/img/cases/taker/taker1.jpg);"></div>
                        <div class="case-image" style="background-image:url(/img/cases/taker/taker2.jpg);"></div>
                        <div class="case-image" style="background-image:url(/img/cases/taker/taker3.jpg);"></div>
                        <div class="case-image" style="background-image:url(/img/cases/taker/taker4.jpg);"></div>
                    </div>

                    <div class="cases-item" style="left:100%;" id="prototype">
                        <div class="case-image third" style="background-image:url(/img/cases/prototype/prototype1.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/prototype/prototype2.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/prototype/prototype3.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/prototype/prototype4.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/prototype/prototype5.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/prototype/prototype6.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/prototype/prototype7.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/prototype/prototype8.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/prototype/prototype9.jpg);"></div>
                    </div>
                    <div class="cases-item" style="left:100%;" id="maza-brand">
                        <div class="case-image full" style="background-image:url(/img/cases/maza-brand/maza-brand1.jpg);"></div>
                    </div>
                    <div class="cases-item" style="left:100%;" id="sul-web">
                        <div class="case-image full" style="background-image:url(/img/cases/sul-web/sul-web.jpg);"></div>
                    </div>

                    <div class="cases-item" style="left:100%;" id="catacargo">
                        <div class="case-image before-after-top" style="background-image:url(/img/cases/catacargo/catacargo-top.jpg);"></div>
                        <div class="case-image before-after-image" style="background-image:url(/img/cases/catacargo/catacargo-image.jpg);"></div>

                    </div>

                    <div class="cases-item" style="left:100%;" id="utn">
                        <div class="case-image before-after-top" style="background-image:url(/img/cases/utn/utn-top.jpg);"></div>
                        <div class="case-image before-after-image-half" style="background-image:url(/img/cases/utn/utn-image-1.jpg);"></div>
                        <div class="case-image before-after-image-half" style="background-image:url(/img/cases/utn/utn-image-2.jpg);"></div>
                    </div>

                    <div class="cases-item" style="left:100%;" id="sul-brand">
                        <div class="case-image before-after-top" style="background-image:url(/img/cases/sul-brand/sul-brand-top.jpg);"></div>
                        <div class="case-image before-after-image-half" style="background-image:url(/img/cases/sul-brand/sul-brand-image-1.jpg);"></div>
                        <div class="case-image before-after-image-half" style="background-image:url(/img/cases/sul-brand/sul-brand-image-2.jpg);"></div>
                    </div>

                   <div class="cases-item" style="left:100%;" id="maza-brand-2">
                        <div class="case-image before-after-top" style="background-image:url(/img/cases/maza-brand-2/maza-brand-top.jpg);"></div>
                        <div class="case-image before-after-image-half" style="background-image:url(/img/cases/maza-brand-2/maza-brand-image-1.jpg);"></div>
                        <div class="case-image before-after-image-half" style="background-image:url(/img/cases/maza-brand-2/maza-brand-image-2.jpg);"></div>
                    </div>
                    <div class="cases-item" style="left:100%;" id="cata-puntos">
                        <div class="case-image third-full" style="background-image:url(/img/cases/catapuntos/catapuntos1.jpg);"></div>
                        <div class="case-image third-full" style="background-image:url(/img/cases/catapuntos/catapuntos2.jpg);"></div>
                        <div class="case-image third-full" style="background-image:url(/img/cases/catapuntos/catapuntos3.jpg);"></div>
                    </div>
                    <div class="cases-item" style="left:100%;" id="cata-mundial">
                        <div class="case-image third-full" style="background-image:url(/img/cases/cata-mundial/cata-mundial1.jpg);"></div>
                        <div class="case-image third-full" style="background-image:url(/img/cases/cata-mundial/cata-mundial2.jpg);"></div>
                        <div class="case-image third-full" style="background-image:url(/img/cases/cata-mundial/cata-mundial3.jpg);"></div>
                    </div>

                    <div class="cases-item" style="left:100%;" id="vaquie">
                        <div class="case-image thumb-big" style="background-image:url(/img/cases/vaquie/vaquie-thumb-big.jpg);"></div>
                        <div class="case-image  thumbs">
                            <div class="case-image third" style="background-image:url(/img/cases/vaquie/vaquie1.jpg);"></div>
                            <div class="case-image third" style="background-image:url(/img/cases/vaquie/vaquie2.jpg);"></div>
                            <div class="case-image third" style="background-image:url(/img/cases/vaquie/vaquie3.jpg);"></div>
                        </div>
                    </div>

                    <div class="cases-item" style="left:100%;" id="box">
                       <div class="case-image  thumbs">
                            <div class="case-image third" style="background-image:url(/img/cases/box/box1.jpg);"></div>
                            <div class="case-image third" style="background-image:url(/img/cases/box/box2.jpg);"></div>
                            <div class="case-image third" style="background-image:url(/img/cases/box/box3.jpg);"></div>
                        </div>
                        <div class="case-image thumb-big" style="background-image:url(/img/cases/box/box-thumb-big.jpg);"></div>

                    </div>

                    <div class="cases-item" style="left:100%;" id="maipu">
                        <div class="case-image thumb-big" style="background-image:url(/img/cases/maipu/maipu-thumb-big.jpg);"></div>
                        <div class="case-image  thumbs">
                            <div class="case-image third" style="background-image:url(/img/cases/maipu/maipu1.jpg);"></div>
                            <div class="case-image third" style="background-image:url(/img/cases/maipu/maipu2.jpg);"></div>
                            <div class="case-image third" style="background-image:url(/img/cases/maipu/maipu3.jpg);"></div>
                        </div>
                    </div>


                    <div class="cases-item" style="left:100%;" id="santa-teresa">
                        <div class="case-image third" style="background-image:url(/img/cases/santa-teresa/santa-teresa1.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/santa-teresa/santa-teresa2.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/santa-teresa/santa-teresa3.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/santa-teresa/santa-teresa4.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/santa-teresa/santa-teresa5.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/santa-teresa/santa-teresa6.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/santa-teresa/santa-teresa7.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/santa-teresa/santa-teresa8.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/santa-teresa/santa-teresa9.jpg);"></div>
                    </div>

                    <div class="cases-item" style="left:100%;" id="cata-evento">
                        <div class="case-image third" style="background-image:url(/img/cases/cata-evento/cata-evento1.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-evento/cata-evento2.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-evento/cata-evento3.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-evento/cata-evento4.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-evento/cata-evento5.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-evento/cata-evento6.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-evento/cata-evento7.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-evento/cata-evento8.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-evento/cata-evento9.jpg);"></div>
                    </div>

                    <div class="cases-item" style="left:100%;" id="cata-playa">
                        <div class="case-image third" style="background-image:url(/img/cases/cata-playa/cata-playa1.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-playa/cata-playa2.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-playa/cata-playa3.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-playa/cata-playa4.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-playa/cata-playa5.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-playa/cata-playa6.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-playa/cata-playa7.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-playa/cata-playa8.jpg);"></div>
                        <div class="case-image third" style="background-image:url(/img/cases/cata-playa/cata-playa9.jpg);"></div>
                    </div>


            </div>

           <div id="cases-arrows">
               <a href class="arrow-left">Anterior</a>
               <a href class="arrow-right">Siguiente</a>
           </div>

            <div id="cases-description">
               <div class="container">
                   <div class="col8 center description-container">
                       Desarrollo de estrategia de comunicación para un nuevo sistema de seguros de personal en Barrios Privados de Mendoza.
                   </div>
               </div>
           </div>

           <div id="cases-nav">
               <div class="container">
                   <nav class="col8 center">
                       <ul>
                           <li>
                               <a href>asesoría comercial</a>
                           </li>
                           <li  class="active">
                               <a href>branding</a>
                           </li>
                           <li>
                               <a href>multimedia</a>
                           </li>
                           <li>
                               <a href>medios y prensa</a>
                           </li>
                           <li>
                               <a href>social media</a>
                           </li>
                           <li>
                               <a href>eventos</a>
                           </li>

                       </ul>
                   </nav>
               </div>
           </div>
        </section>

        <section id="contact" class="screen">
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
                                hola@postalurbana.com.ar <br>
                                Olascoaga 572 - Mendoza · Argentina <br>
                                +54 (261) 4292103
                            </p>

                            <div class="form">
                                <form>
                                    <div class="form-half-col">
                                       <label>nombre y apellido</label>
                                        <input type="text">
                                    </div>
                                    <div class="form-half-col">
                                       <label>email</label>
                                        <input type="email">
                                    </div>
                                    <div class="form-full-col">
                                       <label>consulta</label>
                                        <textarea  rows="5"></textarea>
                                        <input type="submit" value="Enviar" class="button">
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <footer>
                    COPYRIGHT © 2015 POSTAL URBANA. TODOS LOS DERECHOS RESERVADOS.
                </footer>
            </div>

        </section>
@stop