<?php
require_once "db.php";

$result = $conn->query("SELECT * FROM products WHERE id = 1");
$product = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Шнекороторный снегоуборщик <?= htmlspecialchars($product["title"] ?? "СМ1200") ?> — TundraTech</title>
  <meta
    name="description"
    content="Шнекороторный снегоуборщик <?= htmlspecialchars($product["title"] ?? "СМ1200") ?> — решение для эффективной зимней уборки снега."
  />
  <link rel="canonical" href="https://tundra-tech.ru/sng" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
  <header class="site-header">
    <div class="container site-header__inner">
      <a class="logo" href="#top" aria-label="TundraTech">
        <img src="images/tild6462-3531-4733-b465-373439346638__logo_.png" alt="TundraTech logo" class="logo__img">
      </a>

      <button
        class="burger"
        type="button"
        aria-label="Открыть меню"
        aria-expanded="false"
        aria-controls="mobile-menu"
      >
        <span></span>
        <span></span>
        <span></span>
      </button>

      <nav class="nav" aria-label="Основная навигация">
        <a class="nav__link" href="#hero">Главная</a>
        <a class="nav__link" href="#specs">Характеристики</a>
        <a class="nav__link" href="#video">Видео</a>
        <a class="nav__link" href="#contacts">Контакты</a>
      </nav>

      <div class="header-actions">
        <a class="contact-chip" href="tel:+74912701981">+7 (4912) 70-19-81</a>
        <a class="btn btn--primary btn--small" href="#order-modal">Заказать</a>
      </div>
    </div>

    <div class="mobile-menu" id="mobile-menu">
      <nav class="mobile-menu__nav" aria-label="Мобильная навигация">
        <a class="mobile-menu__link" href="#hero">Главная</a>
        <a class="mobile-menu__link" href="#specs">Характеристики</a>
        <a class="mobile-menu__link" href="#video">Видео</a>
        <a class="mobile-menu__link" href="#contacts">Контакты</a>
        <a class="btn btn--primary btn--full" href="#order-modal">Оставить заявку</a>
      </nav>
    </div>
  </header>

  <main id="top">
    <section class="hero reveal reveal-up" id="hero">
      <div class="container hero__grid">
        <div class="hero__content">
          <p class="hero__subtitle"><?= htmlspecialchars($product["subtitle"] ?? "Шнекороторный снегоуборщик") ?></p>
          <h1 class="hero__title"><?= htmlspecialchars($product["title"] ?? "СМ1200") ?></h1>
          <p class="hero__text">
            Надёжное оборудование для быстрой и эффективной уборки снега.
            Подходит для расчистки территорий и помогает уверенно работать зимой.
          </p>

          <div class="hero__price">
            <span class="hero__price-current"><?= htmlspecialchars($product["current_price"] ?? "210 000 ₽") ?></span>
            <span class="hero__price-old"><?= htmlspecialchars($product["old_price"] ?? "250 000 ₽") ?></span>
            <span class="hero__badge"><?= htmlspecialchars($product["discount"] ?? "-16%") ?></span>
          </div>

          <div class="hero__actions">
            <a class="btn btn--primary" href="#order-modal">Заказать</a>
            <a class="btn btn--secondary" href="#specs">Подробнее</a>
          </div>

          <ul class="hero__list">
            <li>Ширина захвата — <?= htmlspecialchars($product["width_value"] ?? "1200 мм") ?></li>
            <li>Крутящий момент — <?= htmlspecialchars($product["torque_value"] ?? "33.5 Нм") ?></li>
            <li>Дальность выброса — <?= htmlspecialchars($product["distance_value"] ?? "до 7 м") ?></li>
          </ul>
        </div>

        <div class="hero__media">
          <img src="images/tild3038-3538-4361-b330-306133323661_____33.png" alt="Снегоуборщик <?= htmlspecialchars($product["title"] ?? "СМ1200") ?>" />
        </div>
      </div>
    </section>

    <section class="section" id="specs">
      <div class="container">
        <div class="section-head reveal reveal-up">
          <p class="section-kicker">Преимущества</p>
          <h2 class="section-title">Характеристики <?= htmlspecialchars($product["title"] ?? "СМ1200") ?></h2>
          <p class="section-text">
            Снегоуборщик рассчитан на интенсивную эксплуатацию и помогает быстро
            очищать территорию от снега.
          </p>
        </div>

        <div class="cards">
          <article class="card reveal reveal-left delay-1">
            <div class="card__label">Ширина захвата</div>
            <div class="card__value"><?= htmlspecialchars($product["width_value"] ?? "1200 мм") ?></div>
          </article>

          <article class="card reveal reveal-up delay-2">
            <div class="card__label">Крутящий момент</div>
            <div class="card__value"><?= htmlspecialchars($product["torque_value"] ?? "33.5 Нм") ?></div>
          </article>

          <article class="card reveal reveal-up delay-3">
            <div class="card__label">Дальность выброса</div>
            <div class="card__value"><?= htmlspecialchars($product["distance_value"] ?? "до 7 м") ?></div>
          </article>

          <article class="card reveal reveal-right delay-4">
            <div class="card__label">Стоимость</div>
            <div class="card__value"><?= htmlspecialchars($product["current_price"] ?? "210 000 ₽") ?></div>
          </article>
        </div>

        <div class="about reveal reveal-up">
          <div class="about__media">
            <img src="images/tild3434-3662-4764-b639-303031323962__e59c4583-d55c-4607-8.png" alt="Снегоуборщик в работе" />
          </div>
          <div class="about__content">
            <h3 class="about__title"><?= htmlspecialchars($product["about_title"] ?? "Мощный и практичный помощник зимой") ?></h3>
            <p class="about__text"><?= nl2br(htmlspecialchars($product["about_text"] ?? "СМ1200 легко справляется с сугробами и позволяет быстро очистить площадку, дорогу или территорию возле объекта. Надёжная конструкция и высокая эффективность делают его удобным решением для зимней работы.")) ?></p>
            <a class="btn btn--primary" href="#order-modal">Оставить заявку</a>
          </div>
        </div>
      </div>
    </section>

    <section class="section section--alt" id="video">
      <div class="container video reveal reveal-scale">
        <div class="video__content">
          <p class="section-kicker">Видео</p>
          <h2 class="section-title"><?= htmlspecialchars($product["title"] ?? "СМ1200") ?> в работе</h2>
          <p class="section-text">
            Посмотрите, как снегоуборщик справляется с зимней расчисткой в реальных условиях.
          </p>
        </div>

        <div class="video__embed">
          <iframe
            src="https://rutube.ru/play/embed/65f68033e612fee2fa277fa28f2cda1e"
            title="<?= htmlspecialchars($product["title"] ?? "СМ1200") ?> в работе"
            loading="lazy"
            allowfullscreen
          ></iframe>
        </div>
      </div>
    </section>

    <section class="section cta">
      <div class="container">
        <div class="cta__box reveal reveal-up">
          <div>
            <p class="section-kicker">Связь с нами</p>
            <h2 class="section-title">Оставьте заявку</h2>
            <p class="section-text">
              Ответим на вопросы, поможем с заказом и подскажем по комплектации.
            </p>
          </div>
          <a class="btn btn--primary" href="#order-modal">Позвоните мне</a>
        </div>
      </div>
    </section>
  </main>

  <footer class="site-footer reveal reveal-up" id="contacts">
    <div class="container footer">
      <div class="footer__col">
        <div class="footer__brand">TundraTech</div>
        <p class="footer__text">
          Шнекороторные снегоуборщики и оборудование для зимней уборки.
        </p>
      </div>

      <div class="footer__col">
        <div class="footer__title">Телефоны</div>
        <a class="footer__link" href="tel:+74912701981">+7 (4912) 70-19-81</a>
        <a class="footer__link" href="tel:+79206352900">+7 (920) 635-29-00</a>
      </div>

      <div class="footer__col">
        <div class="footer__title">Мессенджеры</div>
        <a class="footer__link" href="https://t.me/" target="_blank" rel="noopener noreferrer">Telegram</a>
        <a class="footer__link" href="https://wa.me/79206352900" target="_blank" rel="noopener noreferrer">WhatsApp</a>
      </div>
    </div>
  </footer>

  <div class="modal" id="order-modal" aria-hidden="true">
    <div class="modal__backdrop"></div>
    <div class="modal__dialog" role="dialog" aria-modal="true" aria-labelledby="modal-title">
      <button class="modal__close" type="button" aria-label="Закрыть">×</button>

      <h2 class="modal__title" id="modal-title">Заявка на заказ</h2>
      <p class="modal__text">
        Оставьте свои контакты, и мы свяжемся с вами.
      </p>

      <form class="form" id="order-form">
        <label class="form__field">
          <span>Ваше имя</span>
          <input type="text" name="name" placeholder="Введите имя" required />
        </label>

        <label class="form__field">
          <span>Телефон</span>
          <input type="tel" name="phone" placeholder="+7 (___) ___-__-__" required />
        </label>

        <button class="btn btn--primary btn--full" type="submit">
          Отправить заявку
        </button>

        <p class="form__agreement">
          Нажимая кнопку, вы соглашаетесь на обработку персональных данных.
        </p>
        <p class="form__message" id="form-message" hidden></p>
      </form>
    </div>
  </div>

  <script src="assets/js/main.js"></script>
</body>
</html>