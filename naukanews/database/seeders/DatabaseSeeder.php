<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->rubrics();
        $this->articles();
        $this->roles();
        $this->users();
    }

    private function rubrics(): void
    {
        DB::table('rubrics')->insert(
            [
                'name' => 'Искусственный интеллект'
            ]
        );
        DB::table('rubrics')->insert(
            [
                'name' => 'Искусственная нейронная сеть'
            ]
        );
        DB::table('rubrics')->insert(
            [
                'name' => 'Распознавание образов'
            ]
        );
        DB::table('rubrics')->insert(
            [
                'name' => 'Робототехника'
            ]
        );
        DB::table('rubrics')->insert(
            [
                'name' => 'Информационное общество'
            ]
        );
        DB::table('rubrics')->insert(
            [
                'name' => 'Автоматическая обработка текста'
            ]
        );
    }

    private function articles(): void
    {
        DB::table('articles')->insert(
            [
                'title' => 'В Москве планируется создать нейросеть для считывания показаний счётчиков.',
                'lid' => 'В российской столице стартовал эксперимент по созданию электронного сервиса на основе нейронных сетей для сбора показаний счётчиков воды по фотографиям.',
                'content' => 'Как сообщает Официальный портал Мэра и Правительства Москвы, проект курирует Департамент информационных технологий. Специальные алгоритмы, как ожидается, позволят с высокой надёжностью распознавать показания счётчиков по снимкам, сделанным на камеру мобильных устройств. Обучить быстрому и точному распознаванию показаний нейросеть планируют до конца года. Для этого создатели сервиса просят горожан принять участие в эксперименте, прислав фотографии своих счётчиков. Чем больше фотографий получит система, тем быстрее нейросеть сможет обучиться распознавать показания без ошибок. Для отправки изображений регистрация не требуется.',
                'image' => 'a1.jpg',
                'rubric_id' => 2
            ]
        );
        DB::table('articles')->insert(
            [
                'title' => 'За переводы в Facebook теперь полностью отвечает искусственный интеллект.',
                'lid' => 'Facebook долгое время работала над улучшением переводов текста в публикациях и комментариях.',
                'content' => 'Теперь она объявила о том, что эта работа завершена. Благодаря искусственному интеллекту переводы в социальной сети станут гораздо точнее. Раньше Facebook использовала модели машинного перевода на основе фраз. Система разбивала предложения на слова или словосочетания, из-за чего качество перевода целого предложения зачастую оставляло желать лучшего. Особенно сильно это было заметно, когда сервис переводил на язык со структурой, которая значительно отличается от структуры языка оригинального текста. Теперь сайт переводит с помощью нейронных сетей, которые принимают во внимание содержимое всего предложения, а также его контекст. Благодаря этом перевод становится в разы точнее и живее. Пример представлен на картинке. Первый вариант — результат работы фразовой системы, второй — нейронной сети.',
                'image' => 'a2.jpg',
                'rubric_id' => 6
            ]
        );
        DB::table('articles')->insert(
            [
                'title' => 'Нейронные сети Google упростят создание приложений с поддержкой распознавания объектов.',
                'lid' => 'Смартфоны быстро стали одной из главных обителей искусственного интеллекта.',
                'content' => 'На замену алгоритмам, которые работают в облаке и передают обработанную информацию на устройства через Интернет, пришло программное обеспечение, которое производит вычисления прямо на телефонах и планшетах. Google уделяет такому ПО особое внимание. Последний пример искусственного интеллекта от калифорнийского поискового гиганта — MobileNets, набор нейронных сетей машинного зрения, которые адаптированы под работу на мобильных устройствах. Есть нейронные сети разных размеров: чем больше сеть, тем более мощный процессор должен быть у телефона.
MobileNets может использоваться для анализа лиц, обнаружения объектов, геопозиционирования фотографий. Нейронная сеть может, например, определить породу собаки на изображении. Инструменты легко поддаются адаптации, поэтому им можно найти массу применений. По словам Google, производительность сетей варьируется в зависимости от задач. Но в целом они либо соответствуют современным стандартам, либо близки к ним.',
                'image' => 'a3.jpg',
                'rubric_id' => 3
            ]
        );
        DB::table('articles')->insert(
            [
                'title' => 'Носимое устройство на базе ИИ отличает человека от машины по голосу.',
                'lid' => 'Команда австралийских исследователей из технологического агентства DT представила устройство для тех, кто боится, что скоро отличить человека от машины будет невозможно.',
                'content' => 'Носимая система под названием Anti-AI AI определяет синтетическую речь и предупреждает пользователя, что голос, который он слышит, не принадлежит человеку. Прототип устройства был разработан всего за пять дней. Он работает на нейронной сети на базе системы машинного обучения Tensorflow от Google. Исследователи натренировали искусственный интеллект, используя базу данных синтетических голосов. Так сеть научилась распознавать образцы искусственной речи. Носимое устройство захватывает звук и отправляет его в облако. Если оно распознаёт синтетическую речь, то тонко намекает человеку, что он общается не с себе подобным. Вместо того, чтобы предупреждать пользователя посредством света, звука или вибраций, прототип делает это с помощью миниатюрного термоэлектрического охлаждающего элемента. «Мы хотели, чтобы устройство давало носителю уникальное ощущение, которое соответствует тому, что он чувствует, когда понимает, что голос синтетический», — объяснили разработчики.',
                'image' => 'a4.jpg',
                'rubric_id' => 3
            ]
        );
        DB::table('articles')->insert(
            [
                'title' => 'Oracle внедрила искусственный интеллект в свои облачные сервисы.',
                'lid' => 'Компания Oracle наделила большинство своих облачных приложений искусственным интеллектом, чтобы предложить корпоративным клиентам современные и многофункциональные решения.',
                'content' => 'Приложения Oracle Adaptive Intelligent Apps с искусственным интеллектом встроены в сервисы Oracle Cloud Applications и ориентированы на использование в таких областях, как финансы, управление персоналом, цепочки поставок, электронная коммерция, маркетинг, продажи и услуги. Представленные технологии могут использоваться, к примеру, для работы чат-ботов, дающих автоматические ответы на вопросы клиентов или сотрудников компаний. «Новые функции искусственного интеллекта позволяют использовать собственные данные и данные третьих лиц в сочетании с расширенным алгоритмом машинного обучения и продуманными методами принятия решений, что обеспечивает предложение самых эффективных в отрасли современных бизнес-приложений на базе искусственного интеллекта», — отметил исполнительный вице-президент Oracle по разработке бизнес-приложений Стив Миранда. Согласно пресс-релизу Oracle, приложения Oracle Adaptive Intelligent Apps помогают оптимизировать финансовые процессы и требования к технологиям, сокращать расходы, модернизировать операции и улучшать качество взаимодействия, совершенствовать управление персоналом, повысить операционную эффективность, рационализировать процессы и улучшать потребительский опыт посредством использования клиентских данных и соответствующих новостных уведомлений.',
                'image' => 'a5.jpg',
                'rubric_id' => 1
            ]
        );
        DB::table('articles')->insert(
            [
                'title' => 'Найдены области мозга, которые распознают летящий в лицо предмет.',
                'lid' => 'Французские нейробиологи, просканировав мозг двух макак-резусов, обнаружили регионы мозга, которые отвечают за предсказание столкновения с предметом и оценку возможных последствий.',
                'content' => 'Способность эффективно распознавать движущиеся объекты, определяя хищников и потенциальную добычу, необходима для выживания в джунглях. Ранее было показано, что быстро приближающийся к лицу объект, имитирующий движение хищника, вызывает защитную реакцию как у человекоподобных обезьян, так и у маленьких детей. Эти наблюдения предполагают, что мозг способен предсказывать траекторию движения угрожающих стимулов и оценивать возможные последствия от столкновения с ними. В новом исследовании французским ученым удалось зафиксировать активность мозга, сопряженную с подобной оценкой, и выяснить, какие именно регионы мозга за нее отвечают. Активность головного мозга двух макак-резусов измеряли при помощи имплантированной системы для функциональной магнитно-резонансной томографии. Анализ данных фМРТ выявил сеть нейронов, которые активизируются при обнаружении приближающегося к лицу предмета и столкновении с ним. Результаты исследования свидетельствуют, что мозг макак способен интегрировать данные от разных органов чувств, используя визуальную информацию для прогноза тактильных ощущений.',
                'image' => 'a6.jpg',
                'rubric_id' => 2
            ]
        );
        DB::table('articles')->insert(
            [
                'title' => 'Для распознавания лиц импульсная нейронная сеть лучше, чем свёрточная.',
                'lid' => 'Результаты исследования свидетельствуют, что мозг макак способен интегрировать данные от разных органов чувств, используя визуальную информацию для прогноза тактильных ощущений.',
                'content' => 'Искусственный интеллект, строящийся по принципу нейронных сетей, может распознавать лица эффективней, чем применяемые сейчас системы. Оказывается, ещё лучше, если нейронная сеть — импульсная. Как утверждают разработчики программного обеспечения BrainChip Studio из компании BrainChip, механизм действия такой сети ближе, чем у других нейронных сетей, к тому, как работает головной мозг человека. Когда система видеонаблюдения производит захват лица на изображении, ПО BrainChip Studio с помощью механизма нейронной сети строит модель этого лица. После обнаружения следующего лица ПО сравнит две нейронных модели и примет решение о том, один это человек или разные. Находя одно и то же лицо многократно, система отследит перемещение человека. В отличие от других разработчиков, специалисты компании используют не свёрточные нейронные сети, а импульсные, которые, лучше копируют принципы работы головного мозга человека. Если в импульсной сети через синапс многократно проходит один и тот же сигнал, эта связь усиливается, а прочие сигналы воспринимаются как шум и постепенно всё надёжней подавляются. Импульсная нейронная сеть способна, как и человек, увидев что-либо один раз, запомнить это навсегда. Компьютерная программа, работающая по принципу свёрточной нейронной сети, имеет дело с базами данных и должна обучаться в течение дней и недель. Импульсная нейронная сеть не требует больших вычислительных мощностей и, к тому же, может «понимать» что-то сразу.',
                'image' => 'a7.jpg',
                'rubric_id' => 2
            ]
        );
        DB::table('articles')->insert(
            [
                'title' => 'Медики обнаружили новое полезное свойство чтения.',
                'lid' => 'Привычка читать помогает людям развивать чувство эмпатии, то есть способность сопереживать другим.',
                'content' => 'К такому выводу пришли исследователи из США. Авторы исследования измеряли активность мозга в тот момент, когда участники эксперимента читали на трех разных языках. Оказалось, что чтение является универсальным средством, которое усиливает чувство эмпатии вне зависимости от происхождения человека или его родного языка. Ученые из Университета Южной Калифорнии обнаружили рисунки в активности мозга, которые отмечаются в тот момент, когда люди находили какой-то смысл в историях вне зависимости от своего языка. Исследователи применяли функциональную МРТ для наблюдений за реакцией мозга на чтение на английском, фарси или путунхуа (самый распространённый и официальный диалект в Китае). Результаты исследования позволяют предположить, что чтение оказывает очень широкий эффект в деле развития чувства эмпатии и собственного мироощущения человека. Эти выводы справедливы даже с учётом фундаментальных различий в языке, алфавите и порядке чтения. При чтении на всех трёх языках ученые наблюдали уникальные рисунки активности мозга в особых зонах. Данная нейронная сеть связывала области мозга вроде средней префронтальной коры и гиппокампа. Учёные считают, что чтение участвует в одном из самых загадочных для неврологов процессов, который определяет наше понимание мира. Именно посредством чтения в мозге человека формируются некоторые специфические представление об окружающих его явлениях и людях, которые имеют очень большое значение.',
                'image' => 'a8.jpg',
                'rubric_id' => 2
            ]
        );
        DB::table('articles')->insert(
            [
                'title' => 'Власти передумали строить федеральную Wi-Fi-сеть в российских городах.',
                'lid' => 'В распоряжении CNews оказался проект Плана мероприятий по реализацию раздела «Информационная инфраструктура» программы «Цифровая экономика».',
                'content' => 'Документ разработан рабочей группой при центре компетенций по данному направлению, созданному на базе «Ростелекома». В документе не в полной мере отражены идеи, ранее заложенные в «Цифровую экономику» по данному пункту. В частности, программа предполагала строительство федеральной сети Wi-Fi. До конца 2020 г. планировалась запустить такие сети в двух российских городах-миллионниках и десяти городах с числом жителей от 100 тыс человек. Однако в проекте плана мероприятий об этом не говорится. Два источника, близких к соответствующей рабочей группе, подтвердили CNews, что проект строительства федеральной сети Wi-Fi в российских городах планируется исключить из программы «Цифровая экономика». Такое решение может быть связано с тем, что программа также предполагает строительстве сотовых пятого поколения (5G), что делает неочевидным необходимость в городских Wi-Fi-сетях. Несмотря на это, в документе остался пункт о создании производства в России оборудования для беспроводных сетей 802.16 ax (Wi-Fi со скоростями доступа до 2,5-5 Гбит/с). Также говорится о том, что при разработке национального плана обеспечения населения широкополосным доступом в интернет необходимо предусмотреть наличие Wi-Fi в общественных местах. Из дорожной карты программы «Цифровая экономика» исчез пункт о строительстве федеральной сети Wi-Fi. Сохранился и пункт об упрощении процедур регистрации точек доступа Wi-Fi мощностью до 100 мВт.',
                'image' => 'a9.jpg',
                'rubric_id' => 5
            ]
        );
        DB::table('articles')->insert(
            [
                'title' => 'На МКС появится искусственная гравитация.',
                'lid' => 'На новом российском модуле, который будет в будущем запущен к МКС, установят специальную центрифугу, которая создаст искусственную гравитацию.',
                'content' => 'О создании искусственной гравитации на борту МКС со ссылкой на руководителя Института медико-биологических проблем (ИМБП) РАН Олега Орлова сообщило издание «РИА Новости». Специальная центрифуга будет размещена на борту трансформируемого модуля от РКК «Энергия», концептуально похожего на американский BEAM. Последний является экспериментальным надувным жилым модулем. По словам Орлова, сначала будет создан макет центрифуги. Затем, после отработки технологий, будет построена центрифуга малого радиуса, которая и отправится к МКС. Если быть точнее, речь идет о вращающемся цилиндре, где центробежная сила будет имитировать земное притяжение. Точные размеры центрифуги не называются. А вот NASA в 2005 году закрыло программу, в рамках которой планировалось запустить к МКС модуль с центрифугой для создания искусственной гравитации.',
                'image' => 'a10.jpg',
                'rubric_id' => 4
            ]
        );
    }

    private function roles(): void
    {
        DB::table('roles')->insert(
            [
                'name' => 'user'
            ]
        );
        DB::table('roles')->insert(
            [
                'name' => 'admin'
            ]
        );
    }

    private function users(): void
    {
        DB::table('users')->insert(
            [
                'name' => 'Евгений',
                'login' => 'user',
                'password' => 'user',
                'role_id' => 1
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Евгений',
                'login' => 'admin',
                'password' => 'admin',
                'role_id' => 2
            ]
        );
    }
}
