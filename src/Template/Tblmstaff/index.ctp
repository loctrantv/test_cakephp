<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tblmstaff[]|\Cake\Collection\CollectionInterface $tblmstaff
 */
?>
<style>
    .search-form {
       display: flex;
    }
    .search-form .input {
        margin: 0 1rem;
    }
    .button-block {
        margin-top: 0.4rem;
    }
</style>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Staff'), '/staff/add') ?></li>
    </ul>
</nav>
<div class="tblmstaff index large-9 medium-8 columns content">
    <h3><?= __('Staff List') ?></h3>
    <?= $this->Flash->render('positive') ?>
    <?= $this->Form->create(null,['type' => 'post']) ?>
    <p>Please input your day range Ex: You want search staffs have working day from 366 days to 720 days </p>
    <div class="search-form">
        <?= $this->Form->control('from',['placeholder' => 'Ex: 366','type' => 'number']) ?>
        <?= $this->Form->control('to',['placeholder' => 'Ex: 720','type' => 'number']) ?>
        <?= $this->Form->control('email',['placeholder' => 'youremail@domain.com','type' => 'email']) ?>
        <div class="button-block">
        <?= $this->Form->button('Submit and Send email',['type' => 'submit']) ?>
        <a href="/"><?= $this->Form->button('Reset',['type' => 'button']) ?></a>
        </div>
    </div>
    <?= $this->Form->end() ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('StaffID','ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('StaffName','Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Email','Email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TrialEntryDate','Entry Date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DayOfWeek','Day of Week') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblmstaff as $tblmstaff): ?>
            <tr>
                <td><?= h($tblmstaff->StaffID) ?></td>
                <td><?= h($tblmstaff->StaffName) ?></td>
                <td></td>
                <td><?= date('d-m-Y',strtotime($tblmstaff->TrialEntryDate)) ?></td>
                <td><?php

                    $dayOfWeek = date('l',strtotime($tblmstaff->TrialEntryDate));
                    $dayOfWeekJav = [
                        'Monday' => '月',
                        'Tuesday' => '火',
                        'Wednesday' => '水',
                        'Thursday' => '木',
                        'Friday' => '金',
                        'Saturday' => '土',
                        'Sunday' => '日'
                    ];
                    echo $dayOfWeek.' ('.$dayOfWeekJav[$dayOfWeek].')';
                    ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblmstaff->StaffID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblmstaff->StaffID]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
