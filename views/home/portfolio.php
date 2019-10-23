<section class="section portfolio" id="portfolio">
  <div class="container">
    <h2>Мои работы</h2>
    <div class="slider" id="portfolio-slider"><a class="portfolio__entry entry" href="#"><img class="wp-post-thumbnail" src="#" data-lazy="../images/portfolio/01.jpg" alt="Абитуриент">
                <div class="overlay">
                  <h3 class="title">Абитуриент</h3>
                  <ul class="categories">
                    <li>Плагины</li>
                    <li>Плагины</li>
                  </ul>
                  <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam reprehenderit, tenetur libero quae maiores recusandae. Deserunt excepturi nemo aliquam repudiandae nulla explicabo assumenda minus earum animi. Impedit id, maiores fuga.</p>
                </div></a><a class="portfolio__entry entry" href="#"><img class="wp-post-thumbnail" src="#" data-lazy="../images/portfolio/02.jpg" alt="Абитуриент">
                <div class="overlay">
                  <h3 class="title">Абитуриент</h3>
                  <ul class="categories">
                    <li>Темы</li>
                    <li>Темы</li>
                  </ul>
                  <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam reprehenderit, tenetur libero quae maiores recusandae. Deserunt excepturi nemo aliquam repudiandae nulla explicabo assumenda minus earum animi. Impedit id, maiores fuga.</p>
                </div></a><a class="portfolio__entry entry" href="#"><img class="wp-post-thumbnail" src="#" data-lazy="../images/portfolio/03.jpg" alt="ПГТУ">
                <div class="overlay">
                  <h3 class="title">ПГТУ</h3>
                  <ul class="categories">
                    <li>Сайт</li>
                    <li>Сайт</li>
                  </ul>
                  <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam reprehenderit, tenetur libero quae maiores recusandae. Deserunt excepturi nemo aliquam repudiandae nulla explicabo assumenda minus earum animi. Impedit id, maiores fuga.</p>
                </div></a><a class="portfolio__entry entry" href="#"><img class="wp-post-thumbnail" src="#" data-lazy="../images/portfolio/04.jpg" alt="Контакты">
                <div class="overlay">
                  <h3 class="title">Контакты</h3>
                  <ul class="categories">
                    <li>Плагин</li>
                    <li>Плагин</li>
                  </ul>
                  <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam reprehenderit, tenetur libero quae maiores recusandae. Deserunt excepturi nemo aliquam repudiandae nulla explicabo assumenda minus earum animi. Impedit id, maiores fuga.</p>
                </div></a><a class="portfolio__entry entry" href="#"><img class="wp-post-thumbnail" src="#" data-lazy="../images/portfolio/05.jpg" alt="DumDJ">
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