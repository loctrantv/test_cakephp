<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tblmstaff $tblmstaff
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Staff'), '/') ?></li>
    </ul>
</nav>
<div class="tblmstaff form large-9 medium-8 columns content">
    <?= $this->Form->create($tblmstaff) ?>
    <fieldset>
        <legend><?= __('Edit Staff') ?></legend>
        <?php
            echo $this->Form->control('StaffName');
            echo $this->Form->control('JapaneseName');
            echo $this->Form->control('TrialEntryDate');
            echo $this->Form->control('TrialEndDate', ['empty' => true]);
            echo $this->Form->control('QuitJobDate', ['empty' => true]);
            echo $this->Form->control('DateUpdated');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
