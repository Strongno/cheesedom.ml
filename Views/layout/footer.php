<footer id="footer" class="grid_12">
    <div class="row clearfix">
        <div class="line overlay clearfix">&nbsp;</div>
        <div class="widgets clearfix">
            <div class="grid_3 alpha">
                <h4>Общее</h4>
                <a href="contact.html">Информация о нас</a><br />
                <a href="/deliver">Побробности доставки</a><br />
                <a href="/faq">Вопросы</a><br />
            </div>
            <div class="grid_3">
                <h4>Пользователь</h4>
                <a href="/user/cabinet">Кабинет пользователя</a><br />
                <a href="/cart">Корзина пользователя</a><br />
            </div>
            <div class="grid_3">
                <h4>Сайт</h4>
                <a href="/history">Наша история</a><br />
                <a href="/news">Новости</a><br />
                <a href="/sitemap">Карта сайта</a>
            </div>
            <div class="grid_3 omega">
                <h4>Подписка</h4>
                <p>
                    Подпишись, что бы всегда быть в курсе всех обновлений.
                </p>
                <form action="" method="post">
                    <input type="text" name="email" class="large newsletter-text float-l" placeholder="E-mail" />
                    <a href="#" class="button has-icon newsletter-button border overlay float-l"><span>&nbsp;</span></a>
                </form>
            </div>
        </div>
        <div class="line overlay clearfix">&nbsp;</div>
    </div>
    <div class="clearfix">
        <div class="float-l">
            <div class="logo-small">
                <img src="../../template/images/logo-small.png" alt="" />
            </div>
            <div class="copyright">
                &copy; 2016 РуМиНа. All rights reserved. Designed by <a href="http://vk.com/oleshka23">Oleshka</a><br />
                <a href="http://themeforest.net/user/entiri/?ref=entiri" target="_blank">Cheesedom.ru</a>
            </div>
        </div>
        <div class="float-r">
            <ul class="social-icon clearfix">
                <li class="facebook"><a href="#">&nbsp;</a></li>
                <li class="twitter"><a href="#">&nbsp;</a></li>
                <li class="dribbble"><a href="#">&nbsp;</a></li>
                <li class="forrst"><a href="#">&nbsp;</a></li>
                <li class="linkedin"><a href="#">&nbsp;</a></li>
            </ul>
        </div>
    </div>

</footer> <!-- #footer -->

</div>
<div class="content-border-bottom container_12">&nbsp;</div>
<script>
    $(document).ready(function () {
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            var quantity = $(this).parent().parent().find('input[type=text]').val();
            console.log(quantity);
            $.ajax({
                type: "POST",
                url: "/cart/addAjax/" + id,
                data: 'find=' + quantity,
                success: function (data) {
                    var obj = $.parseJSON(data);
                    $('.label-text').html(obj.items + ' вида, ');
                    $('.label-mass').html(obj.quant + ' Кг');
                }
            });
        });
        $('.basket').click(function () {
            location.href = '/cart';
        })
    });
</script>