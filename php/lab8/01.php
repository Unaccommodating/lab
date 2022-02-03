<?php

$json = file_get_contents("main.json");
$array = json_decode($json, true);
$array['1']['click'] += 1;
$jsonNew = json_encode($array);  

$file = fopen('main.json','w+');
fwrite($file, $jsonNew);
fclose($file);

if (isset($_POST["01"])) {
  $json = file_get_contents("main.json");
  $array = json_decode($json, true);
  $array["1"]["buy"] += 1;
  $jsonNew = json_encode($array);  

  $file = fopen('main.json','w+');
  fwrite($file, $jsonNew);
  fclose($file);  
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>практика</title>
</head>
  <body>
  <form method="post">
    <input type="submit" name="01" value="Заказать">
</form>
      <p>"С чего начать создание системы Электронной Коммерции или Интернет-магазина?", - спрашиваете вы. Но сначала давайте уточним, какое из звеньев торговой цепочки занимает ваша компания? Какую часть своих бизнес-процессов она хотела бы перевести в электронную форму? И, наконец, какие именно сферы вашей деятельности можно оптимизировать, используя Интернет-технологии?
Что такое система электронной коммерции?
Электронная Коммерция - это любая форма бизнес-процесса, в котором взаимодействие между субъектами происходит электронным способом (с использованием Интернет-технологий).
Организация бизнес-процессов
Для построения системы Электронной коммерции очень важна логичная система производственно-коммерческих отношений, когда компании строят бизнес в здоровой и "прозрачной" экономике, стремясь к выгоде и стабильности. И этот "прозрачный", офлайновый бизнес естественным образом становится основой для онлайнового. В России производственные и коммерческие отношения достаточно часто в силу разных причин выстроены "нелогично". Поэтому зачастую внедрение информационных систем (а затем и систем Электронной Коммерции) в отечественных компаниях нередко идет "с трудом". Бизнес-процессы необходимо перестраивать, чтобы они органично вписались в электронную коммерцию. Информационные технологии и Интернет, в данном случае, - мощный стимул перестройки, а в отдельных случаях даже построения бизнес-процессов.
Следовательно, начинать надо с "логичной" организации бизнес-взаимодействия между участниками торгового процесса.
Участники торгового процесса
Можно выделить четыре уровня взаимоотношений участников торгового процесса. Они и служат базой для создания системы Электронной Коммерции:
Производитель - дистрибутор
Дистрибутор - дилер
Дистрибутор - продавец
Покупатель
Любой из этих уровней может быть частично или полностью переведен в систему Электронной Коммерции.
Важно помнить, что Электронная Коммерция - это лишь одна из форм ведения бизнеса.
Каждой компании мы рекомендуем определить наиболее выгодное или важное звено в бизнес-цепочке и сделать ставку именно на него. Если, к примеру, производителю выгодно работать с дистрибуторами, потому что это наиболее рентабельно, - значит, с помощью системы электронной коммерции надо максимально оптимизировать работу с дистрибуторами.
*********************************************
Производственная компания
Для компании-производителя оптимальный вариант "начала" - внедрить Торговую Интернет Систему (ТИС) и методы Электронной Коммерции в работу сбытовых подразделений компании.
Для максимального экономического эффекта от внедрения системы Электронной Коммерции, информационная система сбыта должна быть "состыкована" с системой планирования производства и системой организации поставок. Таким образом можно минимизировать многие статьи расходов - ТИС позволяет исключить затраты на офлайновые складские запасы готовой продукции, комплектующих и т.д.
Электронная поддержка каналов сбыта и снабжения обычно осуществляется разными методами. Для того чтобы их "увязать", необходимо наличие информационной системы предприятия (ERP-системы или корпоративной информационной системы).
При разработке Торговой Интернет Системы (ТИС), ее интерфейсов и информационного наполнения, разработчики должны исходить из принципа, что любой Интернет-ресурс должен ориентироваться на конкретную группу. Если, например, производитель ориентируется на работу с дистрибуторско-дилерской сетью, то его ТИС должна в первую очередь привлекать дистрибуторов-дилеров. Было бы ошибкой использовать Интернет как место "складирования" информации по принципу "заходи, кто хочешь, бери, что нужно". Интернет-система должна быть максимально удобной и простой для входа в нее конкретного потребителя извне - дистрибутора, в данном случае.
Процесс создания Интернет-системы отличается от построения традиционной информационной системы. Web-интерфейс и Web-технологии предоставят вам огромные возможности, но одна из особенностей в том, что они требуют наличия в коллективе разработчиков бригады, которую принято называть "контентной". Работа этой бригады наиболее близка к редакционной работе - это работа с информацией (текстами, данными, графикой), систематизацией, редактированием и представлением этой информации на экране. ТИС является частью имиджа компании, а зачастую - ее лицом. Большую роль играет возможность персонализации информации, которую видит пользователь. Именно эти факторы и создают на экране компьютера удобную, понятную и привлекательную для потребителя среду.
Преимущества и недостатки прямых продаж
Нужно ли производителю организовывать прямые продажи, используя Электронную Коммерцию? Если ваша производственная компания хочет действовать, активно привлекая Интернет, то она должна иметь и каналы для прямых продаж. Однако, далеко не каждый производитель может себе позволить прямые продажи. В этой области есть, как минимум, две проблемы.
Первая: при переходе на прямые продажи придется решать вопросы взаимодействия с традиционными, дистрибуторско-дилерскими, каналами сбыта. Чем крупнее производитель, тем легче ему решить этот вопрос. Но небольшие производственные компании должны очень хорошо продумать новую схему взаимоотношений с традиционными каналами сбыта.
Вторая проблема при организации прямых продаж заключается в том, что небольшим производственным компаниям сложно выстроить взаимоотношения с курьерскими службами. Услуги крупных курьерских систем (например, UPS, DHL, TNT) обойдутся недешево, но они гарантируют высокий уровень сервиса по всему миру. В небольших курьерских компаниях услуги дешевле, но при этом снижается уровень гарантий доставки товара и охват регионов. Значит, в первом случае товар небольшого производственного предприятия может оказаться неконкурентным по цене доставки (поскольку объемы доставки невелики), а во втором случае компании придется договариваться с несколькими курьерским службами, что тоже скажется на конечной цене товара.
Производитель может ограничить зону своих прямых продаж до "локального уровня" (например - Московская область и 2-3 района вокруг Московской области) и заключить договор с одной-двумя курьерскими службами - это возможный вариант организации прямых продаж. При этом производитель входит в новый для себя бизнес - взаимодействие с системами курьерской доставки (ведь раньше он работал только с крупными дистрибуторами). Этот новый бизнес может оказаться для него нерентабельным из-за того, что все "локально" - объемы маленькие, цены высокие.
Вопросы эти непростые, и точные рекомендации в рамках статьи дать, наверное, сложно. Если компания намеревается осуществлять прямые продажи, используя Интернет-технологии, ей можно порекомендовать обратиться к консалтинговым компаниям, которые помогут проанализировать ситуацию и принять правильное решение.
Дистрибутор
Инициатива создания Торговой Интернет Системы на уровне "производитель-дистрибутор" может исходить и от дистрибутора. В данном случае это будет Интернет-система снабжения Дистрибутора. Многие этапы в построении такой системы поставок для дистрибутора те же, что и для системы сбыта производителя. Для дистрибуторской компании также важно создание Торговой Интернет Системы (ТИС) для поддержки продаж.
Какой вопрос сразу встает перед руководством дистрибуторской компании при создании системы Электронной Коммерции? Тот же, что и перед производителем: стоит ли продавать товар по схеме прямых продаж конечному покупателю и "обходить" розничных продавцов или продолжать работать через дилеров? Решение по этому вопросу должна принять сама компания. Возможно, также необходим мониторинг существующей дилерской сети с целью определения наиболее слабых участков. Если такие "провалы" есть, то можно рекомендовать перейти на прямые поставки в этих регионах.
Дилерская часть торговой системы дистрибутора обязательно должна быть гибкой - дистрибутору важно поддержать не только крупных дилеров, но и начинающих. Для них переход на электронно-коммерческую систему взаимоотношений может оказаться наиболее привлекательным и даст возможность выйти на новый уровень бизнеса.
Электронно-коммерческая система, поддерживающая дилерскую сеть, открывает для дистрибутора новые возможности, например, "обход" промежуточных звеньев на пути реализации товара конечному покупателю.
Возможна организация электронно-коммерческого взаимодействия между регионально распределенными дистрибуторами. В этом случае на систему Электронной Коммерции возлагаются следующие функции:
передача друг другу регионально распределенных заказов;
передача информации о состоянии складов, расположенных в разных местах;
представление информации о работе системы конечным покупателям.
Эти функции обязательны для каждой системы. Любому дистрибутору, для начала нужно понять, каков его "ареал распространения". Находится ли он в одном регионе или в нескольких, может ли он организовать нормальную логистику по одному или по всем регионам и т.д. Когда мониторинг будет проведен, (самостоятельно, или с помощью консультантов), то создание правильной торговой Интернет-системы станет возможным. Дилером в цепочке дистрибутор-дилер может быть региональный покупатель, мелкий оптовик, а может и розничный магазин. Все это нужно четко определить до того, как начнет строиться система Электронной Коммерции.
Розничная продажа (retail)
Организация электронно-коммерческой системы "под" розничную продажу имеет свои особенности. "Розница" уже имеет цену на товар, приближенную к предельным суммам. Розничному торговцу сложно начать заниматься прямыми поставками в другие регионы. Чем больше расстояние, тем менее перспективно заниматься глобальными прямыми поставками. Единственное исключение - торговая сеть. Например, "Седьмой континент" или "Копейка" - система магазинов-дискаунтеров.
Если уже существующая торговая сеть рассматривает вопрос о создании нескольких магазинов-дискаунтеров, ей обязательно нужно использовать Интернет-торговлю, которая замечательно решает этот вопрос. Интернет-магазины - это именно магазины-дискаунтеры. В "дискаунтере" цены ниже, чем в обычном магазине, но главное, в таком магазине все удобно "упаковано", расфасовано по определенным весовым категориям, есть весь спектр сравнительно дешевых товаров. И эта технология очень удобна для Интернет-магазина, поэтому магазины в Интернет обязательно надо строить как "дискаунтеры", т.е. с низкими ценами, нормированными упаковками.
Покупатель (потребитель)
Если потребитель - крупная организация, то с помощью технологий Электронной Коммерции она, в первую очередь, может решить вопросы упорядочивания взаимоотношений между партнерами, контрагентами, а также внутрикорпоративных связей. Многие холдинги работают между собой по схеме взаимных обязательств. Здесь Электронная Коммерция может существенно помочь. Несмотря на то, что связи выстроены, решения Электронной Коммерции дадут экономию операционных издержек на поддержание функционирования холдинга в удобном и быстром режиме.
Задача номер один - упорядочить отношения между субъектами компании - службами сбыта, доставки, логистическими системами и т.д. Электронно-коммерческая база позволит решить эту непростую задачу наиболее быстрым способом. Крупным корпорациям можно предложить для начала определить взаимоотношения между субъектами структуры и ответить на вопрос: кто, что, кому, когда поставляет. Тогда станет ясно, каким же подразделениям нужно в первую очередь переходить на электронно-коммерческие рельсы, для кого это наиболее необходимо. Практика показывает, что сначала нужно прописать и определить функции каждого субъекта раздельно, и лишь потом работать над тем, чтобы объединять их в единую систему, построенную на базе Электронной Коммерции.
Адекватность компании своим планам в области электронной коммерции
Вопрос "с чего начать" заключается еще и в том, чтобы в онлайновой области быть «адекватным» своим офлайновым функциям. Новые каналы сбыта должны соответствовать существующему бизнесу, они не могут возникнуть с нуля. Даже если Интернет-магазин создан, но он не соответствует офлайновому бизнесу, он не будет иметь успеха.
И именно это является причиной, по которой мы рекомендуем вам строить свой Интернет-бизнес путем перехода из «офлайна» в «онлайн», а не путем организации абсолютно всего с нуля. К примерам стремительного взлета компаний, которые возникли как «чистые» Интернет-торговые компании, на наш взгляд, нужно относиться достаточно осторожно. В последнее время появились прогнозы, что многие такие компании будут иметь трудности в развитии (http://www.e-commerce.ru/news/1904/7.html), поскольку на Интернет-рынок сегодня выходят компании, традиционно занимавшие сильные позиции в офлайновом торговом бизнесе.
С чего начинать создание Интернет-магазина
Интернет-магазин или Web-витрина - это форма работы в Интернете, форма действенной презентации своего бизнеса в Интернете. Интернет-магазин может быть у производителя, у дистрибутора, у Retailer’а. На Web-витрине могут быть представлены практически любые товары, распределенные как по ассортименту, так и по региональному принципу.
Форма того, как покупатель будет выбирать товар, регион, способ доставки, способ платежей - это и есть Web-витрина, Интернет-магазин.
Бизнес, который вынесен в Интернет - отражение офлайнового бизнеса. Таким образом, вашей компании в процессе создания Интернет-магазина придется решать не только задачи простого переноса в Web-форму прайс-листа, склада, системы заказов, но обеспечивать действенную связь виртуального мира с реальным, с внутренней жизнью компании. Именно поэтому мы предпочитаем именовать это Торговая Интернет Система, а не просто магазин.
Если ваша компания собирается серьезно интегрировать офлайновый бизнес в онлайновый, нужно быть готовыми к тому, что требования к вашему авторитету в бизнесе возрастут. Информация о той или иной компании в Интернете четко фиксируется и накапливается. Поэтому промашек быть не должно. Система будет работать эффективно и приносить прибыль только в том случае, если она проработана до мелочей система заказов, закупок и снабжения, которая по определению должна быть очень четкой. Интернет проявляет эти недостатки как лакмусовая бумажка. Поэтому. Требования адекватности компании своим Интернет-устремлениям, тем самым, выходят на первый план.
Другой, не менее важный аспект работы в Интернете - существенно большее, чем в обычном бизнесе, значение доли рынка (marketshare). Российский Интернет один, и если у вашей компании есть доля на этом рынке, то следует говорить о стране в целом, а не о каком-то отдельном регионе. Поэтому значимость достижения определенного уровня marketshare для Интернет-компании существенно выше, чем для офлайн-компаний.
Возврат товара при онлайновых розничных продажах
Это большая и серьезная тема. В США процедура возврата в традиционной торговле хорошо отработана, но и в этих условиях после окончания рождественских продаж в 2000 г. уже возникали проблемы с возвратом товаров, которые покупатели дарили своим друзьям, родственникам по заказам через Интернет.
Эта проблема связана не с Интернет - она связана с общей культурой системы торговли и работой служб доставки. Интернет лишь обостряет проблему.
Как организовать работу с консалтинговыми компаниями
Ни одно серьезное начинание не должно обходиться без поддержки и советов специалистов. Консультирование обычно начинается с вопросов организации бизнес-схемы ТИС и разработки проектного задания, в которое войдет бизнес-схема и проработка вопросов организации всего проекта в целом.
В первую очередь, в проектном задании отражаются вопросы взаимодействия организаций, входящих в торговый процесс. Производителю надо будет с каждым из дистрибуторов договариваться о переходе на новые для него формы электронно-коммерческого взаимодействия, заключать дополнительные договоры. Понятно, что перестройка каналов сбыта варьируется от небольших изменений до серьезных переломных решений. Это обсуждается в каждом конкретном случае в зависимости от существующих методов работы, готовности партнеров к внедрению методов Электронной Коммерции. Например, в цепочке производитель-дистрибутор последнего нужно будет обучить новым методам ведения бизнеса, представить информационные материалы. Весь спектр этих вопросов должен быть отражен в проектном задании.
Следующий важный аспект работы консультанта - это организационные вопросы. Достаточно часто для организации Интернет-продаж целесообразно создание нового юридического лица - самостоятельной организации, ориентированной только на Интернет-торговлю. Но для того, принять это решение, нужно обязательно проконсультироваться с финансовой, юридической точки зрения и т.д.
Только завершив начальные этапы консультирования, на которых будут определены бизнес-схемы и организационные аспекты организации Торговой Интернет Системы, можно переходить к технологическим вопросам построения системы.
Организационно-хозяйственные вопросы развития системы электронной коммерции
Организационный процесс не менее важен. Компания не может не участвовать в создании Интернет-проекта, поскольку является его генератором, и, в то же время, основой. Поэтому мы рекомендуем провести следующие организационные мероприятия:
Выделить Интернет-торговый проект в отдельную организационную структуру (вплоть до отдельного юридического лица). Матричная структура (когда для участия в проекте назначаются сотрудники из разных подразделений) в данном случае не подходит. Специальный отдел должен иметь "своих" менеджеров: логистика, специалиста по снабжению и сбыту, который будут полностью ориентированы на Интернет-технологии.
Обеспечить непосредственную подчиненность Интернет-проекта руководству компании.
Руководителем проекта должен быть менеджер, хорошо понимающий основной бизнес компании и принимавший участие в управлении этим бизнесом. В принципе, необязательно, чтобы он был экспертом в области IT и Интернет. Должна быть сформирована команда бизнес-экспертов, которые могут влиять на принятие решения и выбор технологий, опираясь на рекомендации IT- и Интернет-специалистов.
Резюме к сказанному
Главное, что нужно определить: насколько логично выстроен ваш офлайновый бизнес и готов ли он к переходу на электронно-коммерческие рельсы. Еще одна важная задача - определить рентабельность Интернет-проекта применительно именно к вашей компании.
В зависимости от того, каким участником торгового процесса является ваша компания, необходимо решить, какие бизнес-процессы надо перевести в Интернет.
Экономический эффект и минимизация расходов произойдет лишь в том случае, если электронно-коммерческая система сбыта будет тесно связана с системой снабжения и планирования. Решить эту задачу под силу лишь профессиональным консультантам.
Интернет-проект требует особого отношения. Перед запуском системы Электронной Коммерции необходимо предпринять несколько важных шагов: выделение нового проекта в отдельную структуру, создание команды специалистов-менеджеров и бизнес-экспертов и обеспечение непосредственного контроля руководства за реализацией Интернет-проекта.</p> 
  </body>
</html>