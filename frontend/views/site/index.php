<?php
use kartik\slider\Slider;
/* @var $this yii\web\View */

if(isset($settings->title) and !empty($settings->title)) { $this->title = $settings->title; }
if(isset($settings->keywords) and !empty($settings->keywords)) { $this->registerMetaTag(['name' => 'keywords','content' => $settings->keywords]); }
if(isset($settings->description) and !empty($settings->description)) { $this->registerMetaTag(['name' => 'description','content' => $settings->description]); }

?>

<script>
    function fun1() {
        var rng=document.getElementById('slider1'); //rng - это Input
        var p=document.getElementById('amount'); // p - абзац
        p.innerHTML=rng.value;
    }
    function fun2() {
        var rng=document.getElementById('slider2'); //rng - это Input
        var p=document.getElementById('term'); // p - абзац
        p.innerHTML=rng.value;
    }
</script>

<section class="content">
    <div class="container">
        <div class="form__wrap">
            <form class="form" id="register" action="/" method="post">
                <h2 class="form__title">Оформить заявку на микрокредит</h2>
                <div class="form__item">
                    <div class="form__item-title amount">Я хочу получить <span id="amount"><?php echo $settings->amount ?></span>  тенге</div>
                    <input type="range"  class="form__slider"  name="Register[amount]" id="slider1" min="<?php echo $settings->min_amount ?>" max="<?php echo $settings->amount ?>" step="500" value="<?php echo $settings->amount ?>"  oninput="fun1()">
                    <!--                    <div id="slider1" class="form__slider"></div>-->
                </div>
                <div class="form__item">
<!--                    <div class="form__item-title amount">На срок <span class="form__item-span">10</span>  дней</div>-->
                    <div class="form__item-title amount">На срок <span id="term"><?php echo $settings->term ?></span>  дней</div>
<!--                    <div id="slider2" class="form__slider"></div>-->
                    <input type="range"  class="form__slider__term"  name="Register[term]" id="slider2" min="<?php echo $settings->min_term ?>" max="<?php echo $settings->term ?>" step="1" value="<?php echo $settings->term ?>"  oninput="fun2()">

                </div>
                <div class="form__line"></div>
                <div class="form__registration">
                    <div class="form__registration-row">
                        <div class="form__registration-item">
                            <label class="form__registration-label">Фамилия</label>
                            <input type="text" name="Register[surname]" placeholder="Иванов" class="form__registration-input " autocomplete="off" value="" required>
                        </div>
                        <div class="form__registration-item">
                            <label class="form__registration-label">Имя</label>
                            <input type="text" placeholder="Иван" name="Register[name]" class="form__registration-input " autocomplete="off" value="" required>
                        </div>
                        <div class="form__registration-item">
                            <label class="form__registration-label">Отчество</label>
                            <input type="text" placeholder="Иванович" name="Register[patronymic]" class="form__registration-input " autocomplete="off" value="">
                        </div>
                        <div class="form__registration-item form-group">
                            <label class="form__registration-label">ИИН</label>
                            <input type="text" id="tin" class="form__registration-input" name="Register[tin]" autocomplete="off" required>
                        </div>
                        <div class="form__registration-item">
                            <label class="form__registration-label">Мобильный телефон</label>
                            <input type="text" id="phone" class="form__registration-input" name="Register[phone]" placeholder="+7 (___) ___-__-__" required>
                            <span>Пожалуйста, укажите Ваш контактный телефон</span>
                        </div>
                        <div class="form__registration-item">
                            <label class="form__registration-label">Email</label>
                            <input type="text" class="form__registration-input " name="Register[email]" autocomplete="off" required>
                            <span>Пожалуйста, укажите Ваш email</span>
                        </div>
                        <div class="form__registration-item">
                            <label class="form__registration-label">Место проживания</label>
                            <input type="text" class="form__registration-input " name="Register[residence]" autocomplete="off" placeholder="Введите название населенного пункта" required>
                        </div>
                        <div class="form__registration-item accept">
                            <input type="checkbox" id="accept__privacy" name="accept__privacy" required>
                            <label for="accept__privacy">Я согласен с <a href="#" target="_blank">правилами</a> предоставления микрокредитов и других услуг и даю <a href="#" target="_blank">согласие</a>  на обработку моих персональных данных</label>
                        </div>
                        <button type="submit" name="submit" onclick="if(this.form.accept__privacy.checked){alert('Для продолжения регистрации необходимо дать согласие на обработку персональных данных');return false}" class="form__registration-btn">Оставить заявку</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<div class="line">
    <div class="container">
        <div class="line__row"></div>
    </div>
</div>
<section class="main-text">
    <div class="container">
        <div class="main-text__text">
            <p>Микрокредит онлайн – это возможность быстро занять средства через интернет на любые цели. Граждане Республики Казахстан оценили по достоинству дистанционные кредиты, а потому оформляют их в ситуации, когда деньги нужны срочно, а в банке ждет отказ. </p>

            <p>Непредвиденные расходы застали врасплох? Не хватает денег на важную покупку, лечение или ремонт? В «Честном слове» вам выдадут микрокредит в режиме онлайн! Доступ к нашему сайту не ограничен территорией или временем суток, поэтому здесь вы получите нужную сумму, как только ощутите потребность в финансах.</p>
        </div>

        <?php echo $settings->content ?>

        <div class="main-text__readmore readmore">Подробнее</div>
    </div>
</section>
