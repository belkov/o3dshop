<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
{include file='ru/Elem/Header.tpl'}
<body>
	<div class="main">
    	<header>
        	<div class="grid">
                <a href="/" class="logo">
                    <img src="/img/logo.png" alt="#" />
                </a>
                {include file='ru/Elem/Menu.tpl'}
                <button id="login-first-page">Личный кабинет</button>
            </div>
        </header>
        <div class="content clearfix">
            <div class="block_01">
                <div class="info">
                	<span>Моментальное подключение более 50 способов приема платежей!</span>
                    <ul>
                    	<li>Моментальное подключение более 50 способов оплаты.</li>
                        <li>Минимальная комиссия сервиса без абонентской платы.</li>
                        <li>Встроенная партнерская программа для каждого товара от 10 до 100%</li>
                    </ul>
                    <div class="clearfix"></div>
                    <button id="register-first-page">Зарегистрироваться!</button>
				</div>
            	<div class="mouse"></div>
            </div>
            <div class="block_02">
            	<div class="grid">
                    <span>Как мы работаем?</span>
                    <ul>
                        <li><img  src="/img/block_02_01.png" alt="#" />1. Регистрация на сайте ClickPay24.ru</li>
                        <li><img  src="/img/block_02_02.png" alt="#" />2. Добавляете свой товар или услугу</li>
                        <li><img  src="/img/block_02_03.png" alt="#" />3. Получаете ссылку для приёма оплат</li>
                        <li><img  src="/img/block_02_04.png" alt="#" />4. Получаете деньги на Webmoney, Qiwi, Visa, MasterCard</li>
                    </ul>
                </div>
            </div>
            <div class="block_03">
            	<div class="grid">
                    <div class="statistic">
                    	<span>Наша статистика:</span>
                        <ul>
                            <li>Активных пользователей:<strong>{$count_partner.count}</strong></li>
                            <li>Зарегистрировано товаров:<strong>{$count_product.count}</strong></li>
                            <li>Партнерских переходов:<strong>{$forSite.forSite}</strong></li>
                        </ul>
                    </div> 
                    <span>Что говорят о ClickPay24.ru?</span>
                    <ul>
                        <li><strong>Сергей Завгородний</strong>помогает нам без проблем принимать платежи в Интернете. Настроен полностью автоматизированный процесс приема денег от клиентов и отправки товаров покупателям. Прием платежей на сайт ставится буквально за несколько минут...</li>
                        <li><strong>Ирина Мальцева</strong>Сервис КликПей24 – Это «СУПЕР СИСТЕМА»  для Интернет предпринимателей! КликПей24 буквально в один клик подключит к вашему сайту систему платежей, более 50 способов ,а также продвинутую партнерскую программу для ваших товаров.</li>
                        <li><strong>Анатолий Степанцев</strong>Нашел сервис ClickPay и сразу стало понятно, что это очень полезная система. Все очень удобно, никаких настроек ,плюс партнерская программа. На все возникшие вопросы оперативно отвечает отзывчивая техническая поддержка.</li>
                    </ul>
					<button onclick="window.location='/blog/'">Больше отзывов</button>
                </div>
            </div>
            <div class="block_04">
            	<div class="grid">
                    <span>Почему выбирают ClickPay24.ru?</span>
                    <div class="block_04_more">
                    	<img src="/img/block_04_01.jpg" alt="#" />
                    	<strong>Забота о клиентах:</strong>
                        <ul>
                        	<li>Моментальное подключение более 50 способов оплаты</li>
                            <li>Минимальная комиссия сервиса без абонентской платы	</li>
                            <li>Встроенная партнерская программа для каждого товара от 10 до 100%</li>
                            <li>Наличие пополняющегося каталога партнерских программ</li>
                        </ul>
                    </div>
                    <div class="block_04_more">
                    	<img src="/img/block_04_02.jpg" alt="#" />
                    	<strong>Коммуникация:</strong>
                        <ul>
                        	<li>Cистема внутренних сообщений с каждым партнером</li>
                            <li>Оперативная и внимательная служба поддержки</li>
                            <li>Интеграция с сервисами рассылок - выгрузка списков клиентов для проведения специальных акций и релизов</li>
                        </ul>
                    </div>
                    <div class="block_04_more">
                    	<img src="/img/block_04_03.jpg" alt="#" />
                    	<strong>Автоматизация:</strong>
                        <ul>
                        	<li>Автоматическая доставка цифровых товаров после оплаты</li>
                            <li>Выплаты два раза в неделю на электронные кошельки,Visa и Mastercard</li>
                            <li>Автоматическая рассылка по пользователям о новинках каталога</li>
                            <li>Автоматическое напоминание о неоплаченных заказах</li>
                        </ul>
                    </div>
                    <div class="block_04_more">
                    	<img src="/img/block_04_04.jpg" alt="#" />
                    	<strong>Дополнительно:</strong>
                        <ul>
                        	<li>Получайте вознаграждение, <a href="#">продвигая сервис</a></li>
                            <li>Подробная статистика внутри системы</li>
                            <li>Возможность индивидуальной смены размера комиссии для партнеров</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="block_05" style="min-height:100px !important;">
            
            	<div class="grid">
            		<!--
                    <span>Наши цены</span>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th>&nbsp;</th>
                        <th><strong>Начало</strong></th>
                        <th><strong>Лайт</strong></th>
                        <th><strong>Стандарт</strong></th>
                        <th><strong>Премиум</strong></th>
                      </tr>
                      <tr>
                        <td>Количество товаров:</td>
                        <td>1</td>
                        <td>2</td>
                        <td>5</td>
                        <td>неограничено</td>
                      </tr>
                      <tr>
                        <td>Промо-акции:</td>
                        <td>2</td>
                        <td>5</td>
                        <td>10</td>
                        <td>неограничено</td>
                      </tr>
                      <tr>
                        <td>Списки покупателей:</td>
                        <td>2</td>
                        <td>5</td>
                        <td>10</td>
                        <td>неограничено</td>
                      </tr>
                      <tr>
                        <td>Максимальная цена продукта:</td>
                        <td>3000 руб.</td>
                        <td>6000 руб.</td>
                        <td>9000 руб.</td>
                        <td>30 000 руб.</td>
                      </tr>
                      <tr>
                        <td>Кол-во новых диалогов:</td>
                        <td>5 в день</td>
                        <td>10 в день</td>
                        <td>20 в день</td>
                        <td>неограничено</td>
                      </tr>
                      <tr>
                        <td>Хранилище:</td>
                        <td>10 Мб</td>
                        <td>20 Мб</td>
                        <td>50 Мб</td>
                        <td>неограничено</td>
                      </tr>
                      <tr>
                        <td>Партнеры:</td>
                        <td>неограничено</td>
                        <td>неограничено</td>
                        <td>неограничено</td>
                        <td>неограничено</td>
                      </tr>
                      <tr>
                        <td>Продвижение:</td>
                        <td>неограничено</td>
                        <td>неограничено</td>
                        <td>неограничено</td>
                        <td>неограничено</td>
                      </tr>
                      <tr>
                        <td>Статистика:</td>
                        <td>неограничено</td>
                        <td>неограничено</td>
                        <td>неограничено</td>
                        <td>неограничено</td>
                      </tr>
                      <tr>
                        <td>Стоимость:</td>
                        <td><strong>бесплатно</strong></td>
                        <td>500 руб. ***</td>
                        <td>1500 руб. ***</td>
                        <td>2900 руб. ***</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><button class="blue">Попробовать</button></td>
                        <td><button>Попробовать</button></td>
                        <td><button>Попробовать</button></td>
                        <td><button>Попробовать</button></td>
                      </tr>
                    </table>
					<p>* Если вы собираетесь продавать товар стоимостью более 30 000 руб. - напишите нам и мы попытаемся сделать для вас исключение. <br />
                    ** Место под загрузку промо материалов и баннеров.<br />
                    *** Это стоимость разовой регистрации, абонентской платы на нашем сервисе нет.</p>
                    -->
                    <span>Мы принимаем:</span>
                    
                    <div class="slider">
                        <div class="slide-list">
                            <div class="slide-wrap">
                                <div class="slide-item">
                                    <span><img src="/img/img_01.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_02.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_03.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_04.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_05.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_06.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_07.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_01.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_02.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_03.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_04.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_05.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_06.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_07.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_01.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_02.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_03.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_04.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_05.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_06.png" alt="#" /></span>
                                </div>
                                <div class="slide-item">
                                    <span><img src="/img/img_07.png" alt="#" /></span>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="navy prev-slide"></div>
                        <div class="navy next-slide"></div>
                    </div>
                </div>
            </div>
        </div>
    	<div class="clearfix"></div>
    </div>
    <footer>
    	<div class="grid">
            <div class="footer_block">
                <a href="#" class="logo"><img src="/img/logo.png" alt="#" /></a>
                <div class="clearfix"></div>
                © 2012–2015 <a href="#">ClickPay24.ru</a>. <br />Сервис моментального приема платежей <br />и каталог партнерских программ.
            </div>
            
            <div class="footer_block">
                <ul>
                    <li class="margin"><a href="#">Карта сайта</a></li>
                    <li><a href="#">Условия</a></li>
                    <!--<li><a href="#">Тарифы</a></li>-->
                    <li><a href="#">Продавцам</a></li>
                    <li><a href="#">Партнерам</a></li>
                    <li><a href="#">Партнерка сервиса</a></li>
                    <li><a href="#">Инструменты</a></li>
                    <li><a href="#">Отзывы и предложения</a></li>
                    <li><a href="#">Служба поддержки</a></li>
                    <li><a href="#">Лидеры недели</a></li>
                </ul>
            </div>
            <div class="footer_block">
                <ul>
                    <li class="margin"><a href="#">О нас</a></li>
                    Сервис ClickPay24.ru поможет поставить продажи инфобизнеса на автопилот! Войдите в <a href="#">личный кабинет</a>, и вы БЕСПЛАТНО получите готовый интернет-магазин, <br />
                    интегрированный с партнерской программой и службой умных е-мейл рассылок.
                    <div class="clearfix"></div>
                    <!--
                    <div class="soc">
                    	<a href="#" class="fb"></a>
                    	<a href="#" class="vk"></a>
                    	<a href="#" class="tw"></a>
                    	<a href="#" class="yt"></a>
                    </div>
                    -->
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>