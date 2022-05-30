<?php

use shop\helpers\OrderHelper;
use shop\helpers\PriceHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $order shop\entities\Shop\Order\Order */

$this->title = Yii::t('app','Order').'№: '. $order->id;
$this->params['breadcrumbs'][] = ['label' => 'Cabinet', 'url' => ['cabinet/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <div class="title-wrapper">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <?= DetailView::widget([
        'model' => $order,
        'attributes' => [
            'id',
            'created_at:datetime',
            [
                'attribute' => 'current_status',
                'value' => OrderHelper::statusLabel($order->current_status),
                'format' => 'raw',
            ],
            'delivery_method_name',
            'deliveryData.index',
            'deliveryData.address',
            'cost',
            'note:ntext',
        ],
    ]) ?>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-left"><?= Yii::t('app','Product Name')?></th>
                <th class="text-left"><?= Yii::t('app','Model')?></th>
                <th class="text-left"><?= Yii::t('app','Quantity')?></th>
                <th class="text-right"><?= Yii::t('app','Unit Price')?></th>
                <th class="text-right"><?= Yii::t('app','Total')?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($order->items as $item): ?>
                <tr>
                    <td class="text-left">
                        <?= Html::encode($item->product_name) ?>
                    </td>
                    <td class="text-left">
                        <?= Html::encode($item->modification_code) ?>
                        <?= Html::encode($item->modification_name) ?>
                    </td>
                    <td class="text-left">
                        <?= $item->quantity ?>
                    </td>
                    <td class="text-right"><?= PriceHelper::format($item->price) ?></td>
                    <td class="text-right"><?= PriceHelper::format($item->getCost()) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php if ($order->canBePaid()): ?>
        <!--<p>
                <?php/*= Html::a('Pay via Robokassa', ['/payment/robokassa/invoice', 'id' => $order->id], ['class' => 'btn btn-success']) */?>
            </p>-->
        <p>
            <?= Html::a('Payme', ['/payment/robokassa/invoice', 'id' => $order->id], ['class' => 'btn btn-success']) ?>
        </p>

    <?php endif; ?>

</div>