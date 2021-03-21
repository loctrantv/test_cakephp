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
    <?= $this->Form->create(null,['type' => 'get']) ?>
    <p>Please input your day range Ex: You want search staffs have working day from 366 days to 720 days </p>
    <div class="search-form">
        <?= $this->Form->control('from',['placeholder' => 'Ex: 366','value' => $this->request->getQuery('from')]) ?>
        <?= $this->Form->control('to',['placeholder' => 'Ex: 720','value' => $this->request->getQuery('to')]) ?>
        <div class="button-block">
        <?= $this->Form->button('Search',['type' => 'submit']) ?>
        <?= $this->Form->button('Send to your email',['type' => 'button','id' => 'emailSend']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('StaffID','ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('StaffName','Name') ?></th>
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
                <td><?= date('d-m-Y',strtotime($tblmstaff->TrialEntryDate)) ?></td>
                <td><?= date('l',strtotime($tblmstaff->TrialEntryDate)) ?></td>
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
<?php
echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array('inline' => false));
?>
<script>
    $(document).ready(function () {
        $('#emailSend').click(function () {
            $.ajax({
                'url' : '/staff/send-pdf',
                'method': 'POST',
                'dataType': 'FormData',
                'data': $('#search-form').serialize(),
                success: function () {

                },
                error: function () {

                }
            });
        });
    });
</script>
