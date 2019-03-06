<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/img/admin.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>



        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Главная страница', 'icon' => 'home', 'url' => ['/'], 'active' => $this->context->id == 'site'],
                    ['label' => 'Фильмы', 'icon' => 'home', 'url' => ['/films'], 'active' => $this->context->id == 'films'],
                    ['label' => 'Страны', 'icon' => 'home', 'url' => ['/countries'], 'active' => $this->context->id == 'countries'],
                    ['label' => 'Жанры', 'icon' => 'home', 'url' => ['/genres'], 'active' => $this->context->id == 'genres'],
                    ['label' => 'Города', 'icon' => 'home', 'url' => ['/cities'], 'active' => $this->context->id == 'cities'],
                    [
                        'label' => 'О нас',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Новости', 'icon' => 'file-photo-o', 'url' => ['/news'], 'active' => $this->context->id == 'news'],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
