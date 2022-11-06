<?php
include("modulos/login.php");
//include($_SERVER['DOCUMENT_ROOT'].'adminTienda/modulos/login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--normalize.css-->
    <link rel="stylesheet" href="./Estilos/normalize.css? 1" type="text/css">
    <!--preload-->
    <link rel="preload" href="./Estilos/indexLogin_Styles.css? 1" type="text/css">
    <!--Hoja de estilos principal-->
    <link rel="stylesheet" href="./Estilos/indexLogin_Styles.css? 1" type="text/css">

    <title>Iniciar Sesión</title>
</head>
    <body>
        <!--Inicio del Header-->
        <section id="header">
            <div class="header container">
                <div class="nav-bar">
                    <div class="brand">
                        <a href="index.php">
                            <img src="./img/logo negro prueba xd blanco.png" class="logo" alt="">
                        </a>
                    </div>
                    <div class="nav-list">
                        <div class="hamburger">
                            <div class="bar"></div>
                        </div>
                        <ul>
                            <li><a href="index.php" data-after="Home">Home</a></li>
                            <li><a href="#qa" data-after="qa">Preguntas</a></li>
                            <li><a href="#contactapw" data-after="contactapw">Contacto</a></li>
                            <li><a href="#login" data-after="LogIn">Iniciar Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Fin del Header-->
        <div class="nav_help"></div>

        <!--Inicio del Login-->
        <section id="login">
            <main class="main">
                <div class="fondo_login">
                    <img src="./img/Z.jpg" alt="fondo_login">
                </div>
                <div class="login_form">
                    <form action="login.php" method="post" class="form_elements">
                        <div class="title_login">
                            <h1>Iniciar Sesión</h1>
                        </div>
                        <div class="form_group form_group_email">
                            <div class="img_email">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <polyline points="3 7 12 13 21 7" />
                                </svg>
                            </div>
                            <input type="email" name="txtEmail" placeholder="Correo electronico" class="email" required>
                        </div>
                        <div class="form_group form_group_contraseña">
                            <div class="img_contraseña">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <rect x="5" y="11" width="14" height="10" rx="2" />
                                    <circle cx="12" cy="16" r="1" />
                                    <path d="M8 11v-4a4 4 0 0 1 8 0v4" />
                                </svg>
                            </div>
                            <input type="password" name="txtPassword" placeholder="Contraseña" class="contraseña" required>
                        </div>
                        <div class="text_login text_login_contraseña">
                            <p>¿Olvidaste tu contraseña? <a href="#" id="registrate">Da clic aquí</a></p>
                        </div>
                        <div class="form_group">
                            <input type="submit" name="btnLogin" class="boton_enviar" value="Iniciar sesión" onclick="mensajeAlerta()">
                        </div>
                    </form>
                    
                    <div class="text_login text_login_cuenta">
                        <p>¿Aún no tienes cuenta? <a href="./Registro.php" id="registrate">Registrate aquí</a></p>
                    </div>
                    <div class="text_login text_login_guia">
                        <p>¿Necesitas una guia rapida? <a href="#" id="registrate">Guía de apoyo</a></p>
                    </div>
                </div>

            </main>
        </section>
        <!--Fin del Login-->

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

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="./JavaScript/indexLogin_script.js"></script>

        <script>

        </script>
    </body>
</html>