<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Invoice */

$this->title = 'Create Invoice';
$this->params['breadcrumbs'][] = ['label' => 'Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelInvoiceDetails' => $modelInvoiceDetails,
        'modelInvoiceTotal' => $modelInvoiceTotal,
        'modelOrders' => $modelOrders,
        'invoice_no' => $invoice_no,
    ]) ?>

</div>
