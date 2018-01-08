<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/avatar2.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                
            </div>
        </div>

        

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Home', 'icon' => 'home', 'url' => ['/site/index']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Admin',
                        'icon' => 'circle-o text-purple',
                        'url' => '#',
                        'visible' => Yii::$app->user->identity->username == 'root-admin' || Yii::$app->user->identity->username == 'Sneha Hotchandani',
                        'items' => [
                            ['label' => 'Active employees', 'icon' => 'circle-o', 'url' => ['/admin/index'],],
                            ['label' => 'Deleted employees', 'icon' => 'circle-o', 'url' => ['/image/index'],],
                        ],
                    ],
                    [
                        'label' => 'Item',
                        'icon' => 'circle-o text-green',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Items', 'icon' => 'circle-o', 'url' => ['/items/index'],],
                            ['label' => 'Item Images', 'icon' => 'circle-o', 'url' => ['/image/index'],],
                            ['label' => 'Deleted Item Logs', 'icon' => 'circle-o', 'url' => ['/delete-item-log/index'],],
                            ['label' => 'Updated Item Logs', 'icon' => 'circle-o', 'url' => ['/update-item-log/index'],],
                        ],
                    ],
                    [
                        'label' => 'Orders',
                        'icon' => 'circle-o text-aqua',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Current Orders', 'icon' => 'circle-o', 'url' => ['/orders/index'],],
                            ['label' => 'Order Items', 'icon' => 'circle-o', 'url' => ['/order-item/index'],],
                            ['label' => 'Deleted Order Logs', 'icon' => 'circle-o', 'url' => ['/delete-orders-log/index'],],
                            ['label' => 'Deleted Order Item Logs', 'icon' => 'circle-o', 'url' => ['/delete-order-item-log/index'],],
                        ],
                    ],
                    [
                        'label' => 'User Logs',
                        'icon' => 'circle-o text-yellow',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Active Users', 'icon' => 'circle-o', 'url' => ['/user/index'],],
                            ['label' => 'Deleted User Logs', 'icon' => 'circle-o', 'url' => ['/delete-user-log/index'],],
                            ['label' => 'Updated User Logs', 'icon' => 'circle-o', 'url' => ['/update-user-log/index'],],
                        ],
                    ],
                    [
                        'label' => 'Developer tools',
                        'icon' => 'fa fa-circle-o text-red',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
