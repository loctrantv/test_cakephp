<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
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
            <td><?= h(!empty($tblmstaff->Tblmstaff2['Email']) ? $tblmstaff->Tblmstaff2['Email'] : '-') ?></td>
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
                echo $dayOfWeekJav[$dayOfWeek];
                ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

