<?php include_once(ROOT.'/Views/layout/header.php'); ?>

<div class="clearfix"></div>

<div class="grid_12">
    <aside class="left-panel grid_3 alpha" style="margin-top:50px;">
        <ul class="flat-menu">
            <li>
                <a href="#">Сортировка по категориям</a>
                <ul style='margin-top:50px;'>
                    <?php foreach($categoryList as $item): ?>
                    <li><a href="/category/<?php echo $item['id']; ?>" style="font-size:18px;font-weight:bold; text-transform:uppercase; font-family:Courier New;"> <?php echo $item['name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
    </aside>

    <section id="content" class="grid_9 omega">
        <article id="options-filter" class="post-filter overlay box-outline" style="margin-top:60px;">
            <form action="/product" method="POST">
                <label>Сортировать по</label>
                <select data-option-key="sortBy" name='sortBy'>
                    <?php
                    $sortValues = array(
                    'price' => 'Цене',
                    'header' => 'Алфавиту',
                    'id' => 'По умолчанию', );
                    ?>
                    <option value=""><? if (isset($_SESSION['sortBy'])) echo $sortValues[$_SESSION['sortBy']]; else echo 'Выбрать'; ?></option>
                    <option value="price">Цене</option>
                    <option value="header">Алфавиту</option>
                    <option value="id">По умолчанию</option>
                </select>
                <input type='submit' value="Применить" name='submit_sort'>
            </form>
            <div class="options" data-option-key="layoutMode">
                <a href="#" class="filter-button icon-th-large" data-option-value="fitRows">&nbsp;</a>
                <a href="#" class="filter-button icon-align-justify" data-option-value="straightDown">&nbsp;</a>
            </div>
        </article>
        <div class="clearfix"></div>

        <article class="cat-title">
            <span></span>
        </article>
        <div class="clearfix"></div>

        <div id="products" class="isotope straightDown">
<?php if (isset($productList)) : ?>
<?php foreach($productList as $productItem): ?>
            <article class="post-entry plastic" style="border:1px solid #cbcbcb;">

                <div class="post-media">

                    <?php
                    // Если есть картинка
                    if ($productItem['image'] == true):
                    ?>
                    <a href="/product/<?php echo $productItem['id']; ?>"><img src="<?php echo $productItem['image']; ?>.jpg" width="220" heigth="220" style="width:100%;" alt="" /></a>
                    <? endif; ?>

<?php //Если картинки нету
if ($productItem['image'] == false):
?>
                    <img src="../../template/images/no_image.png" width="220" heigth="220" style="width:100%;" alt="" />
                    <? endif; ?>	
                </div>
                <div class="post-content" >
                    <a class="post-title" href='/product/<?php echo $productItem['id']; ?>'><?php echo $productItem['header']; ?></a>
                    <span class="price" style="color:#daa474;font-family:bold; font-size:20px; float:right;margin-right:20px">
<?php echo $productItem['price']; ?> -   грн за кг
                    </span></br>
                    <p class="post-desc" style="margin-bottom:0px; height:100px; overflow:hidden; width:100%;"><?php echo $productItem['body']; ?></p>

                    

                        <input type='text' placeholder="500 грамм"  style="width:100px; height:20px" name='quantity'>
                        <div style="float:left;margin-left:150px;">
                            <a  class="add-to-cart" data-id="<?php echo $productItem['id']; ?>" style='line-height:30px;margin-left:20%;color:white;position:relative' >
                                <input type='button' style='position:absolute;height:35px;line-height: 15px;' value='В корзину'>
                            </a>
                        </div>
                </div>
            </article>
<?php endforeach; ?>
<?php endif; ?>
        </div>
<?php echo $pagination->get(); ?>
        <!--
        <article class="pagination">
                <div class="paginate">
                        <a class="prev page-numbers" href="#">&lt; Previous</a>
                        <a class="page-numbers" href="#">1</a>
                        <span class="page-numbers current">2</span>
                        <a class="page-numbers" href="#">3</a>
                        <a class="page-numbers" href="#">4</a>
                        <span class="page-numbers dots">…</span>
                        <a class="page-numbers" href="#">10</a>
                        <a class="next page-numbers" href="#">Next &gt;</a>
                </div>
        -->
        </article>
        <div class="clearfix"></div>
    </section> <!-- #content -->
</div>
<?php include_once(ROOT.'/Views/layout/footer.php'); ?>	
</div>
<script type="text/javascript">
    // initialise plugins
    jQuery(document).ready(function ($) {
        $("ul.sf-menu").supersubs({
            minWidth: 10, // minimum width of sub-menus in em units
            maxWidth: 15, // maximum width of sub-menus in em units
            extraWidth: 1     // extra width can ensure lines don't sometimes turn over
        }).superfish({autoArrows: false,
            disableHI: false,
            dropShadows: false,
            onShow: function () {
                $('ul.sf-menu ul ul').show().css({'visibility': 'visible', width: '100%'});
            },
            onHide: function () {
                $('ul.sf-menu ul ul').show().css({'visibility': 'visible', width: '100%'});
            }
        });

        var basketTimeout;

        $('.basket .basket-button, .basket .basket-text').click(function () {
            var b = $('.basket-dropdown');

            if (basketTimeout)
                window.clearTimeout(basketTimeout);

            if (b.is(":visible")) {
                b.fadeOut();
                return;
            }

            b.fadeIn().show();
            basketTimeout = window.setTimeout(function () {
                b.fadeOut();
            }, 2000);
        });

        $('.basket-dropdown').mouseenter(function () {
            if (basketTimeout)
                window.clearTimeout(basketTimeout);
        }).mouseleave(function () {
            var $this = $(this);
            basketTimeout = window.setTimeout(function () {
                $this.fadeOut();
            }, 1000);
        });

        $('[placeholder]').focus(function () {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
                input.removeClass('placeholder');
            }
        }).blur(function () {
            var input = $(this);
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.addClass('placeholder');
                input.val(input.attr('placeholder'));
            }
        }).blur();

        $('select').uniform();

        var $container = $('#products');
        $container.isotope({
            sortBy: 'original',
            getSortData: {
                price: function ($elem) {
                    var value = $('.price', $elem).attr('data-value');
                    return parseInt(value, 10);
                },
                alphabetical: function ($elem) {
                    var name = $('.post-title', $elem),
                            itemText = name.length ? name : $elem;
                    return itemText.text().trim();
                }
            }
        });
        evenHandler('layoutMode', 'straightDown');

        var $optionSets = $('#options-filter'),
                $optionLinks = $optionSets.find('a.filter-button');
        $optionSelect = $optionSets.find('select');

        $optionLinks.click(function () {
            var $this = $(this), f = $this.parent(),
                    key = f.attr('data-option-key'),
                    value = $this.attr('data-option-value');

            if ($this.hasClass('selected')) {
                return false;
            }

            $container.removeClass().addClass('isotope ' + value);

            $('a', f).removeClass('selected');
            $this.addClass('selected');

            evenHandler(key, value);
            return false;
        });

        $optionSelect.change(function () {
            var $this = $(this),
                    key = $this.attr('data-option-key'),
                    value = $this.val();

            if ($this.hasClass('selected')) {
                return false;
            }
            evenHandler(key, value);
        });

        function evenHandler(key, value) {
            var sl = $('.selected', $optionSets).attr('data-option-value'),
                    options = {
                        itemSelector: '.post-entry',
                        layoutMode: (sl) ? sl : 'straightDown',
                    }, len;

            options[key] = value;

            len = $('.post-entry', $container).length;
            $('.post-entry', $container).each(function (index) {
                var $this = $(this), img, w, h;
                img = $('.post-media img', $this);

                $this.height(h);
                $("<img />").attr('src', img.attr('src')).load(function () {
                    w = this.width;
                    h = this.height;

                    if (options.layoutMode == 'straightDown') {
                        $this.css({width: '700'});
                        $this.height(200);
                        $('.post-media img', $this).width('auto');
                    } else {
                        $this.width(w);
                        $this.height(h);
                    }

                    if (index == len - 1) {
                        $container.isotope(options);
                    }
                });
            });
        }
    });
</script>
</body>
</html>