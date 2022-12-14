<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'key' => 'main.banner.title',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Онлайн-обучение английского языка на собственной платформе ',
            ],
            [
                'key' => 'main.banner.body',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Пройди бесплатный пробный урок на нашей платформе. Уже 1300 учеников прошли наше профессиональное обучение. ',
            ],
            [
                'key' => 'main.courses.title',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Выбери курсы, которые тебе нравятся',
            ],
            [
                'key' => 'main.courses.subtitle',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Онлайн программы, чтобы изучить один конкретный навык',
            ],
            [
                'key' => 'main.tab.title',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Как мы учим',
            ],
            [
                'key' => 'main.teachers.title',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Выберите преподователя, который тебе нравится',
            ],
            [
                'key' => 'main.teachers.subtitle',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Онлайн программы, чтобы изучить один конкретный навык',
            ],
            [
                'key' => 'main.news.title',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Наши новости',
            ],
            [
                'key' => 'main.news.subtitle',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Вся наша работа направлена на улучшение качества образования',
            ],
            [
                'key' => 'main.feedback.title',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Отзывы',
            ],
            [
                'key' => 'main.feedback.subtitle',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Предлагаем вам почитать отзывы наших учеников',
            ],
            [
                'key' => 'main.bid.title',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Оставьте заявку',
            ],
            [
                'key' => 'main.bid.subtitle',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Оставьте нам заявку мы свяжемся с вами и ответим на любые возникшие вопросы',
            ],
            [
                'key' => 'footer.contacts.address',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'РК, Алматы, пр. Назарбаева 301, ЖК Ренессанс, Блок Б2',
            ],
            [
                'key' => 'footer.contacts.phone',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => '8-700-732-48-99',
            ],
            [
                'key' => 'footer.contacts.email',
                'display_name' => 'Email',
                'type' => 'text',
                'value' => 'speedhackqq@gmail.com',
            ],
            [
                'key' => 'footer.copyright',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => '2020, Speedhack',
            ],
            [
                'key' => 'course.info',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Что вас ждет на этом курсе?',
            ],
            [
                'key' => 'course.fact',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Что вас ждет на этом курсе?',
            ],
            [
                'key' => 'course.program.title',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Наша программа курса',
            ],
            [
                'key' => 'free.lesson.title',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Получите бесплатный урок',
            ],
            [
                'key' => 'free.lesson.body',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Дарим пробный урок абсолютно бесплатно всем! Если хочешь получить его просто оставь нам свою почту, и течений часа мы отправим тебе ссылку в почту. Узнай подробнее о курсе ойлайн сейчас вместе от нашего учителя.',
            ],
            [
                'key' => 'free.lesson.btn',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Получить урок',
            ],
            [
                'key' => 'free.lesson.image',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => '/images/bg/b-12.png',
            ],
            [
                'key' => 'free.lesson.bid.title',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Стоимость обучения',
            ],
            [
                'key' => 'free.lesson.subtitle',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Первый урок бесплатный',
            ],
            [
                'key' => 'free.lesson.price',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => '18 000',
            ],
            [
                'key' => 'free.lesson.old_price',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => '24 000',
            ],
            [
                'key' => 'news.banner.title',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Узнайте первыми о наших новостях',
            ],
            [
                'key' => 'news.banner.subtitle',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Начните онлайн-обучение вместе с нами. Уже 2300 учеников прошли профессиональное обучение.',
            ],
            [
                'key' => 'news.title',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Наши новости',
            ],
            [
                'key' => 'news.subtitle',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Вся наша работа направлена на улучшение качества образования',
            ],
            [
                'key' => 'feedback.title',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Отзывы наших учеников',
            ],
            [
                'key' => 'feedback.subtitle',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Начните онлайн-обучение вместе с нами. Уже 2300 учеников прошли профессиональное обучение.',
            ],
            [
                'key' => 'feedback.bid.title',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Можете оставить отзыв',
            ],
            [
                'key' => 'feedback.bid.subtitle',
                'display_name' => 'Заголовок',
                'type' => 'text',
                'value' => 'Если вы ученик нашего образовательного центра то можете оставить нам отзыв',
            ],

            [
                'key' => 'offer',
                'display_name' => 'офертa',
                'type' => 'richtext',
                'value' => '<p class="ql-align-center"><span style="color: rgb(33, 37, 41);">ПУБЛИЧНЫЙ ДОГОВОР-ОФЕРТЫ</span></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">платформы онлайн-обучения “SpeedHack”</span></p><p><span style="color: rgb(33, 37, 41);">Настоящий договор между платформой онлайн-обучения SpeedHack , именуемым в дальнейшем «Платформа онлайн-обучения</span><span style="color: rgb(32, 33, 36);">»</span><span style="color: rgb(33, 37, 41);">, и пользователем услуг платформы онлайн-обучения, именуемым в дальнейшем «Покупатель» определяет условия приобретения услуг через сайт платформы онлайн-обучения&nbsp;SpeedHack</span></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">1.ОБЩИЕ ПОЛОЖЕНИЯ</span></p><p><span style="color: rgb(33, 37, 41);">1.1. Товарищество с ограниченной ответственностью “SpeedHack” публикует настоящий договор оказания услуг, являющийся публичным договором - офертой (предложением) в адрес физических и юридических лиц в соответствии со ст. 447 Гражданского Кодекса Республики Казахстан (далее – ГК РК).</span></p><p><span style="color: rgb(33, 37, 41);">1.2. Настоящая публичная оферта (именуемая в дальнейшем «Оферта») определяет все существенные условия договора между ТОО “SpeedHack” и лицом, акцептовавшим Оферту.</span></p><p><span style="color: rgb(33, 37, 41);">1.3. Настоящий договор заключается между Покупателем и Платформы онлайн-обучения в момент оформления заказа.</span></p><p><span style="color: rgb(33, 37, 41);">1.4. Оферта может быть принята любым физическим или юридическим лицом на территории Республики Казахстан, имеющим намерение приобрести услугу, реализуемые/предоставляемые ТОО “SpeedHack” через платформу онлайн-обучения, расположенный на сайте </span><a href="http://www.speedhack.kz/" rel="noopener noreferrer" target="_blank" style="color: rgb(33, 37, 41);">www.speedhack.kz</a></p><p><span style="color: rgb(33, 37, 41);">1.5. Покупатель безоговорочно принимает все условия, содержащиеся в оферте в целом (т.е. в полном объеме и без исключений).</span></p><p><span style="color: rgb(33, 37, 41);">1.6. В случае принятия условий настоящего договора (т.е. публичной оферты Платформы онлайн-обучения), физическое или юридическое лицо, производящее акцепт оферты, становится Покупателем.</span></p><p><span style="color: rgb(33, 37, 41);">1.7. Акцептом является получение Продавцом сообщения о намерении физического или юридического лица приобрести услугу на условиях, предложенных Платформой онлайн-обучения.</span></p><p><span style="color: rgb(33, 37, 41);">1.8. Оферта, все приложения к ней, а также вся дополнительная информация о услугах ТОО “SpeedHack”, опубликована на сайте&nbsp;</span><a href="http://www.speedhack.kz/" rel="noopener noreferrer" target="_blank" style="color: rgb(33, 37, 41);">www.speedhack.kz</a></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">2.СТАТУС ПЛАТФОРМЫ ОНЛАЙН-ОБУЧЕНИЯ</span></p><p><span style="color: rgb(33, 37, 41);">2.1. Платформа онлайн-обучения является собственностью ТОО “SpeedHack” и предназначен для организации дистанционного способа продажи услуг через сеть интернет.</span></p><p><span style="color: rgb(33, 37, 41);">2.2. Сделки Платформы онлайн-обучения, регулируются договором оказания услуг (см.ниже) на условиях публичной оферты, размещенным по адресу Жандарбекова 128, 5 этаж. Произведя акцепт оферты (т.е. оплату оформленного в платформе онлайн-обучения заказа), Покупатель получает в доступ к услуге на условиях Договора оказания услуг.</span></p><p><span style="color: rgb(33, 37, 41);">2.3.Платформа онлайн-обучения не несет ответственности за содержание и достоверность информации, предоставленной Покупателем при оформлении заказа.</span></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">3.СТАТУС ПОКУПАТЕЛЯ</span></p><p><span style="color: rgb(33, 37, 41);">3.1. Покупатель несет ответственность за достоверность предоставленной при оформлении заказа информации, и ее чистоту от претензий третьих лиц.</span></p><p><span style="color: rgb(33, 37, 41);">3.2. Покупатель подтверждает свое согласие с условиями, установленными настоящим Договором, путем проставления отметки в графе «Условия Договора мною прочитаны полностью, все условия Договора мне понятны, со всеми условиями Договора я согласен» при оформлении заказа.</span></p><p><span style="color: rgb(33, 37, 41);">3.3. Информация, предоставленная Покупателем является конфиденциальной. Покупатель предоставляя свои персональные данные, зарегистрировавшись на сайте или заполнении заявки дает своими действиями согласие на обработку его персональных данных в целях исполнения пользовательского соглашения. Платформа онлайн-обучения использует информацию о Покупателе исключительно в целях функционирования платформы онлайн-обучения (отправление уведомления Покупателю о выполнении заказа и т.д.) и в случаях, указанных в настоящем Договоре-оферте.</span></p><p><span style="color: rgb(33, 37, 41);">3.4. Использование ресурса Платформы онлайн-обучения для просмотра и выбора услуги, а также для оформления заказа является для Покупателя безвозмездным.</span></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">4.ПРЕДМЕТ ОФЕРТЫ</span></p><p><span style="color: rgb(33, 37, 41);">4.1. Платформа онлайн-обучения, на основании заказов Покупателя, продаёт Покупателю услугу в соответствии с условиями и по ценам, установленным Платформой онлайн-обучения в оферте и приложениях к ней.</span></p><p><span style="color: rgb(33, 37, 41);">4.2. Предоставление услуги, заказанных и оплаченных Покупателем, осуществляется Платформой онлайн-обучения или автором курса</span><span style="color: rgb(32, 33, 36);"> </span><span style="color: rgb(33, 37, 41);">. Покупатель имеет право перенести дату оказания услуг.</span></p><p><span style="color: rgb(33, 37, 41);">4.3. К отношениям между Покупателем и Платформой онлайн-обучения применяются положения ГК РК, Закон Республики Казахстан от 04.05.2010 N 274-IV "О защите прав потребителей", а также иные нормативные правовые акты, принятые в соответствии с ними.</span></p><p><span style="color: rgb(33, 37, 41);">4.4. Физическое или юридическое лицо считается принявшим все условия оферты (акцепт оферты) и приложений к ней в полном объеме и без исключений с момента получения Платформой онлайн-обучения сообщения о намерении Покупателя приобрести товар на условиях, предложенных Платформой онлайн-обучения. В случае акцепта оферты физическое или юридическое лицо считается заключившим с Платформой онлайн-обучения договора оказания услуг заказанных товаров и приобретает статус Покупателя.</span></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">5.ПОРЯДОК ЗАКЛЮЧЕНИЯ ДОГОВОРА ОКАЗАНИЯ УСЛУГ</span></p><p><span style="color: rgb(33, 37, 41);">5.1. Покупатель может оформить заказ самостоятельно на сайте платформы онлайн-обучения, либо через менеджера по телефонам, указанным на сайте, на условиях Договора оказания услуг (публичной оферты платформы онлайн-обучения).</span></p><p><span style="color: rgb(33, 37, 41);">5.2. При оформлении заказа в платформе онлайн-обучения, Покупатель обязан предоставить о себе информацию:</span></p><p><span style="color: rgb(33, 37, 41);">•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ф.И.О. (для физических лиц) или полное наименование, ИНН (для юридических лиц) Покупателя Услуги;</span></p><p><span style="color: rgb(33, 37, 41);">•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;контактный телефон и электронную почту Покупателя Услуги.</span></p><p><span style="color: rgb(33, 37, 41);">5.3. Волеизъявление Покупателя осуществляется посредством внесения последним соответствующих данных в форму заказа в платформе онлайн-обучения либо подачей заявки через менеджера платформе онлайн-обучения или по электронной почте (e-mail).</span></p><p><span style="color: rgb(33, 37, 41);">5.4.Платформа онлайн-обучения не редактирует информацию о Покупателе.</span></p><p><span style="color: rgb(33, 37, 41);">5.5. Для получения бумажного экземпляра Договора оказания услуг, Покупатель отправляет заявку по электронной почте или телефону, указанным на сайте.</span></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">6.ИНФОРМАЦИЯ ОБ УСЛУГАХ</span></p><p><span style="color: rgb(33, 37, 41);">6.1. Услуги представлен на сайте через пакеты курсов, являющиеся собственностью платформы онлайн-обучения.</span></p><p><span style="color: rgb(33, 37, 41);">6.2. Каждый пакет курсов - это план содержания услуги онлайн обучения сопровождается текстовой информацией и короткими видео обзорами о курсе: наименованием, содержанием, и т.д.</span></p><p><span style="color: rgb(33, 37, 41);">6.3. Платформой онлайн-обучения не несет ответственности за усвоение материала Покупателем, так как информация предоставляется всем в одинаковой форме&nbsp;</span></p><p><span style="color: rgb(33, 37, 41);">6.4. По просьбе Покупателя менеджер платформы онлайн-обучения обязан предоставить (по телефону или посредством электронной почты) прочую информацию, необходимую и достаточную, с точки зрения Покупателя, для принятия им решения о покупке товара.</span></p><p><span style="color: rgb(33, 37, 41);">6.5. Покупатель уведомлен о том, что приобретая услугу со скидкой, установленной в связи с его недостатками (дефектами), он лишается права ссылаться на них в дальнейшем.</span></p><p><span style="color: rgb(33, 37, 41);">&nbsp;</span></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">7.ПОРЯДОК ПРИОБРЕТЕНИЯ УСЛУГИ</span></p><p><span style="color: rgb(33, 37, 41);">7.1. Покупатель вправе оформить заказ на любую услугу, представленным в платформе онлайн-обучения. Каждая услугу может быть заказана в любом количестве. Исключения из указанного правила указаны в описании каждого товара в случае проведения акций, снятия услуги с продажи и т.п.</span></p><p><span style="color: rgb(33, 37, 41);">7.2. Заказ может быть оформлен Покупателем по телефонам, указанным на сайте, или оформлен самостоятельно на сайте.</span></p><p><span style="color: rgb(33, 37, 41);">7.3. После оформления заказа Платформой онлайн-обучения подтверждает заказ Покупателя путем отправления на e-mail Покупателя информации, подтверждающий принятие заказа, с указанием наименования, содержания, цены выбранной услуги и общей суммы заказа или менеджер платформы онлайн-обучения связывается с Покупателем по телефону.</span></p><p><span style="color: rgb(33, 37, 41);">7.4. При отсутствии услуги в доступе менеджер платформы онлайн-обучения обязан поставить в известность об этом Покупателя (по телефону или посредством электронной почты).</span></p><p><span style="color: rgb(33, 37, 41);">7.5. Покупатель вправе сделать предварительный заказ на временно отсутствующий в доступе услуги.</span></p><p><span style="color: rgb(33, 37, 41);">7.6. При отсутствии услуги Покупатель вправе заменить его другой услуги либо аннулировать заказ.</span></p><p><span style="color: rgb(33, 37, 41);">7.7. Срок оказания услуг, зависит от приобретенным пакета услуги Покупателем, утвержденным заранее в каталоге Платформы онлайн-обучения</span></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">8.ЦЕНА УСЛУГИ</span></p><p><span style="color: rgb(33, 37, 41);">8.1. Цена услуги в платформе онлайн-обучения указана в тенге Республики Казахстан за единицу товара.</span></p><p><span style="color: rgb(33, 37, 41);">8.2. Указанная на сайте цена услуги может быть изменена платформой онлайн-обучения в одностороннем порядке, при этом цена на заказанную и оплаченную Покупателем услугу изменению не подлежит.</span></p><p><span style="color: rgb(33, 37, 41);">8.3. Полная стоимость заказа состоит из каталожной стоимости услуги</span></p><p><span style="color: rgb(33, 37, 41);">8.4. Стоимость услуг, предоставляемых Покупателю Продавцом при покупке услуги в платформе онлайн-обучения указана в разделе «Каталог курсов».</span></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">&nbsp;</span></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">&nbsp;</span></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">9.ОПЛАТА УСЛУГИ</span></p><p><span style="color: rgb(33, 37, 41);">9.1. Способы и порядок оплаты услуги указаны на сайте в разделе «Каталог курсов». При необходимости порядок и условия оплаты заказанной услуги оговариваются Покупателем с менеджером платформы онлайн-обучения.</span></p><p><span style="color: rgb(33, 37, 41);">9.2. Оплата безналичным расчетом производится согласно оформленному счёту в течение трёх банковских дней. После поступления денежных средств на счет Платформы онлайн-обучения, менеджер платформы онлайн-обучения согласовывает с Покупателем срок начала оказания услуг.</span></p><p><span style="color: rgb(33, 37, 41);">9.3. Покупатель оплачивает заказ любым способом, выбранным в Платформе онлайн-обучения.</span></p><p><span style="color: rgb(33, 37, 41);">9.4. Расчеты Сторон при оплате заказа осуществляются в тенге Республики Казахстан.</span></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">10.ПЕРЕНОС ИЛИ ОТМЕНА УСЛУГИ</span></p><p><span style="color: rgb(33, 37, 41);">10.1. Покупатель вправе перенести, отменить и приостановить оказание услуг при соблюдений следующих условий:</span></p><p><span style="color: rgb(33, 37, 41);">10.1.1. Пользователь вправе перенести или отменить занятие, уведомив Платформу онлайн-обучения, не менее чем за 8 (восемь) часов до начала переносимого/отменяемого занятия. Несоблюдение указанного срока Пользователем означает, что Пользователь согласен на предлагаемое время проведения занятия, и если Пользователь пропускает занятие, то такое пропущенное занятие подлежит оплате в полном объеме. Пользователь может отменить не более 2 (двух) занятий в месяц, количество переносов занятий не ограничено. Перенести занятие можно только на свободное время, отмеченное доступным для переноса в расписании преподавателя.</span></p><p><span style="color: rgb(33, 37, 41);">10.2 Для переноса или отмены занятия Покупатель в срок, указанный в п. 10.1.1. Соглашения, направляет прикрепленному менеджеру Платформы онлайн-обучения&nbsp;соответствующее уведомление. Уведомления о переносе или отмене занятия принимаются 24 (двадцать четыре) часа в сутки 7 (семь) дней в неделю.</span></p><p><span style="color: rgb(33, 37, 41);">&nbsp;</span></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">11.ОТВЕТСТВЕННОСТЬ СТОРОН</span></p><p><span style="color: rgb(33, 37, 41);">13.1. Стороны несут ответственность в соответствии с законодательством РК.</span></p><p><span style="color: rgb(33, 37, 41);">13.2. Платформа онлайн-обучения не несет ответственности за усваиваемость обучения, полученный Покупателю вследствие использования им услуги, оплаченных в платформе онлайн-обучения.</span></p><p><span style="color: rgb(33, 37, 41);">13.3. Стороны освобождаются от ответственности за неисполнение или ненадлежащее исполнение обязательств по договору на время действия непреодолимой силы.</span></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">12.ПРОЧИЕ УСЛОВИЯ</span></p><p><span style="color: rgb(33, 37, 41);">14.1. К отношениям между Покупателем и Платформой онлайн-обучения применяется законодательство Республики Казахстан.</span></p><p><span style="color: rgb(33, 37, 41);">14.2. При необходимости Платформа онлайн-обучения и Покупатель вправе в любое время оформить договор оказания услуги в форме письменного двухстороннего соглашения, не противоречащего положениям настоящей оферты.</span></p><p><span style="color: rgb(33, 37, 41);">14.3. В случае возникновения вопросов и претензий со стороны Покупателя, он должен обратиться в отдел продаж ТОО “SpeedHack” по адресу: Жандарбекова 128, 5 этаж, по телефону:</span></p><p><span style="color: rgb(33, 37, 41);">&nbsp;+7 (700) 199 - 81 - 00&nbsp;или по e-mail:&nbsp;speedhackqq@gmail.com</span></p><p><span style="color: rgb(33, 37, 41);">14.4. Настоящий договор вступает в силу с даты акцепта Покупателем настоящей оферты и действует до полного исполнения обязательств Сторонами.</span></p><p><span style="color: rgb(33, 37, 41);">14.5. Все споры и разногласия, возникающие при исполнении Сторонами обязательств по настоящему договору, решаются путем переговоров. В случае невозможности их устранения, Стороны имеют право обратиться за судебной защитой своих интересов.</span></p><p><span style="color: rgb(33, 37, 41);">14.6.Платформа онлайн-обучения оставляет за собой право расширять и сокращать услуги на сайте, регулировать доступ к покупке любых услуг, а также приостанавливать или прекращать продажу любых услуг по своему собственному усмотрению.</span></p><p class="ql-align-center"><span style="color: rgb(33, 37, 41);">15.АДРЕС И РЕКВИЗИТЫ ПЛАТФОРМЫ ОНЛАЙН-ОБУЧЕНИЯ</span></p><p><span style="color: rgb(33, 37, 41);">Наименование:&nbsp;SpeedHack</span></p><p><span style="color: rgb(33, 37, 41);">Юридический адрес:&nbsp;Жандарбекова 128</span></p><p><span style="color: rgb(33, 37, 41);">БИН:&nbsp;210540036274</span></p><p><span style="color: rgb(33, 37, 41);">&nbsp;р/с в тенге:&nbsp;KZ719470398993596431</span></p><p><span style="color: rgb(33, 37, 41);">р/с в рублях:&nbsp;KZ879470643000394725</span></p><p><span style="color: rgb(33, 37, 41);">в банке:&nbsp;АО ДБ “Альфа-Банк”</span></p><p><span style="color: rgb(33, 37, 41);">БИК:&nbsp;ALFAKZKA</span></p><p><span style="color: rgb(33, 37, 41);">БИН банка:&nbsp;941240000341</span></p><p class="ql-align-center">&nbsp;</p>',
            ],
        ];

        Setting::insert($settings);
    }
}
