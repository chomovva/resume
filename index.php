<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Главная</title>
    <meta name="description" content="Portfolio WordPress Developer">
    <link rel="stylesheet" href="../styles/critical.css">
    <script>
      resumeTheme = {
      	toTopBtn: 'Наверх'
      };
    </script>
  </head>
  <body class="front-page" data-nav="inactive">
    <nav class="nav" id="nav">
      <div class="bg" id="bg"></div>
      <div class="overlay">
        <button class="close" id="close"><span class="sr-only">Закрыть меню</span></button>
        <ul class="languages">
          <li class="current">ru</li>
          <li><a href="#">en</a></li>
          <li><a href="#">uk</a></li>
        </ul>
        <h3>Меню</h3>
        <ul>
          <li><a href="#">Обо мне</a></li>
          <li><a href="#">Образование</a></li>
          <li><a href="#">Опыт работы</a></li>
          <li><a href="#">Скилы</a></li>
          <li><a href="#">Портфолио</a></li>
          <li><a href="#">Контакты</a></li>
        </ul>
      </div>
    </nav>
    <div class="wrapper" id="wrapper">
      <header class="wrapper__item wrapper__item--header header" id="header">
        <div class="container">
          <div class="row center-xs middle-xs">
            <div class="col-xs-12 col-sm-5 col-md-4 col-lg-5"><a class="bloginfo" href="#"><img class="bloginfo__logo logo" src="../images/logo.png" alt="chomovva">
                <div class="bloginfo__name name">chomovva</div></a></div>
            <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6">
              <ul class="contacts">
                <li><a class="viber" href="#"><span class="sr-only">viber</span></a></li>
                <li><a class="telegram" href="#"><span class="sr-only">telegram</span></a></li>
                <li><a class="whatsapp" href="#"><span class="sr-only">whatsapp</span></a></li>
                <li><a class="email" href="#"><span class="sr-only">email</span></a></li>
              </ul>
            </div>
            <div class="col-xs-4 col-sm-1 col-md-2 col-lg-1 text-right">
              <button class="burger" id="burger"><span class="bar bar1"></span><span class="bar bar2"></span><span class="bar bar3"></span><span class="bar bar4"></span><span class="sr-only">Открыть меню</span></button>
            </div>
          </div>
        </div>
      </header>
      <main class="wrapper__item wrapper__item--main main" id="main">
        <div class="jumbotron" id="jumbotron">
          <div class="bg lazy" data-src="../images/jumbotron.jpg"></div>
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-sm-offset-6 col-md-offset-6 col-lg-offset-6">
                <h1>Portfolio WordPress Developer</h1>
              </div>
            </div>
          </div>
        </div>
        <section class="section aboutme" id="aboutme">
          <div class="container">
            <div class="row center-xs">
              <div class="col-xs-9 col-sm-4 col-md-5 col-lg-5 col-sm-offset-1">
                <div class="aboutme__foto foto"><img class="lazy" src="#" data-src="../images/foto.jpg" alt="Моё фото">
                  <ul class="socials">
                    <li><a class="facebook" href="#"><span class="sr-only">facebook</span></a></li>
                    <li><a class="twitter" href="#"><span class="sr-only">twitter</span></a></li>
                    <li><a class="linkedin" href="#"><span class="sr-only">linkedin</span></a></li>
                    <li><a class="vk" href="#"><span class="sr-only">vk</span></a></li>
                    <li><a class="github" href="#"><span class="sr-only">github</span></a></li>
                    <li><a class="youtube" href="#"><span class="sr-only">youtube</span></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6 first-sm">
                <h2>Обо мне</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum possimus, perspiciatis accusamus eligendi laudantium labore reprehenderit quas sit, vel adipisci ipsum cupiditate, eos repudiandae assumenda temporibus consectetur nam aut quo.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum possimus, perspiciatis accusamus eligendi laudantium labore reprehenderit quas sit, vel adipisci ipsum cupiditate, eos repudiandae assumenda temporibus consectetur nam aut quo.</p><a class="btn btn-primary resume" role="button" href="#">Загрузить резюме</a>
              </div>
            </div>
          </div>
        </section>
        <section class="section services" id="services">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
                <h2>Чем я занимаюсь</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-5 col-lg-5 col-sm-offset-1">
                <ol class="services__list list">
                  <li><strong>Вёрстка</strong></li>
                  <li><strong>Темы CSM WordPress</strong></li>
                  <li><strong>Плагины CSM WordPress</strong></li>
                  <li><strong>CodeIgniter</strong></li>
                  <li><strong>Сайт визитка</strong></li>
                  <li><strong>LandingPage</strong></li>
                </ol>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><a class="btn btn-primary" href="#">Связаться со мной</a></div>
            </div>
          </div>
        </section>
        <div class="way lazy" id="way" data-src="../images/way.jpg">
                  <section class="section way__entry entry">
                    <div class="container">
                      <div class="row center-xs">
                        <div class="col-xs-12 col-sm-10 col-md-9 col-lg-8">
                          <h2 class="title">Моё образование</h2>
                          <div class="content">
                            <table>
                                      <tr>
                                        <td style="width: 30%;">
                                          <h3>БГПУ</h3>
                                          <p><span>2012</span> - <span>2014</span></p>
                                        </td>
                                        <td>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut unde consequatur nisi! Enim iste, animi impedit exercitationem asperiores libero sapiente laboriosam, quos suscipit, omnis laudantium, deserunt nobis eum nulla consectetur.</p>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td style="width: 30%;">
                                          <h3>самообразование</h3>
                                          <p><span>2010</span> - <span>~</span></p>
                                        </td>
                                        <td>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut unde consequatur nisi! Enim iste, animi impedit exercitationem asperiores libero sapiente laboriosam, quos suscipit, omnis laudantium, deserunt nobis eum nulla consectetur.</p>
                                        </td>
                                      </tr>
                            </table>
                          </div>
                          <p class="text-center"><a class="btn btn-primary permalink" href="#">Подробней</a></p>
                        </div>
                      </div>
                    </div>
                  </section>
                  <section class="section way__entry entry">
                    <div class="container">
                      <div class="row center-xs">
                        <div class="col-xs-12 col-sm-10 col-md-9 col-lg-8">
                          <h2 class="title">Опыт работы</h2>
                          <div class="content">
                            <table>
                                      <tr>
                                        <td style="width: 30%;">
                                          <h3>ПГТУ</h3>
                                          <p><span>2017</span> - <span>~</span></p>
                                        </td>
                                        <td>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut unde consequatur nisi! Enim iste, animi impedit exercitationem asperiores libero sapiente laboriosam, quos suscipit, omnis laudantium, deserunt nobis eum nulla consectetur.</p>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td style="width: 30%;">
                                          <h3>МПЛБ №2</h3>
                                          <p><span>2015</span> - <span>2017</span></p>
                                        </td>
                                        <td>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut unde consequatur nisi! Enim iste, animi impedit exercitationem asperiores libero sapiente laboriosam, quos suscipit, omnis laudantium, deserunt nobis eum nulla consectetur.</p>
                                        </td>
                                      </tr>
                            </table>
                          </div>
                          <p class="text-center"><a class="btn btn-primary permalink" href="#">Подробней</a></p>
                        </div>
                      </div>
                    </div>
                  </section>
        </div>
        <section class="section skills" id="skills">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
                <h2>Мои скилы</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dignissimos, atque quidem optio fugiat eaque modi. Atque voluptas officia soluta, quibusdam omnis veritatis voluptate corporis cum perferendis, illum at accusamus?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dignissimos, atque quidem optio fugiat eaque modi. Atque voluptas officia soluta, quibusdam omnis veritatis voluptate corporis cum perferendis, illum at accusamus?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dignissimos, atque quidem optio fugiat eaque modi. Atque voluptas officia soluta, quibusdam omnis veritatis voluptate corporis cum perferendis, illum at accusamus?</p>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-5 col-lg-5 col-sm-offset-1">
                <ul class="skills__list list">
                          <li class="clearfix"><strong class="font-normal">HTML5/CSS3 
                              <spam class="pull-right">100</spam></strong>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </li>
                          <li class="clearfix"><strong class="font-normal">SASS/PUG 
                              <spam class="pull-right">100</spam></strong>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </li>
                          <li class="clearfix"><strong class="font-normal">jQuery 
                              <spam class="pull-right">80</spam></strong>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </li>
                          <li class="clearfix"><strong class="font-normal">Gulp 
                              <spam class="pull-right">50</spam></strong>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </li>
                          <li class="clearfix"><strong class="font-normal">PHP 
                              <spam class="pull-right">50</spam></strong>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </li>
                          <li class="clearfix"><strong class="font-normal">Git 
                              <spam class="pull-right">30</spam></strong>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </li>
                          <li class="clearfix"><strong class="font-normal">WordPress Themes 
                              <spam class="pull-right">85</spam></strong>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </li>
                          <li class="clearfix"><strong class="font-normal">WordPress Plugins 
                              <spam class="pull-right">55</spam></strong>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </li>
                          <li class="clearfix"><strong class="font-normal">WordPress Multisite 
                              <spam class="pull-right">50</spam></strong>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </li>
                </ul>
              </div>
            </div>
            <div class="row center-xs" role="list">
                      <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="skills__experience experience" role="listitem"><span class="value">3</span><span class="label">лет</span></div>
                      </div>
                      <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="skills__experience experience" role="listitem"><span class="value">10</span><span class="label">тем</span></div>
                      </div>
                      <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="skills__experience experience" role="listitem"><span class="value">5</span><span class="label">плагинов</span></div>
                      </div>
                      <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="skills__experience experience" role="listitem"><span class="value">10</span><span class="label">сайтов</span></div>
                      </div>
            </div>
          </div>
        </section>
        <section class="section portfolio" id="portfolio">
          <div class="container">
            <h2>Мои работы</h2>
            <div class="slider" id="portfolio-slider"><a class="portfolio__entry entry" href="#"><img class="thumbnail" src="#" data-lazy="../images/portfolio/01.jpg" alt="Абитуриент">
                        <div class="overlay">
                          <h3 class="title">Абитуриент</h3>
                          <ul class="categories">
                            <li>Плагины</li>
                            <li>Плагины</li>
                          </ul>
                          <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam reprehenderit, tenetur libero quae maiores recusandae. Deserunt excepturi nemo aliquam repudiandae nulla explicabo assumenda minus earum animi. Impedit id, maiores fuga.</p>
                        </div></a><a class="portfolio__entry entry" href="#"><img class="thumbnail" src="#" data-lazy="../images/portfolio/02.jpg" alt="Абитуриент">
                        <div class="overlay">
                          <h3 class="title">Абитуриент</h3>
                          <ul class="categories">
                            <li>Темы</li>
                            <li>Темы</li>
                          </ul>
                          <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam reprehenderit, tenetur libero quae maiores recusandae. Deserunt excepturi nemo aliquam repudiandae nulla explicabo assumenda minus earum animi. Impedit id, maiores fuga.</p>
                        </div></a><a class="portfolio__entry entry" href="#"><img class="thumbnail" src="#" data-lazy="../images/portfolio/03.jpg" alt="ПГТУ">
                        <div class="overlay">
                          <h3 class="title">ПГТУ</h3>
                          <ul class="categories">
                            <li>Сайт</li>
                            <li>Сайт</li>
                          </ul>
                          <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam reprehenderit, tenetur libero quae maiores recusandae. Deserunt excepturi nemo aliquam repudiandae nulla explicabo assumenda minus earum animi. Impedit id, maiores fuga.</p>
                        </div></a><a class="portfolio__entry entry" href="#"><img class="thumbnail" src="#" data-lazy="../images/portfolio/04.jpg" alt="Контакты">
                        <div class="overlay">
                          <h3 class="title">Контакты</h3>
                          <ul class="categories">
                            <li>Плагин</li>
                            <li>Плагин</li>
                          </ul>
                          <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam reprehenderit, tenetur libero quae maiores recusandae. Deserunt excepturi nemo aliquam repudiandae nulla explicabo assumenda minus earum animi. Impedit id, maiores fuga.</p>
                        </div></a><a class="portfolio__entry entry" href="#"><img class="thumbnail" src="#" data-lazy="../images/portfolio/05.jpg" alt="DumDJ">
                        <div class="overlay">
                          <h3 class="title">DumDJ</h3>
                          <ul class="categories">
                            <li>Вёрстка</li>
                            <li>Вёрстка</li>
                          </ul>
                          <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam reprehenderit, tenetur libero quae maiores recusandae. Deserunt excepturi nemo aliquam repudiandae nulla explicabo assumenda minus earum animi. Impedit id, maiores fuga.</p>
                        </div></a>
            </div>
            <button class="slider-arrow arrow-prev" id="portfolio-slider-prev"><span class="sr-only">Предыдущий слайд</span></button>
            <button class="slider-arrow arrow-next" id="portfolio-slider-next"><span class="sr-only">Следующий слайд</span></button>
          </div>
        </section>
      </main>
      <div class="wrapper__item wrapper__item--footer footer lazy" data-src="../images/footer.jpg">
        <aside class="aside aside--footer">
          <div class="container">
            <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="widget">
                          <h3 class="widget__title title">Виджет 1</h3>
                          <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="widget">
                          <h3 class="widget__title title">Виджет 2</h3>
                          <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="widget">
                          <h3 class="widget__title title">Виджет 3</h3>
                          <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="widget">
                          <h3 class="widget__title title">Обратная связь</h3>
                          <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                        </div>
                      </div>
            </div>
          </div>
        </aside>
        <footer>
          <div class="container">
            <div class="row middle-xs">
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><a class="bloginfo" href="#"><img class="bloginfo__logo logo" src="../images/logo.png" alt="chomovva">
                  <div class="bloginfo__name name">chomovva</div></a></div>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <ul class="contacts">
                  <li><a class="viber" href="#"><span class="sr-only">viber</span></a></li>
                  <li><a class="telegram" href="#"><span class="sr-only">telegram</span></a></li>
                  <li><a class="whatsapp" href="#"><span class="sr-only">whatsapp</span></a></li>
                  <li><a class="email" href="#"><span class="sr-only">email</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&amp;display=swap&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
      <script src="../scripts/jquery.js"></script>
      <link rel="stylesheet" href="../styles/main.css">
      <script src="../scripts/main.js"></script>
      <link rel="stylesheet" href="../styles/slick.css">
      <script src="../scripts/slick.js"></script>
      <script>
        jQuery( '#portfolio-slider' ).slick( {
        	lazyLoad: 'ondemand',
        	dots: false,
        	arrows: true,
        	infinite: false,
        	speed: 300,
        	slidesToShow: 3,
        	slidesToScroll: 3,
        	prevArrow: '#portfolio-slider-prev',
        	nextArrow: '#portfolio-slider-next',
        	responsive: [
        		{
        			breakpoint: 768,
        			settings: {
        				slidesToShow: 2,
        				slidesToScroll: 2
        			}
        		},
        		{
        			breakpoint: 480,
        			settings: {
        				slidesToShow: 1,
        				slidesToScroll: 1
        			}
        		}
        	],
        } )
        .on( 'lazyLoaded', function ( event, slick, image, imageSource ) {
        	jQuery( image ).closest( '.entry' ).css( 'opacity', '1' );
        } );
        
        
      </script>
      <script src="../scripts/lazyload.js"></script>
      <script>
        jQuery( ".lazy" ).lazy();
        
        
      </script>
      <link rel="stylesheet" href="../styles/fancybox.css">
      <script src="../scripts/fancybox.js"></script>
      <script>
        jQuery( '.fancybox' ).fancybox();
        
        
      </script>
      <script src="../scripts/superembed.js"></script>
    </div>
  </body>
</html>