
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('StaffID','ID') ?></th>
        <th scope="col"><?= $this->Paginator->sort('StaffName','Name') ?></th>
        <th scope="col"><?= $this->Paginator->sort('StaffEmail','Email') ?></th>
        <th scope="col"><?= $this->Paginator->sort('TrialEntryDate','Entry Date') ?></th>
        <th scope="col"><?= $this->Paginator->sort('DayOfWeek','Day of Week') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tblmstaff as $tblmstaff): ?>
        <tr>
            <td><?= h($tblmstaff->StaffID) ?></td>
            <td><?= h($tblmstaff->StaffName) ?></td>
            <td><?= h($tblmstaff->StaffEmail) ?></td>
            <td><?= date('d-m-Y',strtotime($tblmstaff->TrialEntryDate)) ?></td>
            <td><?= date('l',strtotime($tblmstaff->TrialEntryDate)) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

