<?php
include("modulos/cursos.php");
//include($_SERVER['DOCUMENT_ROOT'].'adminTienda/modulos/login.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--JQUERY-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!--SWEETALERT2-->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!--normalize.css-->
        <link rel="stylesheet" href="./Estilos/normalize.css?" type="text/css">
        <!--preload-->
        <link rel=”preload” href="./Estilos/indexLogin_Styles.css?" type="text/css">
        <!--Hoja de estilos principal-->
        <link rel="stylesheet" href="./Estilos/indexLogin_Styles.css?" type="text/css">

        <!--Hoja de estilos BOOTSTRAP-->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        
        <title>Instructores APW</title>
    </head>
    <body>
        <!--Inicio del Header-->
        <header id="header">
            <div class="header container">
                <div class="nav-bar">
                    <div class="brand">
                        <a href="./index.php">
                            <img src="./img/logo negro prueba xd blanco.png" class="logo" alt="">
                        </a>
                    </div>
                    <div class="nav-list">
                        <div class="hamburger">
                            <div class="bar"></div>
                        </div>
                        <ul>
                            <li><a href="#start" data-after="Home">Home</a></li>
                            <li><a href="#courses" data-after="courses">Cursos</a></li>
                            <li><a href="#instructors" data-after="instructors">Instructores</a></li>
                            <li><a href="#qa" data-after="qa">Preguntas</a></li>
                            <li><a href="#contactapw" data-after="contact">Contacto</a></li>
                            <li><a href="./login.php" data-after="LogIn">Iniciar Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!--Fin del Header-->

        <!--Inicio de sección "start"-->
        <section id="start">
            <div class="blog-slider__container">
                <div class="blogSlides fade">
                    <div class="blog-slider__numbertext"></div>
                        
                        <div class="slide_container">
                            <img src="./img/pantmarchEdit.jpg">
                            <div class="text_slide">
                                <h1>Desarróllate <span></span></h1>
                                <h1>como <span></span></h1>
                                <h1>Instructor<span></span></h1>
                                <a href="./cursos.php" type="button" class="cta">Cursos</a>
                            </div>
                        </div>
                        
                    <div class="blog-slider__text"></div>
                </div>
    
                <div class="blogSlides fade">
                    <div class="blog-slider__numbertext"></div>
                        <img class="opac" src="./img/WallpaperDog-17227094.jpg">
                    <div class="blog-slider__text"></div>
                </div>
    
                <div class="blogSlides fade">
                    <div class="blog-slider__numbertext"></div>
                        <img class="opac" src="./img/WallpaperDog-17227100.jpg">
                    <div class="blog-slider__text"></div>
                </div>
    
                <div class="blogSlides fade">
                    <div class="blog-slider__numbertext"></div>
                        <img class="opac" src="./img/WallpaperDog-17227157.jpg">
                    <div class="blog-slider__text"></div>
                </div>
    
                <div class="blogSlides fade">
                    <div class="blog-slider__numbertext"></div>
                        <img class="opac" src="./img/Z.jpg">
                    <div class="blog-slider__text"></div>
                </div>
    
                <a class="prev">&#10094;</a>
                <a class="next">&#10095;</a>
            </div>
                <br>
    
                <div class="blogSlider__dots" style="text-align:center">
                    <span class="blogSlider__dots--dot"></span> 
                    <span class="blogSlider__dots--dot"></span> 
                    <span class="blogSlider__dots--dot"></span>
                    <span class="blogSlider__dots--dot"></span> 
                    <span class="blogSlider__dots--dot"></span>  
                </div>
        </section>
        <!--Fin de sección "start"-->   

        
        <main>
            <!-- Inicio de sección "Cursos"-->
            <section id="courses">
                <div class="courses container">
                    <div class="course-top">
                        <h1 class="section-title">Cur<span>s</span>os</h1>
                        <p class="bigger">Conoce los diferentes programas de capacitación, asi como lo cursos en los que puedes desarrollarte como instructor</p>
                    </div>
                    <div class="page-content">
                    <?php foreach($listaCursos as $Curso){ ?>
                        <div class="card">
                            <div class="content">
                                <h2 class="title"><?php echo $Curso['Nombre_Corto'];?></h2>
                                <p class="copy"></p>
                                <div class="interior">
                                    <a id="btn" class="btn" href="#open-modal-cursos" data-id="<?php echo $Curso['Nombre_Corto'];?>">Saber más</a>
                                    <button type="button" class="btn" data-toggle="modal" data-target="#open-modal-cursos" rel="<?php echo $Curso['ID_Curso']; ?>"></button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    <div class="mascursos">
                        <a href="./cursos.php" type="button" class="mcour">Todos los cursos</a>
                    </div>
                </div>
                <!--ventana modal-->
                <div id="open-modal-cursos" class="modal-window">
                    <div>
                        <a href="#courses" title="Close" class="modal-close">Cerrar</a>
                        <div class="curso_modal">
                            <h2 id="curso">CURSO: "<?php echo $Curso['Nombre_Curso'];?>"</h2>
                            <p id="desc"><?php echo $Curso['Descripcion'];?></p>
                            <a id="perf" href="modulos/DescargarPerfil.php">>>Descarga el perfil del instructor<<</a>
                            <a href="./login.php"><button class="btn">Quiero ser instructor</button></a>
                        </div>
                    </div>
                </div>
                <!--ventana modal-->

            </section>
            <!-- Fin de sección "Cursos"-->


            <!-- Inicio de sección de "Instructores"-->
            <section id="instructors">
                <div class="instructors container">
                    <div class="instructors-header ">
                        <h1 class="section-title">Nuestros <span>Instructores</span></h1>
                    </div>
                    <div class="all-instructors">
                        <div id="ins1" class="instructor-item">
                            <div class="instructor-info">
                                <h1>Isaac Garcia</h1>
                                    <h2>Coding is Love</h2>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
                                        rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
                                        harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
                                        <a class="btn" href="#modal-instructores1">Ver informe de instructor</a>
                            </div>
                            <div class="instructor-img">
                                <img src="./img/500x500 instructor.jpg" alt="img">
                            </div>
                        </div>
                        <div id="ins2" class="instructor-item">
                            <div class="instructor-info">
                                <h1>Mariagna</h1>
                                <h2>Coding is Love</h2>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
                                rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
                                harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
                                <a class="btn" href="#modal-instructores2">Ver informe de instructor</a>
                            </div>
                            <div class="instructor-img">
                                <img src="./img/500x500 instructor.jpg" alt="img">
                            </div>
                        </div>
                        <div id="ins3" class="instructor-item">
                            <div class="instructor-info">
                                <h1>Pamela</h1>
                                <h2>Coding is Love</h2>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
                                rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
                                harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
                                <a class="btn" href="#modal-instructores3">Ver informe de instructor</a>
                            </div>
                            <div class="instructor-img">
                                <img src="./img/500x500 instructor.jpg" alt="img">
                            </div>
                        </div>
                        <div id="ins4" class="instructor-item">
                            <div class="instructor-info">
                                <h1>Claudia</h1>
                                <h2>Coding is Love</h2>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
                                rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
                                harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
                                <a class="btn" href="#modal-instructores4">Ver informe de instructor</a>
                            </div>
                            <div class="instructor-img">
                                <img src="./img/500x500 instructor.jpg" alt="img">
                            </div>
                        </div>
                        <div id="ins5" class="instructor-item">
                            <div class="instructor-info">
                                <h1>Erika</h1>
                                <h2>Coding is Love</h2>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
                                rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
                                harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
                                <a class="btn" href="#modal-instructores5">Ver informe de instructor</a>
                            </div>
                            <div class="instructor-img">
                                <img src="./img/500x500 instructor.jpg" alt="img">
                            </div>
                        </div>
                        <!--ventana modal instructores 1-->
                        <div id="modal-instructores1" class="modal-window">
                            <div>
                                <a href="#ins1" title="Close" class="modal-close">Cerrar</a>
                                <div class="curso_modal">
                                    <h2>Instructor: "Isaac Garcia Zavala"</h2>
                                    <p>el instructor fue.... Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                        Aliquam quaerat autem porro aut consequuntur nobis odio alias ea aspernatur a 
                                        labore maiores modi et, at aperiam fuga ut ex voluptatem?</p>
                                    <a href="">>>Descarga el perfil del instructor<<</a>
                                    <a href="./login.php"><button class="btn">Quiero ser instructor</button></a>
                                </div>
                            </div>
                        </div>
                        <!--ventana modal 1-->
                        <!--ventana modal instructores 1-->
                        <div id="modal-instructores2" class="modal-window">
                            <div>
                                <a href="#ins2" title="Close" class="modal-close">Cerrar</a>
                                <div class="curso_modal">
                                    <h2>Instructor: "Mariagna"</h2>
                                    <p>el instructor fue.... Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                        Aliquam quaerat autem porro aut consequuntur nobis odio alias ea aspernatur a 
                                        labore maiores modi et, at aperiam fuga ut ex voluptatem?</p>
                                    <a href="">>>Descarga el perfil del instructor<<</a>
                                    <a href="./login.php"><button class="btn">Quiero ser instructor</button></a>
                                </div>
                            </div>
                        </div>
                        <!--ventana modal 1-->
                        <!--ventana modal instructores 1-->
                        <div id="modal-instructores3" class="modal-window">
                            <div>
                                <a href="#ins3" title="Close" class="modal-close">Cerrar</a>
                                <div class="curso_modal">
                                    <h2>Instructor: "Pamela"</h2>
                                    <p>el instructor fue.... Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                        Aliquam quaerat autem porro aut consequuntur nobis odio alias ea aspernatur a 
                                        labore maiores modi et, at aperiam fuga ut ex voluptatem?</p>
                                    <a href="">>>Descarga el perfil del instructor<<</a>
                                    <a href="./login.php"><button class="btn">Quiero ser instructor</button></a>
                                </div>
                            </div>
                        </div>
                        <!--ventana modal 1-->
                        <!--ventana modal instructores 1-->
                        <div id="modal-instructores4" class="modal-window">
                            <div>
                                <a href="#ins4" title="Close" class="modal-close">Cerrar</a>
                                <div class="curso_modal">
                                    <h2>Instructor: "Claudia"</h2>
                                    <p>el instructor fue.... Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                        Aliquam quaerat autem porro aut consequuntur nobis odio alias ea aspernatur a 
                                        labore maiores modi et, at aperiam fuga ut ex voluptatem?</p>
                                    <a href="">>>Descarga el perfil del instructor<<</a>
                                    <a href="./login.php"><button class="btn">Quiero ser instructor</button></a>
                                </div>
                            </div>
                        </div>
                        <!--ventana modal 1-->
                        
                        <!--ventana modal instructores 2-->
                        <div id="modal-instructores5" class="modal-window">
                            <div>
                                <a href="#ins5" title="Close" class="modal-close">Cerrar</a>
                                <div class="curso_modal">
                                    <h2>Instructor: "Erika"</h2>
                                    <p>el instructor fue.... Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                        Aliquam quaerat autem porro aut consequuntur nobis odio alias ea aspernatur a 
                                        labore maiores modi et, at aperiam fuga ut ex voluptatem?</p>
                                    <a href="">>>Descarga el perfil del instructor<<</a>
                                    <a href="./login.php"><button class="btn">Quiero ser instructor</button></a>
                                </div>
                            </div>
                        </div>
                        <!--ventana modal 2-->

                        <!--ventana modal instructores 3-->
                        <div id="modal-instructores3" class="modal-window">
                            <div>
                                <a href="#ins3" title="Close" class="modal-close">Cerrar</a>
                                <div class="curso_modal">
                                    <h2>Instructor: "Isaac Garcia Zavala"</h2>
                                    <p>el instructor fue.... Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                        Aliquam quaerat autem porro aut consequuntur nobis odio alias ea aspernatur a 
                                        labore maiores modi et, at aperiam fuga ut ex voluptatem?</p>
                                    <a href="">>>Descarga el perfil del instructor<<</a>
                                    <a href="./login.php"><button class="btn">Quiero ser instructor</button></a>
                                </div>
                            </div>
                        </div>
                        <!--ventana modal 3-->

                        <!--ventana modal instructores 4-->
                        <div id="modal-instructores4" class="modal-window">
                            <div>
                                <a href="#ins4" title="Close" class="modal-close">Cerrar</a>
                                <div class="curso_modal">
                                    <h2>Instructor: "Isaac Garcia Zavala"</h2>
                                    <p>el instructor fue.... Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                        Aliquam quaerat autem porro aut consequuntur nobis odio alias ea aspernatur a 
                                        labore maiores modi et, at aperiam fuga ut ex voluptatem?</p>
                                    <a href="">>>Descarga el perfil del instructor<<</a>
                                    <a href="./login.php"><button class="btn">Quiero ser instructor</button></a>
                                </div>
                            </div>
                        </div>
                        <!--ventana modal 4-->

                        <!--ventana modal instructores 5-->
                        <div id="modal-instructores5" class="modal-window">
                            <div>
                                <a href="#ins5" title="Close" class="modal-close">Cerrar</a>
                                <div class="curso_modal">
                                    <h2>Instructor: "Isaac Garcia Zavala"</h2>
                                    <p>el instructor fue.... Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                        Aliquam quaerat autem porro aut consequuntur nobis odio alias ea aspernatur a 
                                        labore maiores modi et, at aperiam fuga ut ex voluptatem?</p>
                                    <a href="">>>Descarga el perfil del instructor<<</a>
                                    <a href="./login.php"><button class="btn">Quiero ser instructor</button></a>
                                </div>
                            </div>
                        </div>
                        <!--ventana modal 5-->
                    </div>
                </div>

                <div class="testimonios">
                    <h2>Testimonios</h2>
                    <div class="containertest">
                        <!-- All the input controls - Todos los controles input -->
                        <input type="radio" name="nav" id="first" checked>
                        <input type="radio" name="nav" id="second">
                        <input type="radio" name="nav" id="third">
                        <input type="radio" name="nav" id="fourth">
                        <input type="radio" name="nav" id="fifth">
                        <!-- End of input controls - Fin de controles input -->
                        
                        <!-- Labels for input controls - Etiquetas para los controles input -->  
                        <label for="first" class="first"></label>
                        <label for="second"  class="second"></label>
                        <label for="third" class="third"></label>
                        <label for="fourth" class="fourth"></label>
                        <label for="fifth" class="fifth"></label>
                        <!-- End of labels - Fin de etiquetas -->
                        
                        <div class="one slide"><!-- First slide - Primer slide -->
                            <blockquote>
                                <span class="leftq quotes">&ldquo;</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nisl nulla, egestas sed mattis a, venenatis at turpis. Fusce mattis luctus erat vel rutrum. Integer maximus eget est nec placerat.<span class="rightq quotes">&bdquo; </span>
                            </blockquote>
                            <img class="test_img" src="./img/500x500 instructor.jpg" />
                            <h3>Hadrianus Augustus</h3>
                            <h6>UI/UX/XVII Designer at Roman Coliseum</h6>
                        </div><!-- First slide end - Fin del primer slide -->
                        
                        <div class="two slide"><!-- Second slide - Segundo slide -->
                            <blockquote>
                                <span class="leftq quotes">&ldquo;</span>In ultrices lectus vel purus posuere, vitae consectetur lacus faucibus. Ut luctus diam arcu, non aliquam augue laoreet eget. Sed tristique ante sapien, eget eleifend risus accumsan eget... <a href="#">leer más</a><span class="rightq quotes">&bdquo;</span>
                            </blockquote>
                            <img class="test_img" src="./img/500x500 instructor.jpg" />
                            <h3>Caesar Augustus</h3>
                            <h6>CEO The Roman Empire</h6>
                        </div><!-- Second slide end - Fin del segundo slide -->
                        
                        <div class="three slide"><!-- Third slide - Tercer slide -->
                            <blockquote>
                                <span class="quotes leftq">&ldquo;</span>Sed mauris quam, congue at eros et, fermentum mollis tellus. Sed ullamcorper est pretium velit facilisis, quis ornare ex volutpat. Quisque finibus mattis nibh, quis egestas dolor mollis in.<span class="rightq quotes">&bdquo; </span>
                            </blockquote>
                            <img class="test_img" src="./img/500x500 instructor.jpg" />
                            <h3>Flavius Domitianus</h3>
                            <h6>Chair of Finance, Ancient Rome</h6>
                        </div><!-- Third slide end - Fin del tercer slide --> 
                        
                        <div class="four slide"><!-- Third slide - Tercer slide -->
                            <blockquote>
                                <span class="leftq quotes ">&ldquo;</span>este texto es de mera prueba<span class="rightq quotes">&bdquo; </span>
                            </blockquote>
                            <img class="test_img" src="./img/500x500 instructor.jpg" />
                            <h3>Flavius Domitianus</h3>
                            <h6>Chair of Finance, Ancient Rome</h6>
                        </div><!-- Third slide end - Fin del tercer slide -->

                        <div class="five slide"><!-- Third slide - Tercer slide -->
                            <blockquote>
                                <span class="leftq quotes ">&ldquo;</span>esto en teoria se supone que deberia de funcionar en base a los conocimientos adquiridos previamente por los tiempos cercanos<span class="rightq quotes">&bdquo; </span>
                            </blockquote>
                            <img class="test_img" src="./img/500x500 instructor.jpg" />
                            <h3>Flavius Domitianus</h3>
                            <h6>Chair of Finance, Ancient Rome</h6>
                        </div><!-- Third slide end - Fin del tercer slide -->
                    </div>
                </div>

            </section>
            <!--Fin de sección de "Instructores"-->

            <!--Inicio de sección "Preguntas y respuestas"-->
            <section id="qa" class="container">
                <div class="contentqa">
                    <div class="accordeon">
                        <div class="instructors-header">
                            <h1 class="section-title">Preguntas y <span>Respuestas</span></h1>
                        </div>

                        <div class="accorddeon-wrapper">
                            <div class="item">
                                <div class="item-name">
                                    <p>¿Qué hace un instructor?</p>
                                    <div class="item-arrow"></div>
                                </div>
                                <div class="item-wrapper">
                                    <ul>
                                        <li>Un instructor es... Lorem ipsum dolor sit amet consectetur, 
                                            adipisicing elit. Tempora voluptatem et quos natus aliquam obcaecati, 
                                            culpa cupiditate, dolorum maiores quibusdam quis quaerat officiis molestiae, 
                                            deleniti id! Quidem numquam corporis laudantium.</li>
                                    </ul>
                                </div>
                            </div><!-- /item -->

                            <div class="item">
                                <div class="item-name">
                                    <p>¿Qué beneficios tiene ser instructor?</p>
                                    <div class="item-arrow"></div>
                                </div>
                                <div class="item-wrapper">
                                    <ul>
                                        <li>Un instructor es... Lorem ipsum dolor sit amet consectetur, 
                                            adipisicing elit. Tempora voluptatem et quos natus aliquam obcaecati, 
                                            culpa cupiditate, dolorum maiores quibusdam quis quaerat officiis molestiae, 
                                            deleniti id! Quidem numquam corporis laudantium.</li>
                                    </ul>
                                </div>
                            </div><!-- /item -->

                            <div class="item">
                                <div class="item-name">
                                    <p>¿Cómo me convierto en instructor?</p>
                                    <div class="item-arrow"></div>
                                </div>
                                <div class="item-wrapper">
                                    <ul>
                                        <li>Un instructor es... Lorem ipsum dolor sit amet consectetur, 
                                            adipisicing elit. Tempora voluptatem et quos natus aliquam obcaecati, 
                                            culpa cupiditate, dolorum maiores quibusdam quis quaerat officiis molestiae, 
                                            deleniti id! Quidem numquam corporis laudantium.</li>
                                    </ul>
                                </div>
                            </div><!-- /item -->

                            <div class="item">
                                <div class="item-name">
                                    <p>Olvide mi contraseña, ¿Qué hago?</p>
                                    <div class="item-arrow"></div>
                                </div>
                                <div class="item-wrapper">
                                    <ul>
                                        <li>Un instructor es... Lorem ipsum dolor sit amet consectetur, 
                                            adipisicing elit. Tempora voluptatem et quos natus aliquam obcaecati, 
                                            culpa cupiditate, dolorum maiores quibusdam quis quaerat officiis molestiae, 
                                            deleniti id! Quidem numquam corporis laudantium.</li>
                                    </ul>
                                </div>
                            </div><!-- /item -->

                            <div class="item">
                                <div class="item-name">
                                    <p>¿Qué área esta encargada?</p>
                                    <div class="item-arrow"></div>
                                </div>
                                <div class="item-wrapper">
                                    <ul>
                                        <li>Un instructor es... Lorem ipsum dolor sit amet consectetur, 
                                            adipisicing elit. Tempora voluptatem et quos natus aliquam obcaecati, 
                                            culpa cupiditate, dolorum maiores quibusdam quis quaerat officiis molestiae, 
                                            deleniti id! Quidem numquam corporis laudantium.</li>
                                    </ul>
                                </div>
                            </div><!-- /item -->
                        </div>
                    </div>
                </div>
            </section>
            <!--Fin de sección "Preguntas y respuestas"-->

            <!--Inicio de sección "Contacto"-->
            <section id="contactapw" class="container">
                <div class="layout_contacto">
                    <div class="parrafo_centr">
                        <h1 class="section-title">Con<span>tac</span>to</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum deleniti maiores pariatur assumenda quas
                            magni et, doloribus quod voluptate quasi molestiae magnam officiis dolorum, dolor provident atque molestias
                            voluptatum explicabo!</p>
                    </div>

                    <div class="container_contacto">
                        <h2>Contáctanos</h2>
                        <form class="formulario" action="">
                            <p>Nombre:</p>
                            <input type="text" class="text" placeholder="Tu nombre...">
                            <p>Correo:</p>
                            <input type="text" class="text" placeholder="Tu correo electronico...">
                            <p>Telefono:</p>
                            <input type="text" class="text" placeholder="Tu numero telefonico...">
                            <p>Mensaje:</p>
                            <textarea placeholder="Tu mensaje o pregunta..."></textarea>
                            <div class="aviso_div">
                                <input type="checkbox" class="chk_aviso">
                                <p class="aviso_priv">He leído y acepto la Politica de Privacidad y el Avíso Legal</p>
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1f1e1e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                    <line x1="10" y1="14" x2="20" y2="4" />
                                    <polyline points="15 4 20 4 20 9" />
                                  </svg>
                                </a> 
                            </div>
                            <input type="submit" value="Enviar" class="btn_env">
                        </form>
                    </div>

                </div>
            </section>
            <!--Fin de sección "Contacto"-->
        </main>


        <!-- Inicio del Footer -->
        <footer id="footer">
            <div class="footer">
                <div class="layout_Footer">
                    <div class="apw">
                        <h2>Acerca de APW</h2>
                        <div class="apw1">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Expedita inventore voluptas vel blanditiis, ipsam tenetur optio? 
                                Quasi illum enim sint quia, reiciendis debitis, autem deserunt 
                                commodi inventore, possimus numquam. Dolorem.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Expedita inventore voluptas vel blanditiis, ipsam tenetur optio? 
                                Quasi illum enim sint quia, reiciendis debitis, autem deserunt 
                                commodi inventore, possimus numquam. Dolorem.
                            </p>
                        </div>
                    </div>
                    <div class="links_web">
                        <h2>Navegación</h2>
                        <ul class="footer_nav">
                            <li><a href="#start" data-after="Home">Home</a></li>
                            <li><a href="#courses" data-after="courses">Cursos</a></li>
                            <li><a href="#instructors" data-after="instructors">Instructores</a></li>
                            <li><a href="#qa" data-after="qa">Preguntas</a></li>
                            <li><a href="#contactapw" data-after="contact">Contacto</a></li>
                            <li><a href="/login.html" data-after="LogIn">Iniciar Sesión</a></li>
                        </ul>
                    </div>
                    <div class="links_web_rapid">
                        <h2>Links de APW</h2>
                        <ul class="footer_nav">
                            <li><a href="#">LMS</a></li>
                            <li><a href="#">Contactanos</a></li>
                            <li><a href="#">Sobre nosotros</a></li>
                            <li><a href="#">Mapa del sitio</a></li>
                            <li><a href="#">Aviso de privacidad</a></li>
                        </ul>
                    </div>
                    <div class="logoapw">
                        <img class="footImg" src="./img/Logo APW blanco.png" alt="APW">
                        <h3 class="ff">Alliance Production Way</h3>
                    </div>
                    <div class="finalfoot">
                        <div class="copy">
                            <p>© 2022 NISSAN. All rights reserved</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </footer>
        <!--Fin del Footer -->

        <!--Script-->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery('.btn').on('click',function(){
                    // Obtener ID desde el botón
                    let id = this.dataset.id;
                    let NombreL = id("<?php echo $Curso['Nombre_Curso'];?>");
                    let Descripcion = id("<?php echo $Curso['Descripcion'];?>");
                    let PerfilInstructor = id("<?php echo $Curso['Perfil_Instructor'];?>");
                    jQuery('#curso').text(NombreL);
                    jQuery('#desc').text(Descripcion);
                    jQuery('#perf').text(id_curso);
                    jQuery('#open-modal-cursos').modal({
                        show:true
                    });

                });
            });
        </script>
        <script src="./JavaScript/indexLogin_script.js"></script>
        <script src="./JavaScript/indexSlider_script.js"></script>

    </body>
</html>