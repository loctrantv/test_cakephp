<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tblmstaff $tblmstaff
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Staff'), ['action' => 'edit', $tblmstaff->StaffID]) ?> </li>
        <li><?= $this->Html->link(__('List Staff'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Staff'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblmstaff view large-9 medium-8 columns content">
    <h3><?= h($tblmstaff->StaffID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('StaffID') ?></th>
            <td><?= h($tblmstaff->StaffID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StaffName') ?></th>
            <td><?= h($tblmstaff->StaffName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('JapaneseName') ?></th>
            <td><?= h($tblmstaff->JapaneseName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TrialEntryDate') ?></th>
            <td><?= h($tblmstaff->TrialEntryDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TrialEndDate') ?></th>
            <td><?= h($tblmstaff->TrialEndDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('QuitJobDate') ?></th>
            <td><?= h($tblmstaff->QuitJobDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DateUpdated') ?></th>
            <td><?= h($tblmstaff->DateUpdated) ?></td>
        </tr>
    </table>
</div>
